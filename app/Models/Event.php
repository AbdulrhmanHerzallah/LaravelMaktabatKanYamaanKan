<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $guarded = [];



    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function leader()
    {
        return $this->belongsTo(User::class , 'leader_id');
    }


    public function common_users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function commits()
    {
        return $this->hasMany(Commit::class);
    }

}
