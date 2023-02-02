<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rcacademymapping extends Model
{
    use HasFactory;
    public function center_get(){
        return $this->hasOne(Rcacademymapping::class,'id','academy_id');
    }
}
