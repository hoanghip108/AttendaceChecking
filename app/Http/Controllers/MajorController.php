<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMajorRequest;
use App\Http\Requests\UpdateMajorRequest;
use App\Models\Major;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\DataTables;

class MajorController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new Major();
        $routeName = Route::currentRouteName();
        $arr = explode('.', $routeName);
        $arr = array_map('ucfirst', $arr);
        $title = implode(' - ', $arr);

        View::share('title', $title);
    }

    public function index()
    {
        return view('major.index');
    }

    public function api()
    {
        return Datatables::of($this->model::query())
            ->addColumn('edit', function($object){
                return route('majors.edit', $object);
            })
            ->addColumn('destroy', function($object){
                return route('majors.destroy', $object);
            })
            ->rawColumns(['edit'])
            ->make(true);
    }

    public function create()
    {
        return view('major.create');
    }

    public function store(StoreMajorRequest $request)
    {
        $this->model::create($request->validated());

        return redirect()->route('majors.index')->with('success', 'Created successfully');
    }

    public function show(Major $major)    {
        //
    }

    public function edit(Major $major)
    {
        return view('major.edit', [
            'each' => $major,
        ]);
    }

    public function update(UpdateMajorRequest $request, $majorId)
    {
        $object = $this->model->find($majorId);
        $object->fill($request->except('_token'));
        $object->save();

        return redirect()->route('majors.index')->with('success', 'Updated successfully');
    }

    public function destroy(Major $major)
    {
        $major->delete();

        $arr = [];
        $arr['status'] = true;
        $arr['message'] = '';

        return response($arr, 200);
    }
}
