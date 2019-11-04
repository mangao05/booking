<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Customer;
use Illuminate\Http\Request;
use App\Room;
use App\RoomDetails;
use DateTime;
use DatePeriod;
use DateInterval;
use Session;
use Srmklive\PayPal\Services\ExpressCheckout;
class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
   
    public function index()
    {
        return Reservation::with('customer','paypal_payments')->Where('status','Check in')->orWhere('status','Reserved')->get();
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
         
            $dates = explode(' - ', $request->dates);
            $checkIn = $dates[0];
            $checkOut = $dates[1];
            // Paypal Start
            $provider = new ExpressCheckout;
           
            $options = [
                'BRANDNAME' => 'Havendwell',
                'LOGOIMG' => 'https://img1-placeit-net.s3-accelerate.amazonaws.com/uploads/stage/stage_image/31594/large_thumb_1599-logo-cheerleader-alt-5__1_.jpg',
                'CHANNELTYPE' => 'Merchant'
            ];  
            $provider->addOptions($options);
            $data = [];
            $invoiceId = uniqid();
            $roomDetails = RoomDetails::with('reservations')->find($request->get('room_detail_id'));
            $room_name = Room::find($roomDetails->room_id)->type;
            
            $price = $request->total_cost;
            $qty = 1;
            // $provider->setCurrency('PHP');
            
            $data = $this->cartData($invoiceId, $room_name, $price, $qty);
            $response = $provider->setExpressCheckout($data);
        
           
            Session::put([
                'checkIn' => $checkIn,
                'checkOut' => $checkOut,
                'room_detail_id' => $request->get('room_detail_id'),
                'room_name' => $room_name,
                'total_cost' => $request->get('total_cost'),
                'firstname' => $request->get('firstname'),
                'lastname' => $request->get('lastname'),
                'email' => $request->get('email'),
                'contact' => $request->get('contact_number'),
                'request' => $request->get('special_request')
            ]);
            
            // dd($request->session()->all());
            return redirect($response['paypal_link']);  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show($id, $checkIn, $checkOut)
    {
        $rooms  = Room::with(['room_images','room_amenities',
            'room_details' => function($child) use ($id, $checkIn, $checkOut){
                return $child->where('room_id', $id)->with('reservations')->whereNotIn('room_no', function($query) use ($checkIn, $checkOut){
                    return $query->select('room_no')
                     ->from('reservations')
                     ->where([
                         ['reservations.check_out', '>=', $checkIn],
                         ['reservations.check_in', '<=', $checkOut]
                     ])->orWhere([
                         ['reservations.check_out', '<=', $checkIn],
                         ['reservations.check_in', '>=', $checkOut],
                     ]);
                });
            }
        ])->where('id', $id)->first();
    
        return view('room.book', compact('rooms', 'checkIn', 'checkOut'));
    }

    public function getDates($id){
        
        $room = RoomDetails::with('reservations')->find($id);

        $dates = [];
        foreach($room->reservations as $key => $reservation){
            $dates[] = $this->getDatesFromRange($reservation->check_in, $reservation->check_out);       
        }

        return response()->json(['dates' => $dates]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }

    public function getRoomDetailsId($id){
        $rooms = Room::with(['reservations' => function($query){
          return $query->whereNull('status')->orWhere('status', '=', 'arrived');
      }])
      ->find($id);

     
      foreach($rooms->reservations as $key => $reservation){
          $dates[] = $this->getDatesFromRange($reservation->check_in, $reservation->check_out);       
      }
      return response()->json($dates);
    }

    public function getDatesFromRange($start, $end, $format = 'Y-m-d') {
        $array = array();
        $interval = new DateInterval('P1D');
    
        $realEnd = new DateTime($end);
        $realEnd->add($interval);
    
        $period = new DatePeriod(new DateTime($start), $interval, $realEnd);
    
        foreach($period as $date) { 
            $array[] = $date->format($format); 
        }
    
        return $array;
    }


    // Paypal start here

    public function paymentSuccess(Request $request){
      
        $provider = new ExpressCheckout;
        $token = $request->token;
        $PayerID = $request->PayerID;
        $invoiceId = $response['INVNUM'] ?? uniqid();
        
        Session::get('email');
        $room = RoomDetails::with('rooms')->find(Session::get('room_detail_id'));
        $data = $this->cartData($invoiceId, 'sample', Session::get('total_cost'), 1);
        
        
      
        // Get Details
        $response = $provider->getExpressCheckoutDetails($token);
        // Do Payment
        
        $data = $this->cartData($invoiceId, Session::get('room_name'), Session::get('total_cost'), 1);
        $response = $provider->doExpressCheckoutPayment($data, $token, $PayerID);
        // 3% paypal Fee
        if($response['ACK'] == "Success"){
            // dd($response);
            $customer = Customer::firstOrCreate([
                'name' => Session::get('firstname') . " " . Session::get('lastname'),
                'email' => Session::get('email'),
                'contact_no' => Session::get('contact'),
            ]);
             
            $reservation = $customer->reservations()->create([
                'room_no' => $room->room_no,
                'room_details_id' => Session::get('room_detail_id'),
                'check_in' => Session::get('checkIn'),
                'check_out' => Session::get('checkOut')
            ]);;

            $reservation->paypal_payments()->create([
                'status' => $response['PAYMENTINFO_0_PAYMENTSTATUS'],
                'paypal_fee' => $response['PAYMENTINFO_0_FEEAMT'],
                'invoice_id' => $invoiceId,
                'transaction_id' => $response['PAYMENTINFO_0_TRANSACTIONID'],
                'token' => $response['TOKEN'],
                'amount' => $response['PAYMENTINFO_0_AMT'],
                'type' => $response['PAYMENTINFO_0_PAYMENTTYPE']
            ]);
            
                
            
            // $beautymail = app()->make(Snowfire\Beautymail\Beautymail::class);
            // $beautymail->send('emails.welcome', [], function($message)
            // {
            //     $message
            //         ->from('mangaojeric0505@gmail.com')
            //         ->to('mangao_jeric@yahoo.com', 'Jeric Mangao')
            //         ->subject('Welcome!');
            // });


            
            Session::forget(['firstname','lastname','email','contact','room_detail_id','checkIn','checkOut', 'request', 'room_name','total_cost']);
        
            return "Invoice sent on your email.";
        }   
        
        
    }


    protected function cartData($invoiceId, $name, $price, $qty){
        
        $data['items'] = [
            
            [
                'name' => $name,
                'price' => $price,
                'qty' => $qty
            ]   
        ];

        $data['invoice_id'] = $invoiceId;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = url('/payment/success');
        $data['cancel_url'] = url('/');

        $total = 0;
        foreach($data['items'] as $item) {
            $total += $item['price']*$item['qty'];
        }

        $data['total'] = $total;
        return $data;

    }
   
    public function sessionDestroy(){
        return Session::all();
        // Session::forget('check_in');
        // Session::forget('total_cost');
        // Session::forget('email');
        // Session::forget('check_out');
        // Session::forget('room_id');
    }


    public function notify(Request $request)
    {
        if (!($this->provider instanceof ExpressCheckout)) {
            $this->provider = new ExpressCheckout();
        }
        $post = [
            'cmd' => '_notify-validate',
        ];
        $data = $request->all();
        foreach ($data as $key => $value) {
            $post[$key] = $value;
        }
        $response = (string) $this->provider->verifyIPN($post);
        $ipn = new IPNStatus();
        $ipn->payload = json_encode($post);
        $ipn->status = $response;
        $ipn->save();
        dd($response);
    }

    public function updateCheckinStatus($id,$check){
        
        $reservation =  Reservation::findOrFail($id);
        // return $reservation->room_details_id;
        $room =  RoomDetails::where('room_id',$reservation->room_details_id)->first();
        dd($room);
        $total = $room_details->total_booking + 1;

        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d H:i:s');
        if($check == 'Check in'){
            $reservation->arrival = $date;
            $reservation->update();
        }else{

            $reservation->status = $check;
            $reservation->departure = $date;
            $reservation->update();
            
            $room_details->total_booking = $total;
            $room_details->update();
      
           
        }

        $reservation->status = $check;
        $reservation->update();    

        return $reservation->status;          
    }

    public function reserved()
    {
        return Reservation::where('status','Reserved')->get();
    }
    public function booked()
    {
        return Reservation::where('status','Done')->get();
    }
    
    
}
