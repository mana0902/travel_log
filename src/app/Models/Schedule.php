<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Date;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_id',
        'start_time',
        'end_time',
        'filename_1',
        'filename_2',
        'filename_3',
        'filename_4',
        'destination',
        'comment',
    ];
    public function date()
    {
        return $this->belongsTo(Date::class);


    }
}
