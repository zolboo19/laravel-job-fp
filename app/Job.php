<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;

class Job extends Model
{
    protected $fillable = ['user_id', 'company_id', 'category_id', 'title', 'slug', 'description', 'role', 'position', 'address', 'type', 'status', 'last_date'];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
