<?php

namespace App\Models;

use App\Models\Manage\InfraWork;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\TempForRc;
class Template extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function tempForRc(){
        return $this->hasMany(TempForRc::class,'template_id','id');
    }

    public function tempSection(){
        return $this->hasMany(TemplateSection::class,'template_id','id');
    }
    
    
    
    
}
