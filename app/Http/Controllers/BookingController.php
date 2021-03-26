<?php

namespace App\Http\Controllers;

use App\DataTables\BookingDataTable;
use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BookingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BookingDataTable $dataTable)
    {
        return $dataTable->render('bookings.index', ['title'=> 'الحجوزات']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookings.create',['title'=> 'انشاء حجز جديد']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        Booking::create($request->all());

        session()->flash('success', 'تم انشاء الحجز بنجاح');
        return redirect(url('booking'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);
        return view('bookings.edit',['booking' => $booking, 'title' => 'تعديل الحجز']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookingRequest $request, $id)
    {
        $booking = Booking::find($id);
        $booking->update($request->all());
        session()->flash('success', 'تم تعديل الحجز بنجاح');
        return redirect(url('booking'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Booking::find($id)->delete();
        session()->flash('success', 'تم حذف الحجز بنجاح');
        return redirect(url('booking'));
    }


    public function anyData()
    {
        return Datatables::of(Booking::query())->make(true);
    }


    public function multi_delete(){
        if (is_array(request('item'))) {
            Booking::destroy(request('item'));
        }else{
            Booking::find(request('item'))->delete();
        }
        session()->flash('success', 'تم حذف الحجز بنجاح');
        return redirect(url('booking'));
    }

}

