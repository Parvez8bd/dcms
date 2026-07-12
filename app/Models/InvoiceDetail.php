<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;
     // add guarded
     protected $guarded = [];

    // doctor has only one contact
    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function test_group()
    {
        return $this->belongsTo(TestGroup::class);
    }
    // patient has only one Invoice
    public function invoice()
    {
        return $this->belongsTo(Invoice::class );
    }
}
