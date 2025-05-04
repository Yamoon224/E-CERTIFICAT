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
 * Class Department
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Area[] $areas
 * @property Collection|Certificate[] $certificates
 * @property Collection|City[] $cities
 * @property Collection|District[] $districts
 *
 * @package App\Models
 */
class Department extends Model
{
	use SoftDeletes;

	protected $guarded = [];

	public function areas()
	{
		return $this->hasMany(Area::class);
	}

	public function certificates()
	{
		return $this->hasMany(Certificate::class);
	}

	public function cities()
	{
		return $this->hasMany(City::class);
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
