<?php

namespace App\Http\Controllers;

use App\DataTables\MedicineDataTable;
use App\Http\Requests\MedicineRequest;
use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index(MedicineDataTable $dataTable)
    {
        return $dataTable->render('Medicine.index');
    }

    public function create()
    {
        return view('Medicine.add');
    }

    public function store(MedicineRequest $request)
    {
        Medicine::create([
            'Name_Medicine' => $request->name,
            'Number_Strips' => $request->numberStrips,
            'Number_Grains' => $request->numberGrains,
            'Number_Stock' => $request->numberStock,
            'Note' => $request->note,
        ]);

        session()->flash('success', 'تم إضافة العلاج بنجاح');
        return redirect(url('medicine'));

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);
        return view('Medicine.edit', ['medicine' => $medicine, 'title' => 'تعديل علاج']);
    }

    public function update(MedicineRequest $request, $id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->update([
            'Name_Medicine' => $request->name,
            'Number_Strips' => $request->numberStrips,
            'Number_Grains' => $request->numberGrains,
            'Number_Stock' => $request->numberStock,
            'Note' => $request->note,
        ]);

        session()->flash('success', 'تم تعديل العلاج بنجاح');
        return redirect(url('medicine'));
    }


    public function destroy($id)
    {
        Medicine::find($id)->delete();
        session()->flash('success', 'تم حذف الحجز بنجاح');
        return redirect(url('medicine'));
    }


    public function anyData()
    {
        return Datatables::of(Medicine::query())->make(true);
    }


    public function multi_delete(){

        if (is_array(request('item'))) {
            Medicine::destroy(request('item'));
        }else{
            Medicine::find(request('item'))->delete();
        }
        session()->flash('success', 'تم حذف الحجز بنجاح');
        return redirect(url('medicine'));
    }
}
