<?php

namespace App\Http\Controllers\Files;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\FileCategorie;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\File;
use App\Http\Controllers\Controller;



class FilesUploadController extends Controller
{
    public function create()
    {
        $user =  User::find(auth()->id());
        $permission = $user->permission;
        if ((int) $permission == 1)
        {
            $file_cat = FileCategorie::all();
            if ($file_cat->count() > 0){
                $enable = false;
            }else {
                $enable = true;
                alert()->info('لا يمكنك رفع ملفات!','بسبب عدم وجود تصنيفات حالياََ.');
            }
        }
        elseif ((int) $permission > 1) {
            $file_cat = FileCategorie::select('*')->where('category_name' , '!=' , 'العقود')->get();
            if ($file_cat->count() > 1)
            {
                $enable = false;
            }
            else{
                alert()->info('لا يمكنك رفع ملفات!','بسبب عدم وجود تصنيفات حالياََ.');
                $enable = true;
            }
        }
        return view('dashboard.file.index', compact('file_cat' , 'enable'));
    }

    public function store(Request $request, FileCategorie $fileCategorie)
    {

        $request->validate([
            'file.*' => 'required'
        ]);

        if ($request->hasFile('file'))
        {
            foreach ($request->file as $file)
            {
                Storage::makeDirectory('app/files/'. $file->getClientOriginalExtension());
            }

            $json_data = [];
            foreach ($request->file as $file)
            {
                $fileOriginalName = Carbon::now()->timestamp.$file->getClientOriginalName();
                $fileOriginalExtension = $file->getClientOriginalExtension();

                $modelFile = new File();
                $modelFile->file_name = $fileOriginalName;
                $modelFile->file_path = $file->storeAs('app/files/'.$fileOriginalExtension , $fileOriginalName);
                $modelFile->file_ext =  $fileOriginalExtension;
                $modelFile->power    =  $request->power;
                $modelFile->user_id  = auth()->id();
                $modelFile->cat_id   =  $request->cat_id;
                $modelFile->size  = $file->getSize();
                $modelFile->original_name  = $file->getClientOriginalName();
                $modelFile->save();
                $json_data[] = $file->getClientOriginalName();
            }
        }

        return response()->json(['files_success' => $json_data]);
   }
}
