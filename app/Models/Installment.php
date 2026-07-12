<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Installment extends Model
{
    use HasFactory;

    // add guarded
    protected $guarded = [];
    protected $dates = ['date'];

    /* ==== Local Scope Start ==== */

    public function scopeAddRowSerialNumber(Builder $query, $serial_column_name = 'serial')
    {
        DB::statement(DB::raw("set @$serial_column_name:=0"));
        return $query->selectRaw("*, @$serial_column_name:=@$serial_column_name+1 as $serial_column_name");
    }

    /* ==== Local Scope End ==== */

    // Installment has only one sale
    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
