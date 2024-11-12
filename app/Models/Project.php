<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Project extends Model {
    protected $fillable = ['name', 'client_name', 'project_type'];
    public function phases()
    {
        return $this->hasMany(Phase::class);
    }
}

