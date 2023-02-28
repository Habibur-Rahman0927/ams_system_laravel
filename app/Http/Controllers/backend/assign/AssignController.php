<?php

namespace App\Http\Controllers\backend\assign;

use App\Http\Controllers\Controller;
use App\Models\Assign;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Response;

class AssignController extends Controller
{


    private array $data = [];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:assign-list|assign-create|assign-edit|assign-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:assign-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:assign-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:assign-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $this->data['assigns'] = Assign::orderBy('id', 'DESC')->paginate(20);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return view("backends.assign.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $this->data['courses'] = Course::orderBy('id', 'DESC')->get();
            $this->data['users'] = User::where('role', 'student')->orderBy('id', 'DESC')->get();
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view("backends.assign.create", $this->data);
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
            $assingObject = new Assign();

            $assingObject->course_id = $request['course_id'];
            $assingObject->user_id = $request['student_id'];
            $assingObject->created_by = Auth::user()->id;

            if ($assingObject->save()) {
                return redirect(route('assign-list'))->with('redirect-message', 'Course Assign successfully added!');
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
            $this->data['assigns'] = Assign::find($id);
            $this->data['courses'] = Course::orderBy('id', 'DESC')->get();
            $this->data['users'] = User::where('role', 'student')->orderBy('id', 'DESC')->get();
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view("backends.assign.edit", $this->data);
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
            $assingObject = Assign::where('id', $id)->first();

            $assingObject->course_id = $request['course_id'];
            $assingObject->user_id = $request['student_id'];
            
            if ($assingObject->save()) {
                return redirect(route('assign-list'))->with('redirect-message', 'Course Assign successfully updated!');
            } else {
                return redirect()->back()->with('redirect-message', 'Something wrong!');
            }
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }
     /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updateAssignStatus(Request $request)
    {
        try {
            if ($request->ajax()) {
                $this->data['assigns'] = Assign::where('id', $request->id)->update(['status' => $request->status]);
            }
        } catch (\Exception $exception) {
            return Response::json(array(
                'status' => false,
                'data' => [],
                'message' => 'Something went wrong!'
            ), 400);
        }

        return Response::json(array(
            'status' => true,
            'data' => [],
            'message' => 'Status updated successfully!'
        ), 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Assign::find($id)->delete();
        return redirect()->route('assign-list')
                        ->with('success','Course Assign deleted successfully');
    }
}
