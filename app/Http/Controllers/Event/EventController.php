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

class EventController extends Controller
{

    public function index()
    {

        $events = Event::select('*')->where('user_id' , '=' , auth()->id())->get();


            $last_event_default =  Event::select('start')->where('user_id' , '=' , auth()->id())->get()->last();
            $events = MyEventResource::collection($events);
        return view('dashboard.event.my-event.index' , ['event' => $events  , 'default' => $last_event_default]);
    }


    public function create()
    {

       $users = User::all('id' , 'name');

        return view('dashboard.event.create' , ['users' => $users]);
    }

    public function store(Request $request)
    {

       $file = $request->file('file');
       $fileOriginalName = $file->getClientOriginalName();
       $fileOriginalExtension = $file->getClientOriginalExtension();
       Storage::makeDirectory('app/files/'. $fileOriginalExtension);
       $file_path = $file->storeAs('app/files/'.$fileOriginalExtension , $fileOriginalName);

        $event = Event::create(array_merge($request->except('team' , 'file')
            , ['user_id' => auth()->id() , 'file_name' => $fileOriginalName , 'file_path' => $file_path]
        ));

       $ids = $request->team;
       $event->common_users()->attach($ids);
    }


    public function show($id)
    {
        $event = Event::findOrFail($id);
        $leader = $event->leader->name;
        $member_users = $event->users->map(function ($i){
         return $i->name;
     });

       $commits = $event->commits;
        foreach ($commits as $key => $commit){
            $comm[$key]['id'] = $commit->id;
            $comm[$key]['commit'] = $commit->commit;
            $comm[$key]['user_id'] = $commit->user_id;
            $comm[$key]['before'] = $commit->updated_at->diffForHumans();
            $comm[$key]['name'] = User::find($commit->id)->name;
        }

        return view('dashboard.event.my-event.show' ,
            ['event' => $event , 'leader' => $leader , 'members' => $member_users , 'commits' => $comm ]
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
        $event = Event::find($request->id);
        $commit = new Commit();
        $commit->commit =  $request->commit;
        $commit->user_id =  auth()->id();
        $event->commits()->save($commit);
    }


    public function update_commit(Request $request)
    {
        $commit = Commit::find($request->id);
        $commit->commit = $request->commit;
        $commit->save();
        return redirect()->back();
    }

    public function delete_commit(Request $request)
    {
        $commit = Commit::find($request->id);
        $commit->delete();
        return redirect()->back();
    }



}
