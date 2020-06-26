<?php

namespace App\Http\Controllers\Files;

use Illuminate\Http\Request;
use App\Models\FileCategorie;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class FilesCategoriesController extends Controller
{
    public function create()
    {

        $user =  User::find(auth()->id());
        $permission = $user->permission;

        if ((int) $permission == 1)
        {
            $fileCategorie = FileCategorie::all();
            return view('dashboard.file.categorie-files.create' , compact('fileCategorie'));
        }

        $fileCategorie = FileCategorie::select('*')->where('id' , '>' , 1)->get();
        return view('dashboard.file.categorie-files.create' , compact('fileCategorie'));


    }


    public function store(\App\Http\Requests\FileCategorieRequest $request)
    {
        FileCategorie::create($request->all());
        return redirect()->back()->with('successes' , __('messages.file_classification_successes'));
    }


    public function update(Request $request)
    {
        $request->validate([
           'cat_name'  => 'required|max:100'
        ]);
        $fileCategorie = FileCategorie::find($request->id);
        $fileCategorie->category_name = $request->cat_name;
        $fileCategorie->save();
        return redirect()->back()->with('success' , 'The update was successful');
    }


    public function delete(Request $request)
    {
        try
        {
            $file_categorie = FileCategorie::find($request->id);
            $file_categorie->delete();
        }
        catch (\Illuminate\Database\QueryException $exception)
        {
            return redirect()->back()->with('error' , 'لا تستطيع حذف التصنيف لانه يوجد بعض الملفات مسجلة بإسمه!');
        }
        return redirect()->back()->with('success' , 'تم حذف التصنيف بنجاح');
    }




}
