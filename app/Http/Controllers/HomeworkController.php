<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Homework;
use App\Subject;
use RealRashid\SweetAlert\Facades\Alert;
use GuzzleHttp\Client;
use Carbon\Carbon;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeworks = Homework::where('status',"ยังไม่ส่ง")
        ->orWhere('status', 'กำลังทำ')
        ->take(50)
        ->get();

        $subjects = Subject::all();

        return view('homework')
        ->with('homeworks',$homeworks)
        ->with('subjects',$subjects);
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

    function send_sms($message){

        $url = "https://notify-api.line.me/api/notify";
        $client = new Client();
        $res = $client->request('POST', $url, [
            'headers'   =>[
                'Accept'            => '/',
                'content-type'      => 'application/x-www-form-urlencoded',
                'Authorization'     => 'Bearer '.config('line.token')
            ],
            'form_params' => [
                'message'   =>      $message
            ],
        ]);
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

        $order_date =Carbon::parse($req['order_date'])->format('d/m/y');
        $submit_date =Carbon::parse($req['submit_date'])->format('d/m/y');

        $diff = Carbon::parse($req['order_date'])->diffInDays($req['submit_date']);


        if($req['order_date']  > $req['submit_date']){

            return redirect('homework');

        }

        $homework = new Homework;
        $homework->subject =$req['subject'];
        $homework->title =$req['title'];
        $homework->details =$req['details'];
        $homework->status ='ยังไม่ส่ง';
        $homework->order_date =$req['order_date'];
        $homework->submit_date=$req['submit_date'];
        $homework->save();


        $message = "การบ้าน ".$req['title']." วิชา ".$req['subject']." สั่งเมื่อ ".$order_date." ส่ง ".$submit_date." ระยะเวลาในการทำ ".$diff." วัน ";
        // $message = "การบ้าน Writing วิชา PNoina สั่งเมื่อ 23124 5 ส่ง 12146 ระยะเวลาในการทำ 5111 วัน";
        $this->send_sms($message);
        return redirect('homework');

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

        $homeworks = Homework::where('status',"ส่งแล้ว")->get();
        return view('history')->with('homeworks',$homeworks);
    }

    public function update_status($id,$status){

        if ($status == "no") {

            $new_status = "ยังไม่ส่ง";

        }elseif($status == "doing"){

            $new_status = "กำลังทำ";

        }elseif($status == "done"){

            $new_status = "ส่งแล้ว";
        }

        Homework::find($id)->update([
            "status"    =>  $new_status
        ]);

        if($new_status == "ส่งแล้ว"){
            return redirect('/homework')->with('warning','คุณสามารถดูการบ้านที่ส่งแล้ว ที่ history');
        }else{
            return redirect('/homework');
        }


    }

    // this function is for clear
    public function clear($id){

        $homework = Homework::find($id);
        if(!$homework){
            return redirect('/history');
        }else{
            $homework->delete();
        }

        return redirect('/history');



    }




}
