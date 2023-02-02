<?php

namespace App\Models\Manage;

use App\Models\Masters\ProcurementMaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ProcurementThirdForm extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function procurentMaster(){
        return $this->hasOne(ProcurementMaster::class,'id','title_id');
    }
}
