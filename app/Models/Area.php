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
 * Class Area
 * 
 * @property int $id
 * @property string $name
 * @property int $district_id
 * @property int $city_id
 * @property int $department_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property City $city
 * @property Department $department
 * @property District $district
 * @property Collection|Certificate[] $certificates
 *
 * @package App\Models
 */
class Area extends Model
{
	use SoftDeletes;

	protected $casts = [
		'district_id' => 'int',
		'city_id' => 'int',
		'department_id' => 'int'
	];

	protected $guarded = [];

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

	public function certificates()
	{
		return $this->hasMany(Certificate::class);
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
