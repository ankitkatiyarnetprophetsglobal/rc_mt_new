<?php

namespace App\Models\review;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\discplinesMappingMaster;

class Part_two_other_facilitie extends Model
{
    use HasFactory;
    protected $table = 'part_two_other_facilities';                      
    public $timestamps = false; 
    public function center(){
 
        return $this->hasOne(discplinesMappingMaster::class,'ncoe_id','created_for');
    }                 
}

