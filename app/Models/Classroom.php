<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classroom extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'batch_id',
        'course_id',
        'status'
    ];

    protected $appends = ['name'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($classroom) {
            $classroom->created_by = auth()->user()->id;
        });

        static::updating(function ($classroom) {
            $classroom->updated_by = auth()->user()->id;
        });

        static::deleting(function ($classroom) {
            $classroom->deleted_by = auth()->user()->id;
        });
    }

    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->course->course_code . '-' . $this->batch->batch_no,
        );
    }

    /**
    * Get batch information
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    /**
    * Get course information
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function class_sessions()
    {
        return $this->hasMany(ClassSession::class);
    }
}
