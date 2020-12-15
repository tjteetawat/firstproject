<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Homework;
use GuzzleHttp\Client;

class sendLine extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Line:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'line notifly';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $today = Carbon::today();
        $find_day = $today->add(2,'day');
        $homeworks=Homework::where('submit_date',$find_day)->get();
        foreach ($homeworks as $homework) {
            $message = "อย่าลืมทำการบ้าน!!! วิชา ".$homework->subject." อีก2วันส่ง!!!";
            $this->send_sms($message);
            $this->info('notified sent');
        }


    }

    function send_sms($message){

        $url = "https://notify-api.line.me/api/notify";
        $client = new Client();
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
    }
}
