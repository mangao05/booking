<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PaypalPayment;
use App\Reservation;
use App\Customer;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        return PaypalPayment::with('reservations.customer')->paginate(5);
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
        return PaypalPayment::with('reservations.customer')->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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

    public function filterReport($year,$month){

        return PaypalPayment::with('reservations.customer')->whereHas('reservations' , function($query) use ($year, $month){
            return $query
                        ->whereMonth('departure', $month)
                        ->whereYear('departure', $year);
        })->paginate(5);  
                        
    }

    public function filterByName($name){
      
            return  PaypalPayment::with('reservations.customer')
            ->whereHas('reservations', function($query) use ($name){
                return $query->with('customer')
                            ->whereHas('customer', function($query) use ($name){
                                return $query->where('name', 'like', '%' . $name . '%');
                            });
            })
            ->paginate(5);

        }
    
}
