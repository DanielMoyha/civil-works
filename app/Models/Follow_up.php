<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow_up extends Model
{
    use HasFactory;

    protected $fillable = [
        'supervision_id',
        'description',
        'date',
        'image',
    ];

    public function supervision()
    {
        return $this->belongsTo(Supervision::class);
    }
}
