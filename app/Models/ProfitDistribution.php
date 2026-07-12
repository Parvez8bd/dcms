<?php

namespace App\Models;

use App\Models\Contacts\Contact;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfitDistribution extends Model
{
    use HasFactory, SoftDeletes;

    // add guarded 
    protected $guarded = [];

    // investment has only one contact
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
    
    // protected $table = 'investment_details';
}
