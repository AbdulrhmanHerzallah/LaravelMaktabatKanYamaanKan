<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileCategorie extends Model
{
    protected $table = 'file_categorys';

    protected $guarded = [];


    public function files()
    {
        return $this->hasMany(File::class , 'cat_id')->orderBy('id' , 'DESC');
    }


}
