<?php

namespace App\Modules\ContactUs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ContactUs extends Model
{
    use HasFactory,Notifiable;

    protected $table = 'contactus';

    protected $fillable = ['name','email','phone_no','message','website','status'];
}
