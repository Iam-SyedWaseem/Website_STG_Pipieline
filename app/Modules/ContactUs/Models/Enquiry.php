<?php

namespace App\Modules\ContactUs\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Enquiry extends Model
{
    use HasFactory,Notifiable;
    protected $table = 'enquiries';

    protected $fillable = ['name','email','phone_no','message','ip_address','website','status','response','response_by'];
}
