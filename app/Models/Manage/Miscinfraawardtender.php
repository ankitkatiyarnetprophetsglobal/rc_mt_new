<?php

namespace App\Models\Manage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Miscinfraawardtender extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['infraemployee', 'infradesignation', 'encashment','pension','gratuity','commutation','remarks'];
    public function miscinfraawardtender(){
        return $this->hasOne(Miscinfraawardtender::class,'id','miscinfraawardtender_id');
    }
    protected $guarded =[];
}
