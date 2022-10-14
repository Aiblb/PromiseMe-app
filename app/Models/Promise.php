<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promise extends Model
{
    use HasFactory;

    protected $protected = ['id'];

    //needs to be call as an attribute
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
