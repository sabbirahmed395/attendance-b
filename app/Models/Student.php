<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'batch_id',
        'student_id',
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'description'
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

        static::deleting(function ($student) {
            $student->deleted_by = auth()->user()->id;
        });
    }

    // /**
    //  * Get all the courses for enrollment
    //  *
    //  * @return void
    //  */
    // public function enrolls(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    // {
    //     return $this->morphToMany(Course::class, 'association');
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
     * Return belongs to relationship with batch
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
