<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';

    protected $guarded = [];



    public function users()
    {
        return $this->belongsTo(Bill::class);
    }


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
