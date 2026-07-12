<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diposit extends Model
{
    use HasFactory, SoftDeletes;

    // add guarded 
    protected $guarded = [];

    // Diposit has only one account
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    // Diposit has only one subcategory
    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
