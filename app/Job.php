<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Company;
use Illuminate\Support\Facades\DB;

class Job extends Model
{
    protected $fillable = ['user_id', 'company_id', 'category_id', 'title', 'slug', 'description', 'role', 'position', 'address', 'type', 'status', 'last_date', 'number_of_vacancy', 'gender', 'experience', 'salary'];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function checkApplication()
    {
        return DB::table('job_user')->where('user_id', auth()->user()->id)
            ->where('job_id', $this->id)->exists();
    }
    public function favourite()
    {
        return $this->belongsToMany(User::class, 'favourites', 'job_id', 'user_id')->withTimestamps();
    }

    public function checkSaved()
    {
        return DB::table('favourites')->where('user_id', auth()->user()->id)
            ->where('job_id', $this->id)->exists();
    }
}
