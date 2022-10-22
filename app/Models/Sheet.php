<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sheet extends Model
{
    use HasFactory;

    public function schedules()
    {
        return $this->belongsToMany(Schedule::class,'reservations')->withPivot("name")->as("detail");
    }
}
