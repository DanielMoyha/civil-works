<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'study_id',
        'name',
        'file',
    ];

    public function study()
    {
        return $this->belongsTo(Study::class);
    }
}
