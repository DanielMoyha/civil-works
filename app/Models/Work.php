<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Work extends Model
{
    use HasFactory;

    protected $dates = [
        'start_date',
        'completion_date',
    ];

    protected $fillable = [
        'name',
        'city_id',
        'user_id',
        'type_work_id',
        'name_contractor',
        'address_contractor',
        'work_duration',
        'status',
        'start_date',
        'completion_date',
        'value_approximate_services',
        'description',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type_work()
    {
        return $this->belongsTo(TypeWork::class);
    }

    public function construction()
    {
        return $this->hasOne(Construction::class);
    }

    public function study()
    {
        return $this->hasOne(Study::class);
    }

    public function supervision()
    {
        return $this->hasOne(Supervision::class);
    }

    public function associate_consultants()
    {
        // return $this->belongsToMany(Associate_consultant::class);
        /* return $this->belongsToMany(Associate_consultant::class, 'associate_consultant_work', 'work_id', 'associate_consultant_id')->withPivot('percentage_participation'); */
        return $this->belongsToMany(Associate_consultant::class, 'associate_consultant_work', 'work_id', 'associate_consultant_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function scopeMonths($query)
    {
        return $query->select(DB::raw("Month(created_at) as month"))
                        ->whereYear('created_at', date('Y'))
                        ->groupBy(DB::raw("Month(created_at)"))
                        ->pluck('month');
    }

    public function scopeCurrentYear($query)
    {
        return $query->whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ]);
    }

    public function scopeMonthlyCount($query)
    {
        return $query->select(DB::raw("COUNT(*) as count"))
                        ->whereYear('created_at', date('Y'))
                        ->groupBy(DB::raw("Month(created_at)"))
                        ->pluck('count');
    }

    public function scopeWorkStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeTypeWork($query, $type)
    {
        return $query->where('type_work_id', $type);
    }

    /* public function scopeMonthlyCountConstruction($query)
    {
        return $query->select(DB::raw("COUNT(*) as count"))
                        ->whereYear('created_at', date('Y'))
                        ->where('user_id', auth()->user()->id)
                        // ->currentYear()
                        ->groupBy(DB::raw("Month(created_at)"))
                        ->pluck('count');
    } */
    public function scopeAssignmentContructionArea($query)
    {
        return $query->where('user_id', auth()->user()->id);
    }
}