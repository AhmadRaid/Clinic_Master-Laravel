<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection\whereDay;
class Financialreports extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function financialdaily(){


             $financialdaily=Booking::whereDay('Date', '=', date('d'))->with('service')->get();

             $servicedaily=Booking::whereDay('Date', '=', date('d'))->with('service')->get()->toArray();

            $pricebooking=$financialdaily->sum('price');

            $countbooking=$financialdaily->count('id');

            $Total = $pricebooking + 0;
        return view('FinancialReports.financialdaily',
            compact('financialdaily',
            'pricebooking' ,'countbooking','Total','servicedaily'));

    }
    public function financialmonthly(){

        $financialmonthly=Booking::whereMonth('Date', '=', date('m'))->with('service')->get();

        $servicemonthly=Booking::whereDay('Date', '=', date('m'))->with('user','service')->get();

        $pricebooking=$financialmonthly->sum('price');

        $countbooking=$financialmonthly->count('id');

        $Total = $pricebooking + 0;
        return view('FinancialReports.financialmonthly',
            compact('financialmonthly',
                'pricebooking' ,'countbooking','Total','servicemonthly'));


    }

    public function financialYearly(){

        $financialYearly=Booking::whereYear('Date', '=', date('Y'))->with('service')->get();

        $serviceyearly=Booking::whereDay('Date', '=', date('Y'))->with('service')->get()->toArray();

        $pricebooking=$financialYearly->sum('price');

        $countbooking=$financialYearly->count('id');

        $Total = $pricebooking + 0;
        return view('FinancialReports.financialyearly',
            compact('financialYearly',
                'pricebooking' ,'countbooking','Total','serviceyearly'));


    }



    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
