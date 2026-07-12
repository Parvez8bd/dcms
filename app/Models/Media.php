<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    // add guarded 
    protected $guarded = [];
    
    /**
     * Get all of the contacts that are assigned this media.
     */
    public function contacts() {
        return $this->morphedByMany(Contacts\Contact::class, 'mediaable');
    }

}
