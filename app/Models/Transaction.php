<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    // add guarded
    protected $guarded = [];
    protected $dates = ['created_at'];

    public function patient() {
        return $this->morphedByMany(Patient::class, 'transactionable');
    }

    public function commission() {
        return $this->morphedByMany(CommissionDistribution::class, 'transactionable');
    }
}
