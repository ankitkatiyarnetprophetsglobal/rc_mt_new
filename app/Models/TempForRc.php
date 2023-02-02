<?php

namespace App\Models;

use App\Models\Manage\InfraWork;
use App\Models\Manage\ProcurementFirstForm;
use App\Models\Manage\ProcurementSecondForm;
use App\Models\Manage\ProcurementServiceForm;
use App\Models\Manage\ProcurementThirdForm;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RcDetail;
class TempForRc extends Model
{
    use HasFactory;
    protected $table = 'template_for_rc';
    public function rc_details(){
        return $this->hasOne(RcDetail::class,'id','rc_id');
    }
    
    public function InfraWork(){
        return $this->hasMany(InfraWork::class,'template_id','template_id');
    }
    public function ProcurementFirstForm(){
        return $this->hasMany(ProcurementFirstForm::class,'template_id','template_id');
    }
    public function ProcurementSecondForm(){
        return $this->hasMany(ProcurementSecondForm::class,'template_id','template_id');
    }
    public function ProcurementThirdForm(){
        return $this->hasMany(ProcurementThirdForm::class,'template_id','template_id');
    }
    public function ProcurementServiceForm(){
        return $this->hasMany(ProcurementServiceForm::class,'template_id','template_id');
    }
}
