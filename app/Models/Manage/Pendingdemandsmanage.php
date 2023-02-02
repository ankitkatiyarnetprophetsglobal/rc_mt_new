<?php

namespace App\Models\Manage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pendingdemandsmanage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['particulars', 'last_correspondence_regional', 'concerned_division_personnel','rowtatus','remarks'];
    public function pendingdemandsmanage(){
        return $this->hasOne(Pendingdemandsmanage::class,'id','Pendingdemands_id');
    }
    protected $guarded =[];
}
