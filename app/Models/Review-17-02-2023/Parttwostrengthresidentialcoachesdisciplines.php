<?php

namespace App\Models\Review;

use App\Models\Masters\Miscmaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\discplinesMappingMaster;

class parttwostrengthresidentialcoachesdisciplines extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'strength_residential_coaches_discipline_id',
        'strength_residential_coaches_2018_19_resi_m',
        'strength_residential_coaches_2018_19_resi_f',
        'strength_residential_coaches_2018_19_nr_f',
        'strength_residential_coaches_2018_19_nr_c',
        'strength_residential_coaches_2019_20_resi_m',
        'strength_residential_coaches_2019_20_resi_f',
        'strength_residential_coaches_2019_20_nr_m',
        'strength_residential_coaches_2019_20_nr_f',
        'strength_residential_coaches_2019_20_nr_c',
        'strength_residential_coaches_2020_21_resi_m',
        'strength_residential_coaches_2020_21_resi_f',
        'strength_residential_coaches_2020_21_nr_f',
        'strength_residential_coaches_2020_21_nr_c',
        'strength_residential_coaches_2022_22_resi_m',
        'strength_residential_coaches_2022_22_resi_f',
        'strength_residential_coaches_2022_22_nr_f',
        'strength_residential_coaches_2022_22_nr_c',
        'strength_residential_coaches_2022_23_resi_m',
        'strength_residential_coaches_2022_23_resi_f',
        'strength_residential_coaches_2022_23_nr_m',
        'strength_residential_coaches_2022_23_nr_f',
        'strength_residential_coaches_2022_23_nr_c',
        'status',
        'remarks'];
        

        public function center(){
 
            return $this->hasOne(discplinesMappingMaster::class,'ncoe_id','created_for');
        } 
}
