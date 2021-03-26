<?php

namespace App\Http\Controllers;

use App\DataTables\FoodsystemDataTable;
use App\Models\Foodsystem;
use Illuminate\Http\Request;

class FoodsystemController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(FoodsystemDataTable $dataTable)
    {
        return $dataTable->render('foodsystem.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('foodsystem.create',['title'=>trans('admin.create_Departments')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $data=$this->validate(request(),[
            'name'=>'required',
            'department_id'=>'required|exists:departments,id',
            'breakfast'=>'required',
            'the_lunch'=>'required',
            'the_dinner'=>'required',
        ],[],[
        ]);
        Foodsystem::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(url('foodsystem'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $foodsystem = Foodsystem::find($id);
        $title=trans('admin.edit');
        return view('foodsystem.edit',compact('foodsystem','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function update(Request $request, $id)
    {
        $foodsystem = foodsystem::find($id);
        $foodsystem->update($request->all());
        session()->flash('success', 'تم تعدل القسم بنجاح');
        return redirect(url('foodsystem'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        foodsystem::find($id)->delete();
        session()->flash('success',trans('admin.delete_record'));
        return redirect(url('foodsystem'));
    }


    public function anyData()
    {
        return Datatables::of(Foodsystem::query())->make(true);
    }


    public function multi_delete(){
        if (is_array(request('item'))) {
            Foodsystem::destroy(request('item'));
        }else{
            Foodsystem::find(request('item'))->delete();
        }
        session()->flash('success',trans('admin.delete_record'));
        return redirect(url('foodsystem'));
    }
}
