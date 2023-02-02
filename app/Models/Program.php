<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
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

    /**
    * Get all the courses
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    /**
    * Get all the courses
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function batches()
    {
        return $this->hasMany(Batch::class);
    }
}
