<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'role_id',
        'user_type',
        'department_id',
        'designation_id',
        'address',
        'state_id',
        'city_id',
        'pincode',
        'is_active',
        'mobile',
        'email',
        'created_by',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function image()
    {
        return $this->morphOne(AssetFile::class, 'pictureable','model_type', 'model_id')->latestOfMany();
    }

    public function state(){
        return $this->belongsTo(State::class,'state_id');
    }

    public function city(){
            return $this->belongsTo(City::class,'city_id');
        }

    public function team(){
        return $this->belongsTo(Team::class,'team_id');
    }

    public function designation(){
        return $this->belongsTo(Designation::class,'designation_id');
    }

    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }

    public function creator(){
        return $this->belongsTo(User::class,'created_by');
    }
}
