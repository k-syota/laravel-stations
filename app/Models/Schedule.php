<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_time',
        'end_time',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function sheets()
    {
        return $this->belongsToMany(Sheet::class,'reservations');
    }
}
