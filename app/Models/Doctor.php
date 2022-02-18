<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\PatientRegister;

class Doctor extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'medicine',
        'quantity','description',
    ];


    public function PatientRegister(){
        return $this->belongsTo(PatientRegister::class);
    }
}

