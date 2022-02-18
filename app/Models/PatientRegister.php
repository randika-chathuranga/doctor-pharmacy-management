<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Doctor;

class PatientRegister extends Model
{
    use HasFactory,Notifiable;

    protected $fillable =[
        'patient_name','age','weight','height',
    ];

    public function Doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
