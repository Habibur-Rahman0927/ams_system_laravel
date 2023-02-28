<?php

namespace App\Http\Controllers\backend\timeSetup;

use App\Http\Controllers\Controller;
use App\Models\TimeSetup;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Response;

class TimeSetupController extends Controller
{


    private array $data = [];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:time-setups-list|time-setups-create|time-setups-edit|time-setups-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:time-setups-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:time-setups-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:time-setups-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $this->data['time_setups'] = TimeSetup::orderBy('id', 'DESC')->paginate(20);
            // dd($this->data['users']);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return view("backends.timeSetup.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backends.timeSetup.create", $this->data);
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
            $start_time = new Carbon($request['start_time']);
            $end_time = new Carbon($request['end_time']);


            $timeSetupObject = new TimeSetup();

            $timeSetupObject->start_time = $start_time->format('h:i A');
            $timeSetupObject->end_time = $end_time->format('h:i A');
            $timeSetupObject->created_by = Auth::user()->id;

            if ($timeSetupObject->save()) {
                return redirect(route('time-setups-list'))->with('redirect-message', 'Time successfully added!');
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
        $this->data['time_setup'] = TimeSetup::find($id);
        return view("backends.timeSetup.edit", $this->data);
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
            $start_time = new Carbon($request['start_time']);
            $end_time = new Carbon($request['end_time']);
            
            $timeSetupObject = TimeSetup::where('id', $id)->first();

            $timeSetupObject->start_time = $start_time->format('h:i A');
            $timeSetupObject->end_time = $end_time->format('h:i A');
            

            if ($timeSetupObject->save()) {
                return redirect(route('time-setups-list'))->with('redirect-message', 'Time successfully updated!');
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
    public function updateTimeStatus(Request $request)
    {
        try {
            if ($request->ajax()) {
                $this->data['time_setups'] = TimeSetup::where('id', $request->id)->update(['status' => $request->status]);
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
        TimeSetup::find($id)->delete();
        return redirect()->route('time-setups-list')
                        ->with('success','Time deleted successfully');
    }
}
