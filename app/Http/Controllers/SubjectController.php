<?php

namespace App\Http\Controllers;
use App\Subject;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function create(){
       return view('create_subject');
    }

    public function store(Request $request){

        $req = $request->all();
        $subject = new Subject;
        $subject->name = $req['subject'];
        $subject->teacher_name = $req['teacher'];
        $subject->save();

        return redirect('homework');
    }
}

