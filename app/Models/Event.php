<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Event extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['user_id', 'title', 'thumbnail', 'category', 'desc', 'max_user', 'total_prize', 'closed_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

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
        return $this->hasMany(FormQuestion::class, 'event_id');
    }

    public function prizes()
    {
        return $this->hasMany(Prize::class, 'event_id');
    }

    public function timelines()
    {
        return $this->hasMany(Timeline::class, 'event_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'event_user', 'event_id', 'user_id');
    }
}
