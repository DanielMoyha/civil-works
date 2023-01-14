<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction extends Model
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

    public function materials()
    {
        return $this->belongsToMany(Material::class);
    }
}
