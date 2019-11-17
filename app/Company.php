<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Job;

class Company extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
