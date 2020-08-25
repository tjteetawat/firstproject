<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homework;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeworks = Homework::all();
        return view('homework')->with('homeworks',$homeworks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $req = $request->all();
        if($req['order_date']  > $req['submit_date']){

            $homeworks = Homework::all();
            return view('homework')->with('homeworks',$homeworks);

        }

        $homework = new Homework;
        $homework->subject =$req['subject'];
        $homework->title =$req['title'];
        $homework->details =$req['details'];
        $homework->status ='ยังไม่ส่ง';
        $homework->order_date =$req['order_date'];
        $homework->submit_date=$req['submit_date'];
        $homework->save();

        $homeworks = Homework::all();
        return view('homework')->with('homeworks',$homeworks);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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

    public function history(){

        $homeworks = Homework::all();

        return view('history')->with('homeworks',$homeworks);
    }
}
