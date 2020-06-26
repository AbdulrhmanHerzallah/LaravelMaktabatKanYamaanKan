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


class UserController extends Controller
{
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


        Mail::to($request->email)
            ->send(new \App\Mail\NewUserMail($user , $password));


    }

    public function store_data_conform(Request $request)
    {
        if (auth()->id() === (int) $request->id)
        {
            $user =  User::find($request->id);
            $user->national_identity = $request->national_identity;
            $user->social_insurance_number = $request->social_insurance_number;
            $user->data_subscribe_social = $request->data_subscribe_social;
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
            return view('dashboard.user.confirm-user-data.create' , ['id' => $id]);
        }
      return abort(404);
    }


    public function get_users_info()
    {
        $users = User::paginate(10);
        return view('dashboard.user.get_users_info.show' ,  ['users' => $users]);
    }


    public function update_users(UpdateUserByAdminRequest $request)
    {
     $user = User::find($request->id)->update($request->all());
     return redirect()->back()->with('success' , 'تم تحديث البينات المستخدم بنجاح');
    }
}
