<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Certificate
 * 
 * @property int $id
 * @property string $living_at
 * @property Carbon $expired_at
 * @property string $reason
 * @property int $duplicata
 * @property int $citizen_id
 * @property int $area_id
 * @property int $district_id
 * @property int $city_id
 * @property int $department_id
 * @property Carbon $created_at
 * @property int $created_by
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Area $area
 * @property Citizen $citizen
 * @property City $city
 * @property User $user
 * @property Department $department
 * @property District $district
 *
 * @package App\Models
 */
class Certificate extends Model
{
	use SoftDeletes;

	protected $casts = [
		'expired_at' => 'datetime',
		'duplicata' => 'int',
		'citizen_id' => 'int',
		'area_id' => 'int',
		'district_id' => 'int',
		'city_id' => 'int',
		'department_id' => 'int',
		'created_by' => 'int'
	];

	protected $guarded = [];

	public function area()
	{
		return $this->belongsTo(Area::class);
	}

	public function citizen()
	{
		return $this->belongsTo(Citizen::class);
	}

	public function city()
	{
		return $this->belongsTo(City::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'created_by');
	}

	public function department()
	{
		return $this->belongsTo(Department::class);
	}

	public function district()
	{
		return $this->belongsTo(District::class);
	}
}
