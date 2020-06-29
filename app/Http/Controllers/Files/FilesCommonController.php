<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use App\Models\FileCategorie;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class FilesCommonController extends Controller
{
    public function index()
    {
        $filesCategorie = FileCategorie::select('*')->where('category_name' , '!=' , 'العقود')->get();
        $files = File::where('power' , '=' , 2)->orderBy('id' , 'DESC')->paginate(10);

        if ($files->count() == 0)
        {
            Alert::info('ملاحظة لا يوجد ملفات مشتركة!', 'النظام فارغ من الملفات المشتركة.');
        }

        return view('dashboard.file.common-files.index' , compact('files','filesCategorie'));
    }


    public function search_common_files_cat(Request $request)
    {
        $filesCategorie = FileCategorie::select('*')->where('category_name' , '!=' , 'العقود')->get();
        $files = File::where('power' , '=' , 2)->orderBy('id' , 'DESC')->where('cat_id' , '=' , $request->cat_id)->paginate(10);
        return view('dashboard.file.common-files.index' , compact('files','filesCategorie'));
    }




    public function getAllFileAdmin()
    {

        $user = User::find(auth()->id());
        if($user->permission != 1)
        {
            return abort(404);
        }
        $files = DB::table('files')->orderBy('id', 'desc')->paginate(10);

        if ($files->count() == 0)
        {
            Alert::info('ملاحظة لا يوجدملفات قام الاعضاء برفعها!', 'النظام فارغ من الملفات .');
        }

        return view('dashboard.file.admin-files.index' , compact('files'));

    }

}
