<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Rest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('stamping');
    }

    public function handleStamping(Request $request)
    {
        $userId = Auth::id();

        if ($request->type === 'work_start') {
            $existingWork = Work::where('user_id', $userId)
                ->whereDate('work_start', Carbon::today())
                ->first();

            if (!$existingWork) {
                Work::create([
                    'user_id' => $userId,
                    'work_start' => Carbon::now(),
                ]);
            }
        } elseif ($request->type === 'work_end') {
            $work = Work::where('user_id', $userId)
                ->whereDate('work_start', Carbon::today())
                ->whereNull('work_end')
                ->first();

            if ($work) {
                $workEnd = Carbon::now();
                $work->update(['work_end' => $workEnd]);

                $totalRestDuration = Rest::where('work_id', $work->id)
                    ->whereNotNull('rest_start')
                    ->whereNotNull('rest_end')
                    ->get()
                    ->reduce(function ($carry, $rest) {
                        $restStart = Carbon::parse($rest->rest_start);
                        $restEnd = Carbon::parse($rest->rest_end);
                        return $carry + $restStart->diffInSeconds($restEnd);
                    }, 0);

                $workStart = Carbon::parse($work->work_start);
                $totalWorkSeconds = $workStart->diffInSeconds($workEnd) - $totalRestDuration;
                $totalWork = gmdate('H:i:s', $totalWorkSeconds);

                $work->update(['total_work' => $totalWork]);
            }
        } elseif ($request->type === 'rest_start') {
            $work = Work::where('user_id', $userId)
                ->whereDate('work_start', Carbon::today())
                ->whereNull('work_end')
                ->first();

            if ($work) {
                $activeRest = Rest::where('work_id', $work->id)
                    ->whereNull('rest_end')
                    ->first();

                if (!$activeRest) {
                    Rest::create([
                        'work_id' => $work->id,
                        'rest_start' => Carbon::now(),
                    ]);
                }
            }
        } elseif ($request->type === 'rest_end') {
            $work = Work::where('user_id', $userId)
                ->whereDate('work_start', Carbon::today())
                ->whereNull('work_end')
                ->first();

            if ($work) {
                $activeRest = Rest::where('work_id', $work->id)
                    ->whereNull('rest_end')
                    ->orderBy('rest_start', 'desc')
                    ->first();

                if ($activeRest) {
                    $restEnd = Carbon::now();
                    $activeRest->update(['rest_end' => $restEnd]);

                    $restStart = Carbon::parse($activeRest->rest_start);
                    $totalRestTime = $restStart->diff($restEnd)->format('%H:%I:%S');
                    $activeRest->update(['rest_time' => $totalRestTime]);
                }
            }
        }

        return redirect()->back();
    }

    public function show(Request $request)
    {
        $users = User::paginate(5);

        // ページ内のユーザーごとに今日の勤務データを取得・加工
        foreach ($users as $user) {
            $todayWork = $user->works()->whereDate('work_start', Carbon::today())->first();

            if ($todayWork && $todayWork->work_start && $todayWork->work_end) {
                $workStart = Carbon::parse($todayWork->work_start);
                $workEnd = Carbon::parse($todayWork->work_end);
                $totalWork = $workStart->diff($workEnd)->format('%H:%I:%S');
                $todayWork->total_work = $totalWork;
            }
        }

        return view('attendance', compact('users'));
    }
}
