<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory, SoftDeletes;

    // add guarded 
    protected $guarded = [];
    
    protected $dates = ['date'];
    
    // account has only one contact
    public function contact()
    {
        return $this->belongsTo(Contacts\Contact::class);
    }

    // account has only one category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // account has only one subcategory
    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }

    // account has only one contact
    public function nomine()
    {
        return $this->belongsTo(Contacts\Contact::class, 'nomine_id');
    }

     // relation between Contact & sale number
     public function diposit() {
        return $this->hasMany(Diposit::class);
    }
}
