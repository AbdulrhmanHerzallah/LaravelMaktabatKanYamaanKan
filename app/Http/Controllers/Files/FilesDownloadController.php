<?php

namespace App\Http\Controllers\Files;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\File;
use App\Models\FileCategorie;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class FilesDownloadController extends Controller
{
    // download my files
    // showing files

    public function index(Request $request)
    {

        $user =  User::find(auth()->id());
        $files = $user->files()->paginate(10);

        if ($files->count() == 0)
        {
            Alert::info('ملاحظة لا يوجد ملفات قمت برفعها!', 'لا يوجد لك ملفات.');
        }

        if (auth()->user()['permission'] == 1 ?? false){
            $filesCategorie = FileCategorie::all();
        }
        else{
            $filesCategorie = FileCategorie::select('*')->where('category_name' , '!=' , 'العقود')->get();
        }
        return view('dashboard.file.my-files.index' , compact('files' , 'filesCategorie'));
    }




    public function search_file_cat(Request $request)
    {

        $user =  User::find(auth()->id());
        $files = $user->files()->where('cat_id' , '=' , $request->cat_id)->paginate(10);

        if (auth()->user()['permission'] == 1 ?? false){
            $filesCategorie = FileCategorie::all();
        }
        else{
            $filesCategorie = FileCategorie::select('*')->where('category_name' , '!=' , 'العقود')->get();
        }
        return view('dashboard.file.my-files.index' , compact('files' , 'filesCategorie'));
    }







    public function updateFile(Request $request)
    {
        $file = File::find($request->id);
        $file->power = $request->power;
        $file->cat_id = $request->file_cat;
        $file->save();
        toast('تم تحديث حالة الملف بنجاح','success');

        return redirect()->back();
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
            toast('تم حذف الملف بنجاح','success');

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
