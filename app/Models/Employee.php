<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['country_id', 'state_id', 'city_id', 'department_id', 'first_name', 'last_name', 'middle_name', 'address', 'zip_code', 'date_of_birth', 'date_hired'])]

class Employee extends Model
{
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class)->withoutGlobalScopes();
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class)->withoutGlobalScopes();
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class)->withoutGlobalScopes();
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
