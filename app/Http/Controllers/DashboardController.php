<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Construction;
use App\Models\Material;
use App\Models\State;
use App\Models\Study;
use App\Models\Supervision;
use App\Models\User;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    /* public function __construct()
    {
        $this->middleware('permission:all.managerial')->only('index');
        $this->middleware('permission:all.construction')->only('index');
    } */
    /** Director General */
    public function index()
    {
        // $users = User::all();
        $users = User::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');
        $allUsers = User::all();
        $roleConstruction = User::role('Construcción');
        $roleStudy = User::role('Estudios');
        $roleSupervision = User::role('Supervisión');
        $usersActive = User::where('is_active', 1)->get();
        $usersInactive = User::where('is_active', 0)->get();
        $constructions = Construction::all();
        // $constructions = Work::typeWork(1)->get();
        $lastConstruction = Construction::all()->last();
        $studies = Study::all();
        $lastStudy = Study::all()->last();
        $supervisions = Supervision::all();
        $lastSupervision = Supervision::all()->last();
        // $usersConstruction = Work::where('type_work_id', 3)->take(3)->max('user_id');
        // $q = Work::all()->groupBy('user_id');
        // dd($q);
        //$usersConstruction = Work::where('type_work_id', 3)->groupBy('user_id')->take(3)->get(); //official momentaneo
        $usersConstruction = Work::latest()->typeWork(1)->take(3)->get();
        $usersStudy = Work::latest()->typeWork(2)->take(3)->get();
        $usersSupervision = Work::latest()->typeWork(3)->take(3)->get();
        $worksForDepartaments = State::all();

        //constructions
        // $worksAssignmentsConstruction = Work::where('user_id', auth()->user()->id)->get();
        // $months = Work::months();
        // $worksAssignmentsConstruction = Work::monthlyCountConstruction();
        $worksAssignmentsConstruction = $this->constructionAssignments(1);
        $worksAssignmentsStudy = $this->constructionAssignments(2);
        $worksAssignmentsSupervision = $this->constructionAssignments(3);

        return view('dashboard', [
            'users' => $users,
            'roleConstruction' => $roleConstruction,
            'roleStudy' => $roleStudy,
            'roleSupervision' => $roleSupervision,
            'allUsers' => $allUsers,
            'usersActive' => $usersActive,
            'usersInactive' => $usersInactive,
            'constructions' => $constructions,
            'studies' => $studies,
            'supervisions' => $supervisions,
            'lastConstruction' => $lastConstruction,
            'lastStudy' => $lastStudy,
            'lastSupervision' => $lastSupervision,
            'usersConstruction' => $usersConstruction,
            'usersStudy' => $usersStudy,
            'usersSupervision' => $usersSupervision,
            'worksForDepartaments' => $worksForDepartaments,
            'worksAssignmentsConstruction' => $worksAssignmentsConstruction,
            'worksAssignmentsStudy' => $worksAssignmentsStudy,
            'worksAssignmentsSupervision' => $worksAssignmentsSupervision,
        ]);
    }

    public function works()
    {
        $months = Work::months();
        $works = Work::monthlyCount();
        $dataWorks = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($months as $key => $month) {
            $dataWorks[$month-1] = $works[$key];
        }
        $totalWorks = Work::currentYear();
        $deregistering_works = Work::currentYear()->workStatus(0)->get();
        $constructions = Work::typeWork(1)->get();
        $studies = Work::typeWork(2)->get();
        $supervisions = Work::typeWork(3)->get();
        $states = State::all();
        $points = [];
        $pointsTwo = [];
        $consDep = [];
        $stuDep = [];
        $supDep = [];

        foreach ($states as $state) {
            // $points[] = ['name' => $state->name, 'y' => $totalWorks->count(), 'z' => $state->cities->count()];
            // w = totalDpt, x = construction, y = study, z = supervision
            $constructionsDpto = $state->cities->where('type_work_id', 1)->whereBetween('created_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])->count();
            $studiesDpto = $state->cities->where('type_work_id', 2)->whereBetween('created_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])->count();
            $supervisionsDpto = $state->cities->where('type_work_id', 3)->whereBetween('created_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])->count();
            $points[] = [
                'name' => $state->name,
                'w' => $state->cities->whereBetween('created_at', [
                    Carbon::now()->startOfYear(),
                    Carbon::now()->endOfYear(),
                ])->count(),
                'x' => $constructionsDpto,
                'y' => $studiesDpto,
                'z' => $supervisionsDpto,
            ];

            $pointsTwo[] = [
                $state->name,
                $state->cities->whereBetween('created_at', [
                    Carbon::now()->startOfYear(),
                    Carbon::now()->endOfYear(),
                ])->count(),
            ];

            $consDep[] = [ $constructionsDpto];
            $stuDep[] = [ $studiesDpto];
            $supDep[] = [ $supervisionsDpto];
        }

        /*
            $y2020 = [];
            $y2021 = [];
            $y2022 = [];

            foreach ($states as $state) {
                $a = $state->cities->where('created_at', '>=', '2020-01-01')->where('created_at', '<=', '2020-12-31')->count();
                $b = $state->cities->where('created_at', '>=', '2021-01-01')->where('created_at', '<=', '2021-12-31')->count();
                $c = $state->cities->where('created_at', '>=', '2022-01-01')->where('created_at', '<=', '2022-12-31')->count();
                $y2020[] = [
                    $a
                ];
                $y2021[] = [
                    $b
                ];
                $y2022[] = [
                    $c
                ];
            }
        */

        return view('dashboard-works', [
            'works' => $dataWorks,
            'totalWorks' => $totalWorks,
            'constructions' => $constructions,
            'studies' => $studies,
            'supervisions' => $supervisions,
            'states' => $points,
            'statesTwo' => $pointsTwo,
            'consDep' => $consDep,
            'stuDep' => $stuDep,
            'supDep' => $supDep,
            'deregistering_works' => $deregistering_works
        /*'y2020' => $y2020,
            'y2021' => $y2021,
            'y2022' => $y2022, */
            // 'years' => $years
        ]);
    }

    public function constructionAssignments($type)
    {
        $constructionAssignment = Work::assignmentContructionArea()
                                    ->typeWork($type)
                                    ->orderBy('created_at')
                                    ->currentYear()->get()
                                    // ->whereYear('created_at','2023')->get()
                                    ->groupBy(function ($date) {
                                        return $date->created_at->month;
                                    })
                                    ->map(function ($group) {
                                        return $group->count();
                                    })
                                    ->union(array_fill(1, 12, 0))
                                    ->sortKeys()
                                    ->toArray();
        return (array_values($constructionAssignment));
    }


    /** END Director General */
}
