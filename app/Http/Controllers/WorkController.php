<?php

namespace App\Http\Controllers;

use App\Exports\WorksDataExport;
use App\Models\Associate_consultant;
use App\Models\Construction;
use App\Models\Service;
use App\Models\Study;
use App\Models\Supervision;
use App\Models\TypeWork;
use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class WorkController extends Controller
{
    use WithPagination;
    /** Director General */
    public function index()
    {
        return view('admin.works.index');
    }

    public function create()
    {
        $users = User::where('is_active', 1)->where('id', '!=', 1)->get();
        $type_works = TypeWork::all();
        $associate_consultants = Associate_consultant::all();
        $services = Service::all();
        return view('admin.works.create', [
            'users' => $users,
            'type_works' => $type_works,
            'associate_consultants' => $associate_consultants,
            'services' => $services
        ]);
    }

    public function store(Request $request)
    {
        $work = $this->validateWork();
        $work = Work::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'city_id' => $request->city_id,
            'type_work_id' => $request->type_work_id,
            'name_contractor' => $request->name_contractor,
            'address_contractor' => $request->address_contractor,
            'work_duration' => $request->work_duration,
            'start_date' => $request->start_date,
            'completion_date' => $request->completion_date,
            'value_approximate_services' => $request->value_approximate_services,
            'description' => $request->description,
        ]);
        $work->services()->attach(request('services'));
        $work->associate_consultants()->attach(request('associate_consultants'));
        if ($work->type_work_id === '1') {
            Construction::create([
                'work_id'=> $work->id,
                'name' => $work->name
            ]);
        }
        if ($work->type_work_id === '2') {
            Study::create([
                'work_id'=> $work->id,
                'name' => $work->name
            ]);
        }
        if ($work->type_work_id === '3') {
            Supervision::create([
                'work_id'=> $work->id,
                'name' => $work->name
            ]);
        }
        return redirect()->route('admin.works.index')->with('status', 'work-created');
    }

    public function edit(Work $work)
    {
        $users = User::where('is_active', 1)->where('id', '!=', 1)->get();
        $type_works = TypeWork::all();
        $associate_consultants = Associate_consultant::all();
        $services = Service::all();
        $workHasServices = array_column(json_decode($work->services, true), 'id');

        $works = Work::all();
        /* foreach ($works as $work) {
            $work;
        } */
        return view('admin.works.edit', [
            'work' => Work::findOrFail(($work->id)),
            // 'works' => $works,
            'users' => $users,
            'type_works' => $type_works,
            'associate_consultants' => $associate_consultants,
            'services' => $services,
            'workHasServices' => $workHasServices
        ]);
    }

    public function update(Request $request, Work $work)
    {
        $this->validateWork();
        $work->update($request->all());
        $work->services()->attach(request('services'));
        $work->associate_consultants()->attach(request('associate_consultants'));

        return redirect()->route('admin.works.index')->with('status', 'work-updated');
    }

    public function show(Work $work)
    {
        return view('admin.works.show', [
            'work' => Work::findOrFail($work->id),
        ]);
    }


    public function exportExcel()
    {
        // return Excel::download(WorksDataExport::class);
        return Excel::download(new WorksDataExport, 'obras-civiles.xlsx');
    }

    protected function validateWork()
    {
        return request()->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|string|max:255',
            'city_id' => 'required',
            'type_work_id' => 'required',
            'name_contractor' => 'required|string|max:255',
            'address_contractor' => 'required|string|max:255',
            'work_duration' => 'required|string|max:255',
            'start_date' => 'required',
            'completion_date' => 'required',
            'value_approximate_services' => 'required',
            'description' => 'required',
        ]);
    }
    /** END Director General */

}
