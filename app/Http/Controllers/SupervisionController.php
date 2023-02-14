<?php

namespace App\Http\Controllers;

use App\Models\Follow_up;
use App\Models\Supervision;
use App\Models\TemporaryFile;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SupervisionController extends Controller
{
    public function index()
    {
        return view('admin.supervisions.index');
    }

    /** Role Supervision */
    public function s_assignments()
    {
        $works = Work::where('user_id', auth()->user()->id)->orderByDesc('updated_at')->get();

        return view('supervisory.assignments.index', [
            'works' => $works
        ]);
    }

    public function show_assignment(Supervision $supervision)
    {
        return view('supervisory.assignments.show', [
            'supervision' => $supervision
        ]);
    }

    public function s_tasks()
    {
        return view('supervisory.tasks.index');
    }

    public function create_task(Supervision $supervision)
    {
        return view('supervisory.tasks.create', [
            'supervision' => $supervision
        ]);
    }

    public function s_follow_ups()
    {
        $followUps = Follow_up::all();
        $grouped = $followUps->groupBy('supervision_id');
        // $works = Work::where('type_work_id', 3)->where('user_id', auth()->user()->id)->get();
        // dd($grouped);
        return view('supervisory.follow-ups.index', [
            // 'works' => $works,
            'grouped' => $grouped,
            'followUps' => $followUps,
        ]);
    }

    public function create_follow_up(Supervision $supervision)
    {
        return view('supervisory.follow-ups.create', [
            'supervision' => $supervision
        ]);
    }

    public function store_follow_up(Request $request, Supervision $supervision)
    {
        // dd($request);
        $messages = [
            'supervision_id.required' => 'Es necesario indicar la obra',
            'description.required' => 'Describa el avance, por favor',
            'date.required' => 'Indique la fecha, por favor',
            'image.required' => 'Suba una imagen, por favor',
            'image.max' => 'La imagen no debe pasar los 5MB',
        ];
        $validator = Validator::make($request->all(), [
            'supervision_id' => ['required'],
            'description' => ['required'],
            'date' => ['required'],
            'image' => 'required|max:5120',
        ], $messages);
        $tmp_file = TemporaryFile::where('folder', $request->image)->first();

        if($validator->fails() && $tmp_file) {
            Storage::deleteDirectory('followUp/tmp/'.$tmp_file->folder);
            $tmp_file->delete();
            return redirect()->back()->withErrors($validator)->withInput();
        }elseif($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if($tmp_file) {
            /*
                $image = $request->file('image');
                $file_name = $image->getClientOriginalName();
                $folder = uniqid('followUp', true);
                $image->storeAs('followUp/tmp/'.$folder, $file_name);
            */

            Storage::copy('followUp/tmp/'.$tmp_file->folder.'/'.$tmp_file->file, 'followUp/'.$tmp_file->folder.'/'.$tmp_file->file);

            Follow_up::create([
                'supervision_id' => $request->supervision->id,
                'description' => $request->description,
                'date' => $request->date,
                'image' => $tmp_file->folder.'/'.$tmp_file->file,
                // 'image' => $tmp_file->folder.'/',
            ]);
            Storage::deleteDirectory('followUp/tmp/'.$tmp_file->folder);
            $tmp_file->delete();
            return redirect()->route('supervision.followups')->with('status', 'followUp-created');
        }
        return redirect()->back()->with('status', 'followUp-error');
    }

    public function tmpUpload(Request $request)
    {
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = $image->getClientOriginalName();
            $folder = uniqid('followUp', true);
            $image->storeAs('followUp/tmp/'.$folder, $file_name);
            TemporaryFile::create([
                'folder' => $folder,
                'file' => $file_name
            ]);
            return $folder;
        }
        return '';
    }

    public function tmpDelete()
    {
        $tmp_file = TemporaryFile::where('folder', request()->getContent())->first();
        if ($tmp_file) {
            Storage::deleteDirectory('followUp/tmp/'.$tmp_file->folder);
            $tmp_file->delete();
            return response('');
        }
    }

    public function destroy(Follow_up $follow_up)
    {
        $follow_up = Follow_up::find($follow_up->id);
        // dd($follow_up);
        if($follow_up){
            // Storage::delete($follow_up->image);
            Storage::delete('followUp/'.$follow_up->image);
            $follow_up->delete();
            return redirect()->back()->with('status', 'followUp-deleted');
        }
    }
    /** END Role Supervision */
}
