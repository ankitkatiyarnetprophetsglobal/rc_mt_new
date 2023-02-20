<?php

namespace App\Models\review;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form_two extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'form_two_field_of_play';
    protected $fillable = [
        'discline_play_field',
        'no_fop_play_field',
        'fop_play_field',
        'fop_surface_play_field',
        'rating_play_field',
        'remark_play_field',
        'status'];
}
