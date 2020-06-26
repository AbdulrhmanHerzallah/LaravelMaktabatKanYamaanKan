<?php

namespace App\Http\Controllers\Demand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Demand;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EmpDemandRequest;
use App\Http\Requests\AdminDemandRequest;

class DemandController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard.demand.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

        $users = User::select(['id' , 'name'])->where('permission' , '!=' , '1')->get();
//      return  $users_admin = User::select(['id' , 'name'])->where('permission' , '=' , '1')->get();
        return view('dashboard.demand.emp-demand.create' , compact('users'));

    }


    public function create_admin()
    {
        return view('dashboard.demand.admin-demand.create');
    }

//AdminDemandRequest
    public function store_admin(AdminDemandRequest $request)
    {

        $demand = Demand::create($request->all());

        $ids = User::select(['id'])->where('permission' , '=' , '1')->get();

        $demand->users()->attach($ids);

        $emails = [];
        $users = User::find($ids);
        foreach ($users as $email) {
            $emails[] = $email->email;
        }

        $user_name = auth()->user()['name'];

        $date = ['demand' => $demand , 'user_name' => $user_name , 'emails' => $emails];
        $this->dispatch(new \App\Jobs\DemandEmailRequestJob($date));

        return redirect()->back()->with('success' , 'تم إرسال الطلب للمدير.');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EmpDemandRequest $request)
    {

//        $user = User::find(1);
//        $user->notify(new \App\Notifications\DemandNotification());

//        $user = new User();
//        $user->notifications->markAsRead();

        $demand = Demand::create($request->except('emp_name'));

       $ids = $request->emp_name;
       $demand->users()->attach($ids);

       $emails = [];
       $users = User::find($ids);
        foreach ($users as $email) {
            $emails[] = $email->email;
        }

        $user_name = auth()->user()['name'];

        $date = ['demand' => $demand , 'user_name' => $user_name , 'emails' => $emails];
        $this->dispatch(new \App\Jobs\DemandEmailRequestJob($date));

        return redirect()->back()->with('success' , 'تم إرسال الطلب للاعضاء بنجاح.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }






}
