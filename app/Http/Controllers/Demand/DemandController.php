<?php

namespace App\Http\Controllers\Demand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Demand;
use App\Http\Requests\EmpDemandRequest;
use App\Http\Requests\AdminDemandRequest;
use RealRashid\SweetAlert\Facades\Alert;

class DemandController extends Controller
{

    public function index()
    {
        return view('dashboard.demand.index');
    }


    public function create()
    {

        $users = User::select(['id' , 'name'])->where('permission' , '!=' , '1')->where('id' , '!=' , auth()->id())->get();
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

        $demand = Demand::create(array_merge($request->except('files') , ['user_id' => auth()->id()]));

        $ids = User::select(['id'])->where('permission' , '=' , '1')->get();

        $demand->users()->attach($ids);




        $emails = [];
        $users = User::find($ids);
        foreach ($users as $email) {
            $emails[] = $email->email;
        }

        foreach ($ids as $i)
        {
            $user = User::find($i->id);
            $user->notify(new \App\Notifications\DemandNotification($demand->title ,  auth()->user()['name'] , $demand->id));
        }

        $user_name = auth()->user()['name'];

        $date = ['demand' => $demand , 'user_name' => $user_name , 'emails' => $emails];
        $this->dispatch(new \App\Jobs\DemandEmailRequestJob($date));

        toast('تم إرسال الطلب للمدير.','success');
        return redirect()->back()->with('success' , 'تم إرسال الطلب للمدير.');

    }




//EmpDemandRequest
    public function store(EmpDemandRequest $request)
    {

       $demand = Demand::create(array_merge($request->except(['emp_name' , 'files']) , ['user_id' => auth()->id()]) );

       $ids = $request->emp_name;
       $demand->users()->attach($ids);

       $emails = [];
       $users = User::find($ids);
        foreach ($users as $email) {
            $emails[] = $email->email;
        }

        foreach ($request->emp_name as $id)
        {
         $user = User::find($id);
         $user->notify(new \App\Notifications\DemandNotification($demand->title ,  auth()->user()['name'] , $demand->id));
        }

        $user_name = auth()->user()['name'];

        $date = ['demand' => $demand , 'user_name' => $user_name , 'emails' => $emails];
        $this->dispatch(new \App\Jobs\DemandEmailRequestJob($date));
        toast('تم إرسال الطلب للاعضاء بنجاح.','success');

        return redirect()->back();

    }





    public function showAllMyMessages()
    {
        $user = User::find(auth()->id());
        $demands = $user->my_demands()->paginate(5);

        if ($demands->count() == 0)
        {
            Alert::info('الصندوق فارغ!', 'صندوق الطالبات فارغ .');
        }

        return view('dashboard.demand.show-demand.show_my' , ['demands' => $demands]);

    }






    public function showSingleMessages($id_not, $id_d)
    {
        $user = User::findOrFail(auth()->id());
        $user->notifications->find($id_not)->markAsRead();

        $sender_name = $user->notifications->find($id_not)->data['sender_name'];
        $demand = Demand::findOrFail($id_d);



        return view('dashboard.demand.show-demand.show_single' , ['demand' => $demand , 'sender_name' => $sender_name ]);

    }


        public function showInboxMessages()
    {
        $user = User::find(auth()->id());
        $demands = $user->demands()->paginate(5);

        if ($demands->count() == 0)
        {
            Alert::info('الصندوق فارغ!', 'صندوق الطالبات فارغ .');
        }

        return view('dashboard.demand.show-demand.inbox_show' , ['demands' => $demands]);

    }


    public function getTypeMessages(Request $request)
    {

        $user = User::find(auth()->id());
        $demands = $user->demands()->where('status' , '=' , $request->status) ->paginate(10);

        if ($demands->count() == 0)
        {
            Alert::info('لا يوجد شئ');
        }

        return view('dashboard.demand.show-demand.inbox_show' , ['demands' => $demands]);

    }

}
