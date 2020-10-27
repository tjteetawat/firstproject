<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $url = "https://notify-api.line.me/api/notify";
        $client = new Client();
        $now = Carbon::now();
        $message = "ทดสอบ Line Notification-".$now;
        $res = $client->request('POST', $url, [
            'headers'   =>[
                'Accept'            => '/',
                'content-type'      => 'application/x-www-form-urlencoded',
                'Authorization'     => 'Bearer TfWkVSNG0ZIXp5yGxYHOSM1n9syB9T2FaRAsP9TrV6v'
            ],
            'form_params' => [
                'message'   =>      $message
            ],
        ]);

        echo $res->getStatusCode();
        return view('home');
    }

    public function password(){

        $user = auth()->user();

        return view('password_change');

    }

    public function changepassword(Request $request){

        $req =  $request->all();
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:5|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");


    }


}
