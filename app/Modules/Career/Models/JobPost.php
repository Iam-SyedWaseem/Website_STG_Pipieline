<?php

namespace App\Modules\Career\Models;

use App\Modules\Department\Models\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    protected $table = "job_posting";

    protected $fillable = ['dept_id','title', 'job_type', 'description','skills','location','posted_date','expiry_date','is_active'];

    public function department()
    {
       return $this->belongsTo(Department::class,'dept_id');
    }

}
