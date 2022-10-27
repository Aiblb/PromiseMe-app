<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Promise extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = [
        'image'
    ];

    //needs to be call as an attribute
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }


    public function getImageAttribute()
    {
        if (Storage::disk('public')->exists("promiseImg/$this->id.png")) {
            return "promiseImg/$this->id.png";
        }
        return null;
    }
}
