<?php

namespace App\Models\review;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\discplinesMappingMaster;
class FormTwoEquipment_consumable extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'part_two_equipments_consumable';
    public function center(){
 
        return $this->hasOne(discplinesMappingMaster::class,'ncoe_id','created_for');
    } 
}
