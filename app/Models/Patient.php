<?php

namespace App\Models;

use App\Models\Contacts\Contact;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    // add guarded
    protected $guarded = [];
    
     // patient has only one patient_refferrs
     public function patient_refferr()
     {
         return $this->hasOne(PatientRefferr::class );
     }

     // patient has only one Invoice
     public function invoice()
     {
         return $this->hasOne(Invoice::class );
     }

    public function transactions(){
        return $this->morphToMany(Transaction::class,'transactionable');
    }
}
