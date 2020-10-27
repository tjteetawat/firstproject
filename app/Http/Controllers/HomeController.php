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
}
