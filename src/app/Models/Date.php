<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\Schedule;

class Date extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'date',
    ];
    public function post()
    {
        return $this->belongsTo(Post::class);


    }
    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }
}
