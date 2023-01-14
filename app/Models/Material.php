<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    /* protected $dates = [
        'created_at',
        'updated_at',
    ]; */

    protected $fillable = [
        'name',
        'quantity',
        'remarks',
    ];

    public function constructions()
    {
        return $this->belongsToMany(Construction::class);
    }
}
