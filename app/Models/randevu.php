<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class randevu extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function saatadi(){
      return  $this->hasOne(saat::class, 'id', 'workingHour');  
    }
    public function randevunotu(){
      return  $this->hasMany(randevunot::class, 'randevu_id', 'id');  
    }
}
