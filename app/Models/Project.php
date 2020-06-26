<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $guarded = [];


    public function commits()
    {
        return $this->belongsToMany(Commit::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
