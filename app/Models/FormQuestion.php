<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['form_id', 'question', 'question_type', 'is_required', 'file_rules'];

    public function form()
    {
        return $this->belongsTo(Form::class, 'form_id');
    }
}
