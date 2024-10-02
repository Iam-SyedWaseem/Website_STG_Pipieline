<?php

namespace App\Modules\Career\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $table = "application";

    protected $fillable = ['job_id','first_name','last_name','email','country_code','phone_number','resume_url','cover','status'];

    public function job() 
    {
        return $this->belongsTo(JobPost::class,'job_id');
    }

    public function getfullNameAttribute($key)
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function getfullPhoneNumberAttribute()
    {
        return $this->country_code.' '.$this->phone_number;

    }
   
}
