<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Job;

class Company extends Model
{
    protected $fillable = ['user_id', 'cname', 'slug', 'address', 'phone', 'website', 'logo', 'cover_photo', 'slogan', 'description'];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
