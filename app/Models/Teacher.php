<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'teacher_id',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'designation',
        'description'
    ];

    public static $designation = [
        'lecturer',
        'assistant professor',
        'associate professor',
        'professor'
    ];

    // public $with = ['user'];

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

    // /**
    // * Get all the courses for assign
    // *
    // * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
    // */
    // public function assigns(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    // {
    //     return $this->morphToMany(Course::class, 'association');
    // }

    public function user()
    {
        if (!is_null($this->user_id)) {
            return $this->belongsTo(User::class);
        }

        return null;
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
