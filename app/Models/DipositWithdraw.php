<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DipositWithdraw extends Model
{
    use HasFactory, SoftDeletes;

    // add guarded 
    protected $guarded = [];
    protected $dates = ['withdraw_date'];
    // Diposit has only one account
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
    // investment has only one contact
    public function contact()
    {
        return $this->belongsTo(Contacts\Contact::class);
    }
}
