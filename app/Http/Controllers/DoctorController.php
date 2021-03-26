<?php

namespace App\Http\Controllers;

use App\DataTables\DoctorDataTable;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(DoctorDataTable $dataTable)
    {
        return $dataTable->render('doctors.index', ['title' => 'الأطباء']);
    }

    public function create()
    {
        return view('doctors.create', ['title' => 'إضافة طبيب جديد']);
    }

    public function store(Request $request)
    {
        Doctor::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'department_id' => $request->department_id,
            'profile' => $request->profile,
        ]);
        session()->flash('success', 'تم إضافة الطبيب بنجاح');
        return redirect('/doctor');
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('doctors.edit', ['doctor' => $doctor, 'title' => 'تعديل الحجز']);
    }

    public function update(Request $request, $id)
    {

        $doctor = Doctor::findOrFail($id);

        $doctor->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'department_id' => $request->department_id,
            'profile' => $request->profile,
        ]);
        session()->flash('success', 'تم تعديل الطبيب بنجاح');
        return redirect('/doctor');
    }

    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id)->delete();
        return redirect('/doctor');
    }

}
