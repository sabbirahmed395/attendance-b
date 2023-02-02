<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'class_session_id',
        'student_id',
        'is_present'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_present' => 'boolean',
        'date' => 'datetime:Y-m-d'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($student) {
            $student->created_by = auth()->user()->id;
        });

        static::updating(function ($student) {
            $student->updated_by = auth()->user()->id;
        });
    }

    /**
     * Course relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Student relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function class_session()
    {
        $this->belongsTo(ClassSession::class);
    }
}
