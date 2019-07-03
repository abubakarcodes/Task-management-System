<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Session;
use Toast;
use App\Service;
class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $services = Service::orderBy('order_by' , 'ASC')->get();
       return view('admin.services.listing', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
                'name' => 'required',
                'order_by' => 'required',
            ]);


            $service = new Service;
            $service->name = $request->input('name');
            $service->order_by = $request->input('order_by');
            $service->save();
            Toast::success('service Successfully Added', 'success');
            return redirect()->route('admin.services.index');
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
        $service = Service::find($id);
     return view('admin.services.edit' , compact('service'));
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
        $this->validate($request , [
                'name' => 'required',
                'order_by' => 'required',
            ]);


             $service = Service::find($id);
             $service->name = $request->input('name');
            $service->order_by = $request->input('order_by');
            $service->save();
            Toast::success('successfully updated', 'success');
            return redirect()->route('admin.services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    $service = Service::find($id);
    
    $service->delete();
     return response()->json('success', 200);
    }
}
