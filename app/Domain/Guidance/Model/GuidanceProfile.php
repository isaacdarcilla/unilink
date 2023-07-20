<?php

namespace App\Domain\Guidance\Model;

use App\Admin\Models\User;
use Closure;
use Domain\AcademicYear\Models\AcademicYear;
use Domain\Campus\Models\Campus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed $id
 * @property mixed $prefix_name
 * @property mixed $first_name
 * @property mixed $middle_name
 * @property mixed $last_name
 * @property mixed $suffix_name
 * @property mixed $street
 * @property mixed $barangay
 * @property mixed $municipality
 * @property mixed $region
 * @property mixed $province
 * @property mixed $zip_code
 * @property mixed $date_of_birth
 * @property mixed $created_at
 * @property mixed $user_id
 * @property int|mixed|string $application_progress
 * @property mixed $sex_at_birth
 * @property mixed $gender_preference
 * @property mixed $campus
 * @property mixed $internet_status
 * @property mixed $campus_id
 * @property mixed|null $admission_educations
 * @property mixed|null $admission_family_backgrounds
 * @property mixed|null $admission_physical_health
 * @property mixed|null $application_status
 * @method static create(array $array)
 * @method static when(bool $role, Closure $param)
 * @method static pluck(string $string)
 * @method static updateOrCreate(array $array, array $array1)
 */
class GuidanceProfile extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function campus(): BelongsTo
    {
        return $this->belongsTo(Campus::class);
    }

    public function academic_year(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function fullName(): Attribute
    {
        return new Attribute(
            get: fn() => str(
                "$this->last_name, $this->prefix_name $this->first_name $this->middle_name $this->suffix_name"
            )->title(),
        );
    }

    protected function birthDate(): Attribute
    {
        return new Attribute(
            get: fn() => $this->date_of_birth->toFormattedDateString(),
        );
    }

    protected function applicationDate(): Attribute
    {
        return new Attribute(
            get: fn() => $this->created_at->format('M d, Y h:i:s A'),
        );
    }

    protected function fullAddress(): Attribute
    {
        $region = region($this->region);
        $province = province($this->province);
        $city = city($this->municipality);
        $barangay = barangay($this->barangay);

        return new Attribute(
            get: fn() => str(
                "$this->street, $barangay->barangay_description, $city->city_municipality_description, $province->province_description, $region->region_description, $this->zip_code"
            )->upper(),
        );
    }
}