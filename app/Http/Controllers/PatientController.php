<?php

namespace App\Http\Controllers;

use App\DataTables\PatientDataTable;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PatientDataTable $dataTable)
    {
        return $dataTable->render('patient.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.create',['title'=>trans('admin.create_patient')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store()
    {
        $therapy='';
        foreach (request('therapy') as $value){
            $therapy .=  $value.',';
           }  
           // dd(request('therapy'));
                Patient::create([
                    'booking_id'=>request('booking_id'),
                    'therapy'=>  $therapy,
                ]);
               
                  
        session()->flash('success',trans('admin.record_added'));
        return redirect(url('patient'));
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
        $patient = Patient::find($id);
        $title=trans('admin.edit');
        return view('patient.edit',compact('patient','title' , 'patient'));
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
              $therapy='';
        foreach (request('therapy') as $value){
            $therapy .=  $value.',';
           }  
           // dd(request('therapy'));
                Patient::where('id',$id)->update([
                    'booking_id'=>request('booking_id'),
                    'therapy'=>  $therapy,
                ]);
        session()->flash('success',trans('admin.update_added'));
        return redirect(url('patient'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Patient::find($id)->delete();
        session()->flash('success',trans('admin.delete_record'));
        return redirect(url('patient'));
    }

}


?>
