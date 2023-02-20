<?php

namespace App\Models\review;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\discplinesMappingMaster;

class Part_two_kitchen_dining extends Model
{
    use HasFactory;
    protected $table = 'part_two_kitchen_dinings';                      
    public $timestamps = false;    
    public function center(){
        
        return $this->hasOne(discplinesMappingMaster::class,'ncoe_id','created_for');
    }                 
}
