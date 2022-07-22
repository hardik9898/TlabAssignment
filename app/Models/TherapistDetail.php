<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TherapistDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * relation with users
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * relation with country
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * relation with state
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    /**
     * relation with services
     */
    public function therapist_detail_service()
    {
        return $this->hasMany(TherapistDetailService::class);
    }

}
