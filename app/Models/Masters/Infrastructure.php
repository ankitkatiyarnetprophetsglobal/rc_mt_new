<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Infrastructure extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function agency(){
        return $this->hasOne(Agency::class,'id','agency_id');
    }
    public function centername(){
        return $this->hasOne(Rcacademymapping::class,'academy_id','project_center_id');
    }

    // public fuction rc_mapping(){
    //     return this->hasOne(Rcacademymapping::class ,'project_center_id','id')
    // }
    
}
