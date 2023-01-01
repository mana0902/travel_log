<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'start_time',
        'end_time',
        'filename_1',
        'filename_2',
        'filename_3',
        'filename_4',
        'destination',
        'comment',
    ];
    public function post()
    {
        return $this->belongsTo(Post::class);


    }
}
