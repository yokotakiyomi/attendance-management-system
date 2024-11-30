@extends('layouts.general')

@section('css')
<link rel="stylesheet" href="{{asset('css/attendance.css') }}">
@endsection

@section('content')
<form class="attendance-form" action="/attendance" method="GET">
    @csrf

    <div class=date>
        <button id="prev-day" type="button" >←</button>
        <div id="date-display"></div>
        <button id="next-day" type="button">→</button>

        <script>
            function updateDateDisplay() {
                const options = {
                    year: 'numeric',
                    month: '2-digit',
                    day: '2-digit'
                };
                document.getElementById('date-display').textContent = currentDate.toLocaleDateString('ja-JP', options);
            }

            let currentDate = new Date();
            updateDateDisplay();

            document.getElementById('prev-day').addEventListener('click', (event) => {
                event.preventDefault();
                currentDate.setDate(currentDate.getDate() - 1);
                updateDateDisplay();
            });

            document.getElementById('next-day').addEventListener('click', (event) => {
                event.preventDefault();
                currentDate.setDate(currentDate.getDate() + 1);
                updateDateDisplay();
            });
        </script>
    </div>

    @php
    use Carbon\Carbon;
    @endphp

    <div class="table">
        <table class="attendance-table">
            <tr>
                <th>名前</th>
                <th>勤務開始</th>
                <th>勤務終了</th>
                <th>休憩開始</th>
                <th>休憩終了</th>
                <th>休憩時間</th>
                <th>勤務時間</th>
            </tr>

            @forelse ($users as $user)
            @foreach ($user->works as $work)
            <tr>
                <td>{{ $user->name ?? 'N/A' }}</td>
                <td>{{ $work->work_start ? Carbon::parse($work->work_start)->format('H:i:s') : '-' }}</td>
                <td>{{ $work->work_end ? Carbon::parse($work->work_end)->format('H:i:s') : '-' }}</td>

                @php
                // Rest time and total work time calculations
                $rest = $work->rests->last();
                $restTime = 0;
                if ($rest && $rest->rest_time) {
                $restTime = Carbon::parse($rest->rest_time)->diffInSeconds(Carbon::today());
                }
                $totalWork = '-';

                if ($work->work_start && $work->work_end) {
                $workStart = Carbon::parse($work->work_start);
                $workEnd = Carbon::parse($work->work_end);
                $totalWorkInSeconds = $workStart->diffInSeconds($workEnd) - $restTime;
                $totalWork = gmdate('H:i:s', $totalWorkInSeconds);
                }
                @endphp

                <td>{{ $rest ? Carbon::parse($rest->rest_start)->format('H:i:s') : '-' }}</td>
                <td>{{ $rest ? Carbon::parse($rest->rest_end)->format('H:i:s') : '-' }}</td>
                <td>{{ $restTime > 0 ? gmdate('H:i:s', $restTime) : '-' }}</td>
                <td>{{ $totalWork }}</td>
            </tr>
            @endforeach
            @empty
            @endforelse
        </table>

        <nav class="pagination">
            <a href="" class="pagination__arrow pagination__prev">
                <span class="visuallyhidden">Previous Page</span>
            </a>
            <ul class="pagination__items">
                <li class="is-active"><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
            </ul>
            <a href="" class="pagination__arrow pagination__next">
                <span class="visuallyhidden">Next Page</span>
            </a>
        </nav>
    </div>


</form>
@endsection