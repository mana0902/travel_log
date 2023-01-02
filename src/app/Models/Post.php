<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Date;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'thumbnail',
        'title',
        'departure_day',
        'return_day',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);


    }
    public function date()
    {
        return $this->hasMany(Date::class);
    }

}
