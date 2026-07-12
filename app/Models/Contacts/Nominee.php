<?php

namespace App\Models\Contacts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{
    use HasFactory;

    // get contact
    public function contact() {
        return $this->belongsTo(Contact::class, 'nominee_id');
    }
}
