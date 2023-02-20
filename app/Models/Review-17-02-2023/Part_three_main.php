<?php

namespace App\Models\review;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\discplinesMappingMaster;


class Part_three_main extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'part_three_mains';

    function DisData(){
        return $this->hasMany(part_three_dis_discounted::class,'form_id','id');
    }
    function AddData(){
        return $this->hasMany(Part_three_dis_added::class,'form_id','id');
    }
    function AddDisc(){
        return $this->hasMany(Part_three_table_discipline::class,'form_id','id');
    }
    function coacheDisc(){
        return $this->hasMany(part_three_table_coache::class,'form_id','id');
    }
    public function center(){
        return $this->hasOne(discplinesMappingMaster::class,'ncoe_id','created_for');
    }
}
