<?php

namespace App\Http\Controllers;

use App\DataTables\PatientReportDataTable;
use App\Http\Requests\PatientReportRequest;
use App\Models\Patient;
use App\Models\PatientReports;
use Illuminate\Http\Request;

class PatientReportController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(PatientReportDataTable $datatable)
    {
        return $datatable->render('reports.index', ['title' => 'التقارير']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('reports.create', ['title' => 'انشاء تقرير']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PatientReportRequest $request)
    {
        PatientReports::create([
            'patient_id'  => $request->patient_id,
            'appointment' => $request->appointment,
            'attachments' => $request->attachments,
            'note'        => $request->note
        ]);

        session()->flash('success', 'تم انشاء التقرير بنجاح');
        return redirect(url('patientreports'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $report = PatientReports::find($id);
        return view('reports.edit', ['report' => $report, 'title' => 'تعديل التقرير']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update(PatientReportRequest $request, $id)
    {
        PatientReports::find($id)->update([
            'patient_id'  => $request->patient_id,
            'appointment' => $request->appointment,
            'attachments' => $request->attachments,
            'note'        => $request->note
        ]);

        session()->flash('success', 'تم تعديل التقرير بنجاح');
        return redirect(url('patientreports'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $report = PatientReports::findOrFail($id);
        $report->delete();

        session()->flash('success', 'تم حذف التقرير بنجاح');
        return redirect(url('patientreports'));
    }


    public function getAppointment()
    {
        if(request('patient_id') != '') {
            $patient = Patient::find(request('patient_id'));
            $appointment = $patient->booking->appointment;

            return response()->json([
                'status' => true,
                'appointment' => $appointment
            ]);
        }else {
            return response()->json(['status' => false]);
        }
    }

}


