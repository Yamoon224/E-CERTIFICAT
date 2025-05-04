<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

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

    public function area()
	{
		return $this->belongsTo(Area::class);
	}

	public function city()
	{
		return $this->belongsTo(City::class);
	}

	public function department()
	{
		return $this->belongsTo(Department::class);
	}

	public function district()
	{
		return $this->belongsTo(District::class);
	}

	public function group()
	{
		return $this->belongsTo(Group::class);
	}

	public function certificates()
	{
		return $this->hasMany(Certificate::class, 'created_by');
	}

	public function citizens()
	{
		return $this->hasMany(Citizen::class, 'created_by');
	}

	public function citizen()
	{
		return $this->hasOne(Citizen::class, 'phone', 'phone');
	}
}
