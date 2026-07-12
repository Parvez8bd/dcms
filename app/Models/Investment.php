<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investment extends Model
{
    use HasFactory, SoftDeletes;

    // add guarded 
    protected $guarded = [];
    protected $dates = ['investment_date'];

    // investment has only one project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // investment has only one investmentDetail
    public function investmentDetails()
    {
        return $this->hasMany(InvestmentDetails::class);
    }

    // investment has only one contact
    public function contact()
    {
        return $this->belongsTo(Contacts\Contact::class);
    }

    // investment has only one contact
    public function nominee()
    {
        return $this->belongsTo(Contacts\Contact::class, 'nominee_id');
    }
}
