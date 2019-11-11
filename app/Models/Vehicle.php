<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'type',
        'title',
        'driver_id',
        'status'
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
