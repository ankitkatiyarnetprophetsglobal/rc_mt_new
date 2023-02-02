<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Miscmaster extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFactory;
    protected $table = 'misc_master';
    public function all_miscmaster(){
        return $this->hasOne(Agency::class,'id','agency_id');
    }
    public function centername(){
        return $this->hasOne(Rcacademymapping::class,'academy_id','project_center_id');
    }
}
