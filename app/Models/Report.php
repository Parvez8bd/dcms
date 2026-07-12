<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
     // add guarded
     protected $guarded = [];
    protected $dates = ['updated_at'];

     // patient has only one Invoice
    public function invoice()
    {
        return $this->belongsTo(Invoice::class );
    }
    
     // doctor has only one contact
     public function test()
     {
         return $this->belongsTo(Test::class);
     }
}
