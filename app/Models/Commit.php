<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commit extends Model
{
    protected $table = 'commits';

    protected $guarded = [];


    public function events()
    {
        return $this->belongsTo(Event::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
