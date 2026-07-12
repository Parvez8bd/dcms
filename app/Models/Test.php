<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use HasFactory, SoftDeletes;

    // add guarded
    protected $guarded = [];
    // sale has only one contact
    public function test_group()
    {
        return $this->belongsTo(TestGroup::class);
    }
}
