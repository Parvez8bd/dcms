<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
     // add guarded
     protected $guarded = [];

     // Invoic has many to invoice_detail
     public function invoice_details()
     {
         return $this->hasMany(InvoiceDetail::class );
     }

     // Invoic has many to invoice_detail
     public function patient()
     {
         return $this->belongsTo(Patient::class );
     }

      // Invoic has many to invoice_detail
      public function report()
      {
          return $this->hasMany(Report::class );
      }
}
