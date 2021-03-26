<?php

namespace App\Http\Controllers;

use App\DataTables\DepartmentDataTable;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DepartmentController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(DepartmentDataTable $dataTable)
  {
      return $dataTable->render('Departments.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
    {
        return view('Departments.create',['title'=>trans('admin.create_Departments')]);
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
          'description'=>'required',
      ],[],[
          'name'=> trans('الاسم'),
          'description'=> trans('الوصف'),
      ]);
      department::create($data);
      session()->flash('success',trans('admin.record_added'));
      return redirect(url('department'));
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
      $department = department::find($id);
      $title=trans('admin.edit');
      return view('Departments.edit',compact('department','title'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */

  public function update(Request $request, $id)
  {
      $department = department::find($id);
      $department->update($request->all());
      session()->flash('success', 'تم تعدل القسم بنجاح');
      return redirect(url('department'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      Department::find($id)->delete();
      session()->flash('success',trans('admin.delete_record'));
      return redirect(url('department'));
  }
  public function anyData()
    {
        return Datatables::of(Department::query())->make(true);
    }
    public function multi_delete(){
        if (is_array(request('item'))) {
            Department::destroy(request('item'));
        }else{
            Department::find(request('item'))->delete();
        }
        session()->flash('success',trans('admin.delete_record'));
        return redirect(url('Departments'));
    }
  
}

?>