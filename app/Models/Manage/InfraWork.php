<?php

namespace App\Models\Manage;

use App\Models\Masters\Infrastructure;
use App\Models\Template;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class InfraWork extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];

    public function infrastructure(){
        return $this->hasOne(Infrastructure::class,'id','infra_id');
    }
    
    public function template(){
        return $this->hasOne(Template::class,'id','template_id');
    }
    
}
