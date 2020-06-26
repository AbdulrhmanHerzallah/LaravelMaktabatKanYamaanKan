<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Letter;
use Carbon\Carbon;
use App\Http\Requests\LetterRequest;

use \PDF;

class LetterController extends Controller
{
    public function create()
    {
        return view('dashboard.letter.create');
    }


    public function store(Letter $letter , LetterRequest $request)
    {

        if ($request->has('save_and_create'))
        {
            $user = User::find(auth()->id());
            $letter->body = $request->input('body');
            $letter->title = $request->input('title');
            $letter->lett_data = Carbon::now()->isoFormat('YYYY-MM-DD');
            $user->letters()->save($letter);

          return  $this->create_letter($request);
        }
        else{
          return  $this->create_letter($request);
        }
    }

    public function create_letter(LetterRequest $request)
    {
        $date = Carbon::now();
       $hijri = \Alkoumi\LaravelHijriDate\Hijri::DateMediumFormat('en' , $date);

        $data = ['data' => [
            'title' => $request->input('title'),
            'body'  => $request->input('body'),
            'hijri' => $hijri
        ]];
        $pdf = PDF::loadView('pdf.letter' , $data);
        return $pdf->stream($request->input('title').'.pdf');
    }

    public function show()
    {
        $latter = Letter::orderBy('created_at', 'desc')->select(['id' , 'title' , 'created_at'])->where('user_id' , '=' , auth()->id())->paginate(5);

        return view('dashboard.letter.show' , ['latter' => $latter]);
    }

    public function show_admin()
    {
        $latter = Letter::orderBy('created_at', 'desc')->select(['id' , 'title' , 'created_at'])->paginate(5);

        return view('dashboard.letter.show' , ['latter' => $latter]);
    }

    public function download($id)
    {
        $letter = Letter::find($id);

        $date = $letter->created_at;
        $hijri = \Alkoumi\LaravelHijriDate\Hijri::DateMediumFormat('en' , $date);

        $data = ['data' => [
            'title' => $letter->title,
            'body'  => $letter->body,
            'hijri' => $hijri
        ]];
        $pdf = PDF::loadView('pdf.letter' , $data);
        return $pdf->download($letter->title.'.pdf');
    }





}
