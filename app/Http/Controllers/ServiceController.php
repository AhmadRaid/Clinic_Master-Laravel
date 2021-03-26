<?php

namespace App\Http\Controllers;

use App\DataTables\ServiceTableDataTable;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ServiceTableDataTable $dataTable)
    {
        return $dataTable->render('service.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $doctors = Doctor::all();
        return view('service.create',['title'=>trans('admin.create_users')] ,
            compact('departments','doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store()
    {
        $data=$this->validate(request(),[
            'name'=>'required',
            'description'=>'required',
            'doctor_id'=>'required|exists:departments,id',
            'department_id'=>'required|exists:departments,id',
            'detection_price'=>'required',
            'return_price'=>'required',

        ],[],[
            'name'=> trans('admin.name'),
            'description'=> trans('admin.description'),
            'department_id'=> 'القسم',
            'doctor_id'=> 'الدكتور',
            'detection_price'=> 'سعر الكشف',
            'return_price'=> 'سعر الاعادة',
        ]);
        Service::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(url('service'));
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
        $departments = Department::all();
        $doctors = Doctor::all();
        $title=trans('admin.edit');
        return view('service.edit',compact('service','title' , 'departments','doctors'));
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
        $data=$this->validate(request(),[
            'name'=>'required',
            'description'=>'required',
            'doctor_id'=>'required|exists:departments,id',
            'department_id'=>'required|exists:departments,id',
            'detection_price'=>'required',
            'return_price'=>'required',

        ],[],[
            'name'=> trans('admin.name'),
            'description'=> trans('admin.description'),
            'department_id'=> 'القسم',
            'doctor_id'=> 'الدكتور',
            'detection_price'=> 'سعر الكشف',
            'return_price'=> 'سعر الاعادة',
        ]);
        Service::where('id',$id)->update($data);
        session()->flash('success',trans('admin.update_added'));
        return redirect(url('service'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::find($id)->delete();
        session()->flash('success',trans('admin.delete_record'));
        return redirect(url('service'));
    }
    public function typea($id,$typea){
        $services = Service::find($id);
        if($typea == 'كشف'){
            return response(
                ['status'=>true,
                    "result" =>  $services-> detection_price,               
                    'count' => 1,
            ], 200);
        }else{
            return response(
                ['status'=>true,
                    "result" =>  $services-> return_price,               
                    'count' => 1,
            ], 200);
        }
       
        
    }
}
