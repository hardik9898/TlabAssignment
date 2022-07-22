<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TherapistDetailService extends Model
{
    use HasFactory;
    protected $guarded = [];

 
      /**
     * relation with services
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
