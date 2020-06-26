<?php

namespace App\Http\Controllers\Files;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\File;
use App\Models\FileCategorie;
use Illuminate\Support\Facades\Storage;


class FilesDownloadController extends Controller
{
    // download my files
    // showing files

    public function index(Request $request)
    {

        $user =  User::find(auth()->id());
        $permission = $user->permission;

        if ((int) $permission == 1)
        {
            $file_categorie_id = FileCategorie::all();
            $file_categorie = FileCategorie::findOrFail($request->id ?? 1);

            $files = $file_categorie->files()->where('user_id' , '=' , auth()->id())->paginate(10);
            return view('dashboard.file.my-files.index' , compact('files' , 'file_categorie_id'));
        }
        else {
            $file_categorie_id = FileCategorie::select('*')->where('id' , '>' , 1)->get();
            $file_categorie = FileCategorie::findOrFail($request->id ?? 2);

            $files = $file_categorie->files()->where('user_id' , '=' , auth()->id())->paginate(10);
            return view('dashboard.file.my-files.index' , compact('files' , 'file_categorie_id'));
        }


    }


    public function download($id)
    {
        $user = User::findOrFail(auth()->id());

        if ($user->id != auth()->id())
        {
            return abort(401 , 'unauthorized');
        }
        else {
           $file = File::findOrFail($id);
           $file_name = $file->original_name;
           $file_path = $file->file_path;
           return Storage::download($file_path , $file_name);
        }
    }


    public function delete_file(Request $request)
    {
        $user = User::find(auth()->id());
        if ($user->id == auth()->id())
        {
            $file = File::find($request->id);
            Storage::delete($file->file_path);
            $file->delete();
            return redirect()->back()->with('success' , 'Deletion successful');
        }
        return abort('401');
    }

    //  Validity of the offer
    public function update(Request $request)
    {

        $user = User::find(auth()->id());
        if ($user->id == auth()->id())
        {
            $request->validate([
                'power' => 'required'
            ]);

            $file = File::find($request->id);
            $file->power = $request->power;
            $file->save();
        }
        return abort(401);
    }


}
