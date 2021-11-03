<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\saat;
use App\Models\randevu;
class indexcontroller extends Controller
{
    public function index($date=""){
        
        if($date==""){
            $date=date('Y-m-d');
        }
        $day=date('l',strtotime($date));
       
        if($day=='Monday'){$day=1;}
        if($day=='Tuesday'){$day=2;}
        if($day=='Wednesday'){$day=3;}
        if($day=='Thursday'){$day=4;}
        if($day=='Friday'){$day=5;}
        if($day=='Saturday'){$day=6;}
        if($day=='Sunday'){$day=7;}

        $saatler=saat::where('day',$day)->get();
        $returnArray=[];
        foreach($saatler as $saat){
            $control=randevu::where('date',$date)->where(function($control){
            $control->orWhere('isAktive',0);
            $control->orWhere('isAktive',2);
        })->where('workingHour',$saat->id)->count();
            //randevu saatinden önceki saatleri göstermiyoru
            $randevuSaat=explode('-',$saat->hours);
            $now=date('H.i');
            if($control==0 && $randevuSaat[0]>$now){
                $saat->isAktive=true;                    
            }

            


            else{
                $saat->isAktive=false;
            }
            

        }
        
        return response()->json($saatler);
    }
    public function randevuKaydet(Request $request){
       $returnArray=[];
        $returnArray['status']='false';
        $all=$request->except('_token'); //token harici tüm verileri aldık
        $control=Randevu::where('date',$all['date'])->where(function($control){
            $control->orWhere('isAktive',0);
            $control->orWhere('isAktive',2);
        })->where('workingHour',$all['workingHour'])->count();
        if($control!=0){
            $returnArray['message']='Bu randevu tarihi doludur';
            return response()->json($returnArray);
        }
        $all['code']=substr(md5(uniqid()),0,6);
        $create=Randevu::create($all);
        if($create){
           $returnArray['status']='true';
           $returnArray['message']='Randevunuz Başarıyla Oluşturuldu';
        }
        else{
             $returnArray['message']='Randevunuz Oluşturulamadı.Bizimle iletişime geçiniz';

        }
         return response()->json($returnArray);
    }
    public function bugunrandevular(){
        $data=randevu::where('isAktive',2)->where('date',date('Y-m-d'))->with('saatadi')->paginate(3);
        return response()->json($data);
    }
    public function gelecekrandevular(){
        $data=randevu::where('isAktive',2)->where('date','>',date('Y-m-d'))->with('saatadi')->paginate(3);
        return response()->json($data);
    }
    public function gecmisrandevular(){
        $data=randevu::where('isAktive',2)->where('date','<',date('Y-m-d'))->with('saatadi')->paginate(3);
        return response()->json($data);
    }
    public function onaybekleyenrandevular(){
        $data=randevu::where('isAktive',0)->with('saatadi')->paginate(3);
        return response()->json($data);
    }
    public function iptalrandevular(){
        $data=randevu::where('isAktive',1)->with('saatadi')->paginate(3);
        return response()->json($data);
    }
    public function durum(Request $request){
        

        $randevu=randevu::findOrFail($request->id);
        $randevu->isAktive=$request->type;
        $randevu->save();
        return response()->json(['status'=>true]);
    }
    public function randevusorgulama(){
        return view('randevu-sorgulama');
    }
}
