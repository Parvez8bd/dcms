<?php

namespace App\Models\Contacts;

use App\Models\Location\District;
use App\Models\Location\Division;
use App\Models\Location\Union;
use App\Models\Location\Upazila;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    // address table 
    protected $table = 'contact_addresses';

    // add guarded 
    protected $guarded = [];

    // relation between Address & division
    public function division() {
        return $this->belongsTo(Division::class);
    }

    // relation between Address & district
    public function district() {
        return $this->belongsTo(District::class);
    }

    // relation between Address & Upazila
    public function upazila() {
        return $this->belongsTo(Upazila::class);
    }

    // relation between Address & Union
    public function union() {
        return $this->belongsTo(Union::class);
    }
    
}
