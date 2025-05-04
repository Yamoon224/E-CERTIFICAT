<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Citizen
 * 
 * @property int $id
 * @property string $firstname
 * @property string $name
 * @property string $gender
 * @property Carbon $birthday
 * @property string $birthplace
 * @property string $phone
 * @property string|null $email
 * @property string $profession
 * @property string|null $role
 * @property string $father
 * @property string $mother
 * @property string $citizenship
 * @property Carbon $created_at
 * @property int $created_by
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property User $user
 * @property Collection|Certificate[] $certificates
 *
 * @package App\Models
 */
class Citizen extends Model
{
	use SoftDeletes;

	protected $casts = [
		'birthday' => 'datetime',
		'created_by' => 'int'
	];

	protected $guarded = [];

	public function adder()
	{
		return $this->belongsTo(User::class, 'created_by');
	}

	public function user()
	{
		return $this->hasOne(User::class, 'phone', 'phone');
	}

	public function certificates()
	{
		return $this->hasMany(Certificate::class);
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
