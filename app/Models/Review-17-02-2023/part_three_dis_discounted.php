<?php

namespace App\Models\review;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\discplinesMappingMaster;

class part_three_dis_discounted extends Model
{
    use HasFactory,SoftDeletes;
    // part_three_dis_discounteds
    protected $table = 'part_three_dis_discounted';
   
    public function center(){
        return $this->hasOne(discplinesMappingMaster::class,'ncoe_id','created_for');
    }
}
