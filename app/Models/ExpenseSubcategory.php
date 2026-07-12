<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpenseSubcategory extends Model
{
    use HasFactory, SoftDeletes;

    // add guarded
    protected $guarded = [];


    public function expensesCategory()
    {
        return $this->belongsTo(ExpensesCategory::class);
    }
}
