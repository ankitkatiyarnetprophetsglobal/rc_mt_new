<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProcurementMaster extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'procurement_master';
    public function centername(){
        return $this->hasOne(Rcacademymapping::class,'academy_id','project_center_id');
    }
}
