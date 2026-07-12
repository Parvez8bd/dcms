<?php

namespace App\Models;

use App\Models\Contacts\Contact;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Withdraw extends Model
{
    use HasFactory;

    // add guarded 
    protected $guarded = [];
    protected $dates = ['withdraw_date'];

    // Withdraw has only one contact
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    // Withdraw has only one investment
    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }
}
