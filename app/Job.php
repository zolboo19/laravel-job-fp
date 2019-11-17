<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;

class Job extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
