<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervision extends Model
{
    use HasFactory;

    protected $fillable = [
        'work_id',
        'name'
    ];

    public function work()
    {
        return $this->belongsTo(Work::class);
    }

    public function controls()
    {
        return $this->hasMany(Control::class);
    }

    public function follow_ups()
    {
        return $this->hasMany(Follow_up::class);
    }
}
