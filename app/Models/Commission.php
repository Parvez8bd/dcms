<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;
    // add guarded
    protected $guarded = [];

    // Commission has only one contact
    public function contact()
    {
        return $this->belongsTo(Contacts\Contact::class, 'refferr_by_id');
    }
    
    public function test()
    {
        return $this->belongsTo(Test::class);
    }

   
}
