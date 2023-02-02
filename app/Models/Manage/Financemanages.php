<?php

namespace App\Models\Manage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Masters\Finance;
class Financemanages extends Model
{
    use HasFactory;
    use SoftDeletes;
    // protected $fillable = ['project_title'];
    protected $fillable = ['scheme_name', 'budget_code', 'be_re'];
    public function finance(){
        return $this->hasOne(Finance::class,'id','finance_id');
    }
    protected $guarded =[];
}
