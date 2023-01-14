<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'work_id',
        'name'
    ];

    public function work()
    {
        return $this->belongsTo(Work::class);
    }

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    /* public function type_studies()
    {
        return $this->hasMany(Type_study::class);
    }

    public function study_documents()
    {
        return $this->hasMany(Study_document::class);
    } */
}
