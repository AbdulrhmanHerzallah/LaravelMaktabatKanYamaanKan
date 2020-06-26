<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class FilesCommonController extends Controller
{
    public function index()
    {
        $files = File::where('power' , '=' , 2)->paginate(10);

        return view('dashboard.file.common-files.index' , compact('files'));
    }




    public function getAllFileAdmin()
    {

        $user = User::find(auth()->id());
        if($user->permission != 1)
        {
            return abort(404);
        }

        $files = DB::table('files')->orderBy('id', 'desc')->paginate(10);

        return view('dashboard.file.admin-files.index' , compact('files'));

    }

}
