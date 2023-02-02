<?php

namespace App\Models\Manage;

use App\Models\Masters\Miscmaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Miscellaneousmanages extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['detail_cwp_slp', 'court', 'court_case','parties','case_ststus','name_counsel','last_date_hearing','last_hearing_status','present_status','next_day_hearing','remarks'];
    public function miscellaneousmanages(){
        return $this->hasOne(Miscellaneousmanages::class,'id','miscellaneous_id');
    }
    protected $guarded =[];

    public function miscMaster(){
        return $this->hasOne(Miscmaster::class,'id','detail_cwp_slp');
    }
}
