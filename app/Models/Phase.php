<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
    protected $fillable = ['project_id', 'fixed_phase_id', 'progress_percentage'];

    
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function fixedPhase()
    {
        return $this->belongsTo(FixedPhase::class);
    }
}
