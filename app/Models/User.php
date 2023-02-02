<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile',
        'password',
        'gender',
        'online',
        'status',
        'user_type',
        'login_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'login_at' => 'datetime',
    ];

    private static $status = [
        'unverified',
        'pending',
        'active',
        'suspend',
        'cancel'
    ];

    private static $gender = [
        'none',
        'male',
        'female'
    ];

    const STATUS_UNVERIFIED = 'unverified';
    const STATUS_PENDING = 'pending';
    const STATUS_ACTIVE = 'active';
    const STATUS_SUSPENDED = 'suspend';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->status = self::STATUS_ACTIVE;
            $user->online = "offline";
            $user->password = Hash::make(request()->password);
            // $user->created_by = auth()->user()->id;
        });

        static::updating(function ($user) {
            if (request()->has('password')) {
                $user->password = Hash::make(request()->password);
            }
            // $user->updated_by = auth()->user()->id;
        });

        static::deleting(function ($user) {
            // $user->deleted_by = auth()->user()->id;
        });
    }

    /**
    * Get the identifier that will be stored in the subject claim of the JWT.
    *
    * @return mixed
    */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function toSimple()
    {
        return $this->attributesToArray();
    }

}
