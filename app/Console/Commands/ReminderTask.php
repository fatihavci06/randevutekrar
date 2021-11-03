<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Randevu;
use App\Models\saat;
use Mail;
class ReminderTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Reminder:Start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $date=date('Y-m-d');
        $nextDate=date('Y-m-d',strtotime("+1 Day",time()));
        $list=Randevu::whereIn('date',[$date,$nextDate])->where('isAktive',1)->where('isSend',0)->with('saatadi')->get();
       

        foreach ($list as $l)
        {
           

        



            if($l->notification_type == 1) {
                $details  = [
                  'name'=>$l->fullname,
                  'email'=>$l->email,
                  'date'=>$l->date,
                  'time'=>$l->saatadi->hours
                  
                ];

                try {
                    Mail::to($l->email)->send(new \App\Mail\MyTestMail($details)); //mytestmail classıma $details gönderdim 
                    Randevu::where('id',$l->id)->update(['isSend'=>1]);
                }
                catch (\Exception $e)
                {
                    Randevu::where('id', $l->id)->update(['isSend' => 2]);
                }
            }
            if($l->notification_type == 0){
                $username = '05552846584';
                $password = 'gy741852';
                $origin_name = 'muratyener';
                $message = 'Merhaba '.$l->fullname.' , Randevunuz '.$l->date.' tarihinde '.Randevu::getString($l->workingHour).'  saatleri arasındadır.Takip Kod:'.$l->id;
                $number = str_replace('-','',$l->phone);
                $xml = '<request>
                         <authentication>
                             <username>'.$username.'</username>
                             <password>'.$password.'</password>
                         </authentication>
                         <order>
                             <sender>'.$origin_name.'</sender>
                             <sendDateTime>'.date("d/m/Y H:i").'</sendDateTime>
                             <message>
                                 <text>'.$message.'</text>
                                 <receipents>
                                     <number>'.$number.'</number>
                                 </receipents>
                             </message>
                         </order>
                     </request>';
                     $result = self::sendRequest('http://api.iletimerkezi.com/v1/send-sms',$xml,array('Content-Type: text/xml'));
                try {
                    $xml = new \SimpleXMLElement($result);

                    if ($xml->status->code == '200') {
                        Randevu::where('id', $l->id)->update(['isSend' => 1]);
                    }
                    else
                    {
                        Randevu::where('id', $l->id)->update(['isSend' => 0]);
                    }

                }
                catch (\Exception $e)
                {

                }
            }
        }
    }

     static function sendRequest($site_name,$send_xml,$header_type) {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$site_name);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$send_xml);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,1);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$header_type);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);

        $result = curl_exec($ch);

        return $result;
    }

}