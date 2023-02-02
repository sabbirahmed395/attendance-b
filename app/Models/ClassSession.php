<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSession extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'classroom_id',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'datetime:Y-m-d'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($classSession) {
            $classSession->created_by = auth()->user()->id;
        });

        static::updating(function ($classSession) {
            $classSession->updated_by = auth()->user()->id;
        });

        static::deleting(function ($classSession) {
            $classSession->deleted_by = auth()->user()->id;
        });
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
