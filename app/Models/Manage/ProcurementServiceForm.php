<?php

namespace App\Models\Manage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Masters\ProcurementService;
class ProcurementServiceForm extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'procurement_service_forms';
    public function procurementService(){
        return $this->hasOne(ProcurementService::class,'id','title_id');
    }
}
