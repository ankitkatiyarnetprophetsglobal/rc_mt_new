<?php

namespace App\Models\review;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\discplinesMappingMaster;

class part_two_utilization_fund extends Model
{
    use HasFactory;
    protected $table = 'part_two_utilization_fund';                      
    public $timestamps = false; 

    public function center(){
 
        return $this->hasOne(discplinesMappingMaster::class,'ncoe_id','created_for');
    } 
}
