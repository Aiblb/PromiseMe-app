<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Promise;

class Task extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'promise_id'];

    public function promise(){
        return $this->belongsTo(Promise::class);
    }
}
