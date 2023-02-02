<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateSection extends Model
{
    use HasFactory;
    protected $table = 'temp_sections';

    public function section(){
        return $this->hasOne(Section::class,'id','section_id');
    }
}
