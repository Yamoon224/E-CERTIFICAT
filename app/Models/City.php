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
 * Class City
 * 
 * @property int $id
 * @property string $name
 * @property int $department_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Department $department
 * @property Collection|Area[] $areas
 * @property Collection|Certificate[] $certificates
 * @property Collection|District[] $districts
 *
 * @package App\Models
 */
class City extends Model
{
	use SoftDeletes;

	protected $casts = [
		'department_id' => 'int'
	];

	protected $guarded = [];

	public function department()
	{
		return $this->belongsTo(Department::class);
	}

	public function areas()
	{
		return $this->hasMany(Area::class);
	}

	public function certificates()
	{
		return $this->hasMany(Certificate::class);
	}

	public function districts()
	{
		return $this->hasMany(District::class);
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
