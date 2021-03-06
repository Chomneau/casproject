<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeProfile extends Model
{
    public function StudentProfile(){
    	return $this->hasMany(StudentProfile::class);
    }

    public function assignment(){
        return $this->hasMany(Assignment::class);
    }

    public function Lessonplan()
    {
        return $this->hasMany(Lessonplan::class);
    }

    public function Teacher(){
    	return $this->hasOne(Teacher::class);
    }
}
