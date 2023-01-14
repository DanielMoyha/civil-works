<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Control extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'supervision_id',
        'description',
        'completed_at',
        'created_at'
    ];

    public function supervision()
    {
        return $this->belongsTo(Supervision::class);
    }
}
