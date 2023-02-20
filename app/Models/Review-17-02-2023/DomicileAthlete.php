<?php

namespace App\Models\Review;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\discplinesMappingMaster;

class DomicileAthlete extends Model
{
    use HasFactory;
    public function center(){
        return $this->hasOne(discplinesMappingMaster::class,'ncoe_id','created_for');
    }
}
