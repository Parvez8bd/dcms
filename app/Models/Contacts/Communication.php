<?php

namespace App\Models\Contacts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    use HasFactory;

    // communication table 
    protected $table = 'contact_communications';

    // add guarded 
    protected $guarded = [];
}
