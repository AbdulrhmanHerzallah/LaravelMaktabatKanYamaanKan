<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Resources\MyEventResource;
use Illuminate\Support\Facades\Storage;
use App\Models\Commit;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\CommitResource;
use App\Http\Requests\EventRequest;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{

    public function index()
    {
        $user = User::find(auth()->id());
        $events = $user->events()->paginate(10);
        return view('dashboard.event.events-listed.index' , ['events' => $events]);
    }

    public function calendar()
    {
        $user = User::find(auth()->id());

        $events = $user->events;
        $last_event = $user->events->last();
        return view('dashboard.event.events-listed.calendar' , ['events' => $events , 'last_event' => $last_event]);
    }


    public function create()
    {

       $users = User::all('id' , 'name');

        return view('dashboard.event.create' , ['users' => $users]);
    }

    public function store(EventRequest $request)
    {

        if ($request->hasFile('file'))
        {
            $file = $request->file('file');
            $fileOriginalName = $file->getClientOriginalName();
            $fileOriginalExtension = $file->getClientOriginalExtension();
            Storage::makeDirectory('app/files/'. $fileOriginalExtension);
            $file_path = $file->storeAs('app/files/'.$fileOriginalExtension , $fileOriginalName);
        }


        $event = Event::create(array_merge($request->except('team' , 'file')
            , ['user_id' => auth()->id() , 'file_name' => $fileOriginalName ?? null , 'file_path' => $file_path ?? null]
        ));

       $ids = $request->team;
       $event->common_users()->sync(array_merge($ids , [auth()->id() , $request->leader_id]));

        Alert::success('تم إضافة مهمة', $request->title);

        return redirect()->back();

    }


    public function show($id)
    {
        $event = Event::findOrFail($id);
        $leader = $event->leader->name;
        $member_users = $event->users->map(function ($i){
         return $i->name;
     });

       $commits = $event->commits;

        return view('dashboard.event.events-listed.show' ,
            ['event' => $event , 'leader' => $leader , 'members' => $member_users , 'commits' => $commits ]
        );

    }

    public function download_file($id)
    {
        $event = Event::findOrFail($id);
        $file_path = $event->file_path;
        $file_name = $event->file_name;
        return Storage::download($file_path , $file_name);
    }


    public function commit(Request $request)
    {

        $request->validate([
            'commit' => 'required'
        ] , $request->all());

        $event = Event::find($request->id);
        $commit = new Commit();
        $commit->commit =  $request->commit;
        $commit->user_id =  auth()->id();
        $event->commits()->save($commit);
        toast('تم إضافة ملاحظة','success');
        return redirect()->back();
    }


    public function update_commit(Request $request)
    {
        $request->validate([
            'commit' => 'required'
        ] , $request->all());

        $commit = Commit::find($request->id);
        $commit->commit = $request->commit;
        $commit->save();
        toast('تم تحديث الملاحظة','success');
        return redirect()->back();
    }

    public function delete_commit(Request $request)
    {
        $commit = Commit::find($request->id);
        $commit->delete();
        toast('تم حذف التعليق','success');

        return redirect()->back();
    }



}
