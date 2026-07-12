<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory, SoftDeletes;

    // add guarded 
    protected $guarded = [];
    protected $dates = ['date'];

    // sale has only one contact
    public function contact()
    {
        return $this->belongsTo(Contacts\Contact::class);
    }
    // sale has only one witness
    public function witness()
    {
        return $this->hasMany(Witness::class);
    }
    // sale has only one installments
    public function installments()
    {
        return $this->hasMany(Installment::class);
    }
}
