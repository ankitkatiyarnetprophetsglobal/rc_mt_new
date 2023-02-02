<?php

namespace App\Models\Manage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Miscretirement extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['retir_name_employee', 'retir_name_designation', 'name_place_posting','details_date_retirement','details_name_group','leave_encashment','details_pension','gratuity','commutation','starting_date_pension','remarks'];
    public function miscretirement(){
        return $this->hasOne(Miscretirement::class,'id','miscretirement_id');
    }
    protected $guarded =[];
}
