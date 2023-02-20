<?php

namespace App\Models\Review;

use App\Models\Masters\Miscmaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\discplinesMappingMaster;

class Staffnutritionistchefs extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'snc_designation',
        'snc_2018_19',
        'snc_2019_20',
        'snc_2020_21',
        'snc_2021_22',
        'snc_2022_23',        
        'status',
        'remarks'
    ];

    public function center(){
 
        return $this->hasOne(discplinesMappingMaster::class,'ncoe_id','created_for');
    } 

}
