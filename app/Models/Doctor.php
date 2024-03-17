<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fiilable = [
        'doctor_name',
        'doctor_specialist',
        'doctor_email',
        'doctor_phone',
        'photo',
        'address',
        'sip',
        'id_ihd',
        'nik'
    ];
}
