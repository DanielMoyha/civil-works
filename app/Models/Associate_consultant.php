<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Associate_consultant extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name'
    ];

    public function works()
    {
        return $this->belongsToMany(Work::class);
    }
}
