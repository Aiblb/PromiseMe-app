<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Promise;

class Task extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = ['start'];

    protected $hidden = ['start'];

    public function getStartAttribute(){
        return $this->deadline;
    }

    public function promise(){
        return $this->belongsTo(Promise::class);
    }
}
