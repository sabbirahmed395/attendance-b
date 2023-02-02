<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'program_id',
        'batch_no'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($batch) {
            $batch->created_by = auth()->user()->id;
        });

        static::updating(function ($batch) {
            $batch->updated_by = auth()->user()->id;
        });

        static::deleting(function ($batch) {
            $batch->deleted_by = auth()->user()->id;
        });
    }

    /**
    * Get all the courses
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    /**
    * Get all the class rooms
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function classrooms()
    {
        return $this->hasMany(ClassRoom::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
