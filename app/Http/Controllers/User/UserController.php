<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UpdateUserByAdminRequest;
use App\Http\Requests\CreateUserByAdminRequest;
use App\Jobs\NewUserCreateByAdminJob;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateUserAccountRequest;



class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('AdminMiddleware')
            ->except([
                'index' , 'accountActivationFromUser'
                , 'index_conform_data' , 'index_edit_user' , 'update_user_account'
            ]);
    }

    public function index()
    {
        $user = User::find(auth()->id());
        return view('dashboard.user.my-info.index' , ['user' => $user]);
    }

    public function create()
    {
        return view('dashboard.user.create-user-by-admin.create');
    }


    public function store(CreateUserByAdminRequest $request)
    {

        $password = Str::random('6');
        $password = Str::lower($password);
        $password_hash = Hash::make($password);

        $user = User::create(array_merge($request->all() , ['password' => $password_hash]));

        $this->dispatch(new NewUserCreateByAdminJob($user , $password));

        toast('تم إنشاء المستخدم بنجاح','success');

        return redirect()->back();

    }

    public function accountActivationFromUser(Request $request)
    {
        if (auth()->id() === (int) $request->id)
        {
            $user =  User::find($request->id);
            $user->is_confirmed = 1;
            $user->save();
        }else {
            return abort(401);
        }
    }

    public function index_conform_data($id)
    {
        if (auth()->id() == (int) $id)
        {
            return view('dashboard.user.confirm-user-data.index' , ['id' => $id]);
        }
      return abort(404);
    }


    public function get_users_info()
    {
        $users = User::where('permission' , '!=' , 1)->paginate(10);
        if ($users->count() == 0)
        {
            Alert::alert('لا يوجد موظفين مسجلين!');

        }
        return view('dashboard.user.get_users_info.show' ,  ['users' => $users]);
    }


    public function update_users(UpdateUserByAdminRequest $request)
    {
     $user = User::find($request->id)->update($request->all());
     return redirect()->back()->with('success' , 'تم تحديث البينات المستخدم بنجاح');
    }


    public function index_edit_user()
    {
       $user =  User::findOrFail(auth()->id());
       return view('dashboard.user.account-settings.edit' , compact('user'));
    }

    public function update_user_account(UpdateUserAccountRequest $request)
    {
        $user =  User::findOrFail(auth()->id());

        if (Hash::check($request->main_password ,  $user->password))
        {
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            toast('تم تحديدث البينات بنجاح','success');
            return redirect()->back();
        }
        return redirect()->back();
    }



    public function softDel(Request $request)
    {
        $user = User::find($request->id);
        toast('تم ترحيل الموظف بنجاح','success');
        $user->delete();
        return redirect()->back();
    }

    public function forceDel(Request $request)
    {
        $user = User::where('id' , '=' , $request->id)->withTrashed()->first();
        toast('تم حذف الموظف بشكل كامل من النظام!','success');
        $user->forceDelete();
        return redirect()->back();
    }


    public function getUsersDel()
    {
        $users = User::where('deleted_at' , '!=' , null)->withTrashed()->paginate(10);
        if ($users->count() == 0) Alert::alert('لا  موظفين مرحلين!');

        return view('dashboard.user.get_users_info.restore' , ['users' => $users]);
    }

    public function getRestore(Request $request)
    {
        $user = User::where('id' , '=' , $request->id)->withTrashed()->first();
        $user->restore();
        toast('تم ارجاع الموظف بنجاح','success');

        return redirect()->back();
    }

}
