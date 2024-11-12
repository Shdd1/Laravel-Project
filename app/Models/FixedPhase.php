<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedPhase extends Model
{
    use HasFactory;

    protected $fillable = ['project_type', 'phase_name'];

    public function phases()
    {
        return $this->hasMany(Phase::class);
    }
}
