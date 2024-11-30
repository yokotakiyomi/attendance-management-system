<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rest_id',
        'work_start',
        'work_end',
        'total_work',
    ];

    public $timestamps = false;

    public function rests()
    {
        return $this->hasMany(Rest::class);
    }

    // Work は 1 人の User に所属
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}