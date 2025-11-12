<?php

namespace Modules\User\App\Models;

use Spatie\Activitylog\LogOptions;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Activitylog\Traits\LogsActivity;
use Modules\Notification\App\Models\Notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, HasRoles, LogsActivity;

    protected $fillable = ['name', 'email', 'phone', 'password', 'role', 'is_active', 'image', 'identity_number', 'username', 'national_number', 'birth_date', 'file'];
    protected $hidden = ['password', 'remember_token'];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->useLogName('User')
            ->dontLogIfAttributesChangedOnly(['updated_at']);
    }
    /**
     * The attributes that are mass assignable.
     */


    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d h:i A');
    }
    public function getImageAttribute($value)
    {
        if ($value != null && $value != '') {
            if (filter_var($value, FILTER_VALIDATE_URL)) {
                return $value;
            } else {
                return asset('uploads/user/' . $value);
            }
        }
    }

    public function getFileAttribute($value)
    {
        if ($value != null && $value != '') {
            if (filter_var($value, FILTER_VALIDATE_URL)) {
                return $value;
            } else {
                return asset('uploads/user/file/' . $value);
            }
        }
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
    //Relation

    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }

    //JWT

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
}
