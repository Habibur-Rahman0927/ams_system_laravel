<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function timeSetup()
    {
        return $this->belongsTo(TimeSetup::class, 'time_setup_id');
    }
}
