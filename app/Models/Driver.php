<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'firstname',
        'lastname',
        'photo',
        'age'
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
