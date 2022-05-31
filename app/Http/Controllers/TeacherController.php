<?php

namespace App\Http\Controllers;

use App\Models\Major;
use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;

class TeacherController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new Teacher();
        $routeName = Route::currentRouteName();
        $arr = explode('.', $routeName);
        $arr = array_map('ucfirst', $arr);
        $title = implode(' - ', $arr);

        View::share('title', $title);
    }

    public function index()
    {
        return view('teacher.index');
    }

    public function api()
    {
        return Datatables::of($this->model::query()->with('major'))
            ->editColumn('gender', function($object){
                return $object->gender_name;
            })
            ->addColumn('major_name', function($object){
                return $object->major->name;
            })
            ->addColumn('edit', function($object){
                return route('teachers.edit', $object);
            })
            ->addColumn('destroy', function($object){
                return route('teachers.destroy', $object);
            })
            ->rawColumns(['edit'])
            ->make(true);
    }

    public function create()
    {
        $majors = Major::get();

        return view('teacher.create', [
            'majors' => $majors,
        ]);
    }

    public function store(StoreTeacherRequest $request)
    {
        $this->model::create($request->validated());

        return redirect()->route('teachers.index')->with('success', 'Created successfully');
    }

    public function show(Teacher $teacher)
    {
        //
    }

    public function edit(Teacher $teacher)
    {
        $majors = Major::get();

        return view('teacher.edit', [
            'each' => $teacher,
            'majors' => $majors,
        ]);
    }

    public function update(UpdateTeacherRequest $request, $teacherId)
    {
        $object = $this->model->find($teacherId);
        $object->fill($request->except('_token'));
        $object->save();

        return redirect()->route('teachers.index')->with('success', 'Updated successfully');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        $arr = [];
        $arr['status'] = true;
        $arr['message'] = '';

        return response($arr, 200);
    }
}
