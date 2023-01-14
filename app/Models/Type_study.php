<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_study extends Model
{
    use HasFactory;

    protected $fillable = [
        'study_id',
        'name',
    ];

    public function studies()
    {
        return $this->belongsTo(Study::class);
    }
}
