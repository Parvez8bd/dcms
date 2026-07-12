<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommissionDistribution extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function transactions(){
        return $this->morphToMany(Transaction::class,'transactionable');
    }
    // account has only one contact
    public function contact()
    {
        return $this->belongsTo(Contacts\Contact::class);
    }
}
