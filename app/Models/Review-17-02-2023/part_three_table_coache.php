<?php

namespace App\Models\Review;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\discplinesMappingMaster;

class part_three_table_coache extends Model
{
    use HasFactory,SoftDeletes;
    public $timestamps = false;  
    public function center(){
        return $this->hasOne(discplinesMappingMaster::class,'ncoe_id','created_for');
    }
    
}
