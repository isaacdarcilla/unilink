<?php

namespace Domain\Admission\Models;

use App\Domain\Admission\Models\AdmissionEducation;
use Closure;
use Domain\AcademicYear\Models\AcademicYear;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
 * @method static create(array $array)
 * @method static when(bool $role, Closure $param)
 * @method static pluck(string $string)
 */
class AdmissionPersonalProfile extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'date_of_birth' => 'datetime',
        'scholarship_grantee' => 'integer',
        'application_status' => 'integer',
        'special_skills' => 'array',
        'favorite_sports' => 'array',
        'gadget' => 'array',
    ];

    public function academic_year(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function admission_education(): HasOne
    {
        return $this->hasOne(AdmissionEducation::class);
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