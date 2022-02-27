<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{

    protected $fillable = [
        'title', 
        'fullname', 
        'gender',
        'email',
        'department',
        'doctor_id',
        'image'
        
    ];

    use HasFactory;
}
