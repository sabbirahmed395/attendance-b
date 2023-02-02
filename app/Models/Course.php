<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'program_id',
        'course_code',
        'course_title',
        'credit_hours'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($teacher) {
            $teacher->created_by = auth()->user()->id;
        });

        static::updating(function ($teacher) {
            $teacher->updated_by = auth()->user()->id;
        });

        static::deleting(function ($teacher) {
            $teacher->deleted_by = auth()->user()->id;
        });
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    // /**
    //  * Get all the students enrolled in this course
    //  *
    //  * @return void
    //  */
    // public function students()
    // {
    //     return $this->morphedByMany(Student::class, 'association');
    // }

    // /**
    //  * Get all the teachers enrolled in this course
    //  *
    //  * @return void
    //  */
    // public function teachers()
    // {
    //     return $this->morphedByMany(Teacher::class, 'association');
    // }

    /**
     * Has many attendance relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    /**
    * Get all the class rooms
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
}
