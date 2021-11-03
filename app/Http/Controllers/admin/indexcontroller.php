<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\saat;
use App\Models\Randevu;
use App\Models\randevunot;
class data {

    public $Success;
    public $Message;
    public $Data;
    public $Redirect;  
  
    // public function __set($name, $value) {}
  
    
}
class indexcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('calisma-saatleri');
    }
     public function testindex()
    {
        return view('test');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getcalismalist()
    {
        $data=saat::get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $all=$request->except('_token');
        saat::query()->delete();
        foreach($all as $key=>$value){
            foreach($value as $k=>$v){
                if($key=='pazar'){
                     $key=7;
                }
                if($key=='cumartesi'){
                     $key=6;
                }
                if($key=='cuma'){
                     $key=5;
                }
                if($key=='persembe'){
                     $key=4;
                }
                if($key=='carsamba'){
                     $key=3;
                }
                if($key=='sali'){
                     $key=2;
                }
                if($key=='pazartesi'){
                     $key=1;
                }

                saat::create([
                    'day'=>$key,
                    'hours'=>$v
                ]);
            }
            
        }
        
        return response()->json($all);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function randevudetay($id)
    {
        $data=Randevu::where('id',$id)->with('saatadi')->with('randevunotu')->first();
        return response()->json($data);
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
    public function randevuhastaekrani(Request $request)
    {   
       
        $count=Randevu::where('code',$request->code)->count();
        $returnArray=[];
        if($count>0){
              
              $data=Randevu::where('code',$request->code)->with('saatadi')->with('randevunotu')->first();
              $data->status=true;
            return response()->json($data);
        }
        else{  
            $data = new data;
              $data->status=false;
              $data->Message='takip numarasına ait kayıt bulunamadı';
              return response()->json($data);
        }
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function notekle(Request $request)
    {   
         $sonuc=randevunot::create([
                'randevu_id'=>$request->id,
                'text'=>$request->text
                

             ]);
         if($sonuc){
            return response()->json(['status'=>true]);
         }
         else{
            return response()->json(['status'=>false]);
         }
        
    }

}
