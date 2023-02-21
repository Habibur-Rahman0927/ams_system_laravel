<?php

namespace App\Http\Controllers\backend\course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\TimeSetup;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Response;

class CourseController extends Controller
{


    private array $data = [];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:course-list|course-create|course-edit|course-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:course-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:course-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:course-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $this->data['courses'] = Course::orderBy('id', 'DESC')->paginate(20);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return view("backends.course.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $this->data['time_setups'] = TimeSetup::orderBy('id', 'DESC')->get();
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view("backends.course.create", $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $courseObject = new Course();

            $courseObject->course_name = $request['course_name'];
            $courseObject->time_setup_id = $request['time_setup_id'];
            $courseObject->created_by = Auth::user()->id;

            if ($courseObject->save()) {
                return redirect(route('course-list'))->with('redirect-message', 'Course successfully added!');
            } else {
                return redirect()->back()->with('redirect-message', 'Something wrong!');
            }
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $this->data['course'] = Course::find($id);
            $this->data['time_setups'] = TimeSetup::orderBy('id', 'DESC')->get();
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view("backends.course.edit", $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $courseObject = Course::where('id', $id)->first();

            $courseObject->course_name = $request['course_name'];
            $courseObject->time_setup_id = $request['time_setup_id'];
            
            if ($courseObject->save()) {
                return redirect(route('course-list'))->with('redirect-message', 'Clurse successfully updated!');
            } else {
                return redirect()->back()->with('redirect-message', 'Something wrong!');
            }
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::find($id)->delete();
        return redirect()->route('course-list')
                        ->with('success','Course deleted successfully');
    }
}
