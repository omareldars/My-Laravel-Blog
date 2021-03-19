<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description','user_id'];

    public function user()
    {
//        'user_id'
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtFormatedAttribute($date)
    {
        return \Carbon\Carbon::parse( $date)->format('Y-m-d');
    }
}
