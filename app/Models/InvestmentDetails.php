<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvestmentDetails extends Model
{
    use HasFactory;

    // add guarded 
    protected $guarded = [];

    // investment has only one contact
    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }
}
