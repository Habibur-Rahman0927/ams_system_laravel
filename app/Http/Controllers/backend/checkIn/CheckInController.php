<?php

namespace App\Http\Controllers\backend\checkIn;

use App\Http\Controllers\Controller;
use App\Models\Assign;
use App\Models\Course;
use App\Models\StduentCheckInOut;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Response;

class CheckInController extends Controller
{


    private array $data = [];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:check-in-list|check-in-create|check-in-edit|check-in-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:check-in-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:check-in-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:check-in-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $this->data['checkinouts'] = StduentCheckInOut::where('created_by', '=', Auth::user()->id)->orderBy('id', 'DESC')->paginate(20);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return view("backends.checkinout.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $this->data['assigns'] = Assign::where('user_id', '=', Auth::user()->id)->orderBy('id', 'DESC')->get();
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view("backends.checkinout.create", $this->data);
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
            // $userIpAddress = $request->ip();
            $userIpAddress = '14.192.216.4';
            $locationData = \Location::get($userIpAddress );
            $now = Carbon::now();

            $assingObject = new StduentCheckInOut();
            $assingObject->check = $request['check'];
            $assingObject->date_time = $now;
            $assingObject->lati = $locationData->latitude;
            $assingObject->long = $locationData->longitude;
            $assingObject->check_place_address = $locationData->countryName.' '.$locationData->regionName.' '.$locationData->cityName;
            $assingObject->course_id = $request['course_id'];
            $assingObject->created_by = Auth::user()->id;
            $assingObject->status = 1;

            if ($assingObject->save()) {
                return redirect(route('check-in-list'))->with('redirect-message', 'Course Assign successfully added!');
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
            $this->data['checkinouts'] = StduentCheckInOut::find($id);
            $this->data['assigns'] = Assign::where('user_id', '=', Auth::user()->id)->orderBy('id', 'DESC')->get();
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view("backends.checkinout.edit", $this->data);
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
            // $userIpAddress = $request->ip();
            $userIpAddress = '14.192.216.4';
            $locationData = \Location::get($userIpAddress );
            $now = Carbon::now();

            $assingObject = StduentCheckInOut::where('id', $id)->first();

            $assingObject->check = $request['check'];
            $assingObject->date_time = $now;
            $assingObject->lati = $locationData->latitude;
            $assingObject->long = $locationData->longitude;
            $assingObject->check_place_address = $locationData->countryName.' '.$locationData->regionName.' '.$locationData->cityName;
            $assingObject->course_id = $request['course_id'];
            
            if ($assingObject->save()) {
                return redirect(route('check-in-list'))->with('redirect-message', 'Course Check IN/Out successfully updated!');
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
    public function updateCheckInOutStatus(Request $request)
    {
        try {
            if ($request->ajax()) {
                $this->data['checkinouts'] = StduentCheckInOut::where('id', $request->id)->update(['status' => $request->status]);
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
        StduentCheckInOut::find($id)->delete();
        return redirect()->route('check-in-list')
                        ->with('success','Course Check IN/Out deleted successfully');
    }
}
