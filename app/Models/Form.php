<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Form extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['user_id', 'title', 'desc', 'max_user', 'closed_at'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function formQuestion()
    {
        return $this->hasMany(FormQuestion::class, 'form_id');
    }
}