<?php

namespace App\Models;

use App\Models\Contacts\Contact;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientRefferr extends Model
{
    use HasFactory;
     // add guarded
     protected $guarded = [];

     // doctor has only one contact
    public function doctor()
    {
        return $this->belongsTo(Contact::class , 'refferr_doctor_id');
    }
}
