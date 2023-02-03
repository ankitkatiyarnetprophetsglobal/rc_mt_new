<?php

namespace App\Models\review;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formtwomain extends Model
{
    use HasFactory;
    protected $table = 'form_two_main';

    function playField(){
        return $this->hasMany(Form_two::class,'form_id','id');
    }
    function playFieldAccomadaion(){
        return $this->hasMany(Part_two_achieve_accommods::class,'form_id','id');
    }
}
