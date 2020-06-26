<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';

    protected $guarded = [];



    public function fileCategories()
    {
        return $this->belongsTo(FileCategorie::class , 'cat_id')->orderBy('id' , 'DESC');
    }


    public function users()
    {
        return $this->belongsTo(User::class)->orderBy('id' , 'DESC');
    }

}
