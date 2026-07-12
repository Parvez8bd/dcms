<?php

namespace App\Models\Contacts;

use App\Models\CommissionDistribution;
use App\Models\Investment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Media;
use App\Models\Sale;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    // add guarded
    protected $guarded = [];
	
	// relation between Contact & Contact number
    public function phones() {
        return $this->hasMany(Phone::class);
    }
	// relation between Contact & Communication number
    public function communications() {
        return $this->hasMany(Communication::class);
    }
	// relation between Contact & Communication number
    public function investments() {
        return $this->hasMany(Investment::class);
    }

    // relation between Contact & Address
    public function addresses() {
        return $this->hasMany(Address::class);
    }

    // relation between Contact & Nominee
    public function nominees() {
        return $this->hasMany(Nominee::class);
    }

    /**
     * Get all of the media for the contact.
     */
    public function media() {
        return $this->morphToMany(Media::class, 'mediaable');
    }
    // relation between Contact & sale number
    public function sale() {
        return $this->hasMany(Sale::class);
    }

    public function commissionDistribution()
    {
        return $this->hasMany(CommissionDistribution::class);
    }
}
