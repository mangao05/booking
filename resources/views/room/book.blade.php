@extends('layouts.master')


@section('style')

<style scoped>
    
    @media only screen and (max-width: 1800px) and (min-width: 1200px) {

        .datepicker {
           width:370px !important;
           }
           .datepicker__months {
                   overflow: hidden;
           }
           .datepicker__month-day{
                    padding: 10px 20px !important;
            }   
           .datepicker__month {
               width: 200px;
               margin-left: 10%;
               margin-right: 10%;
           }
           .datepicker__month--month1 {
               width:290px !important;
               float: left;
               margin:0 !important;
               
           }
           .datepicker__month--month2 {
               display: none;
               float: right;
               margin:0 !important;
           }
           .datepicker__month-button--disabled {
               visibility: hidden;
           }
           .datepicker__months {
               position: relative;
               margin:0 !important;
           }
           .datepicker__months:before {
              display: none;
            }
            .datepicker__close-button {
               text-align:center;
                position: relative;
            }   
          
    }   
     
    @media (min-width: 1025px) and (max-width: 1280px) {
       
        .datepicker {
           width:300px !important;
           }
           .datepicker__months {
                   overflow: hidden;
           }
           .datepicker__month-day{
                    padding: 10px 12px !important;
            }   
    
           .datepicker__month--month2 {
               display: none;
               float: right;
               margin:0 !important;
           }
           .datepicker__month-button--disabled {
               visibility: hidden;
           }
           .datepicker__months {
               position: relative;
               margin:0 !important;
           }
           .datepicker__months:before {
              display: none;
            }
            .datepicker__close-button {
               text-align:center;
                position: relative;
            }   
    }
    @media (min-width: 768px) and (max-width: 1024px) {
     
        .img-selector{
        background-color: white;
        width: 11vw !important;
        }   
        .datepicker {       
           width:270px !important;
        }
        .datepicker__month-day{
                padding: 0px 0px !important;
        }   
    
        .datepicker__month--month2 {
            display: none;
            float: right;
            margin:0  !important;
        }
        .datepicker__month-button--disabled {
            visibility: hidden;
        }
        .datepicker__months {
            position: relative;
            overflow: hidden;
            margin:0 !important;
        }
        .datepicker__months:before {
            display: none;
        }
        .datepicker__close-button {
            text-align:center;
            position: relative;
        }   
       
    }

    @media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {
       
        .img-selector{
        width: 10vw !important;
        }
      
    }
    @media (min-width: 481px) and (max-width: 767px) {
        .img-selector{
            background-color: white;
            width: 19vw !important;
        }
        .moreImages{
            width: 75vw !important;
        }
        .picture-padding{
            border: 1px solid black;
             border-radius: 5px;
             box-shadow: 0px 0px 3px #6A1F85;
        }
        
    
    }
    @media (min-width: 581px) and (max-width: 667px) {
        .img-selector{
            background: red !important;
        width: 14vw !important;
        }
        .moreImages{
        width: 55vw !important;
        }
      
    }

    @media (min-width: 320px) and (max-width: 480px) {
        .img-selector{
        width: 22vw !important;
        }
        .moreImages{
            width: 85vw !important;
        }
        .roomDetails{
    
            font-size: 10px !important;
        }
        .details-body{
            font-size: 10px !important;
        }
        .img-selector{
        background-color: white;
        width: 11vw !important;
        }   
        .datepicker {       
           width:270px !important;
        }
        .datepicker__month-day{
                padding: 3px 3px !important;
        }   
    
        .datepicker__month--month2 {
            display: none;
            float: right;
            margin:0  !important;
        }
        .datepicker__month-button--disabled {
            visibility: hidden;
        }
        .datepicker__months {
            position: relative;
            overflow: hidden;
            margin:0 !important;
        }
        .datepicker__months:before {
            display: none;
        }
        .datepicker__close-button {
            text-align:center;
            position: relative;
        }   
       
    }
    
    


    .error{
        color:red;
        font-weight: bold;
        font-style: italic;
    }
    /* @media only screen and (min-width:200px) and (max-width:499px){
        
        .datepicker__inner{
            padding: 0px !important;
        }
    } */
    .moreImages{
        width: 45vw;
        height: 45vh;
        margin: 20px auto;
        box-shadow: 0px 0px 3px gray;
        padding: 3px;
        border: 1px solid black;
        border-radius: 5px;
    
    }
    .img-selector{
        width: 13vw;
        height: 15vh;
        margin: 0px auto !important;
        padding: 5px !important;
        align: center;
        border: 1px dashed black;
        box-shadow: 5px 2px 5px gray;
    }
    .container-fluid{
        font-family: monaco,Consolas,Lucida Console,monospace !important;
    }
    .roomDetails{
        margin: 20px;
        border: 1px solid #E178E4; 
        box-shadow: 3px 0px 6px gray;

    }
    .details-body{
        font-size: 20px;
        font-family: tahoma !important;
    }
    .inclusion {
    list-style: none;
    }

    .inclusion li:before {
    content: '✓';
    }
    .btnBook:hover{
        background-color: white !important;
        border: 2px solid #410064 !important;
        color: #410064 !important;
    }
    .titleDetails{
        font-family: 'Yellowtail', cursive !important;
    }
    .roomName{
        letter-spacing: 4px; 
        font-family: 'Luckiest Guy', cursive; 
        font-size:50px;
        color: #bc2e1e;
     
    }

  

    
</style>
    
@endsection

@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-md-6 col-sm-9 col-xs-1 p-2 picture-padding" style="box-shadow: 0px 0px 3px #6A1F85; ">
                   
                    @if ($rooms->room_images->count() > 0 )
                        <div class="slider slider-for w-100">
                                @foreach ($rooms->room_images as $roomImages)
                                <div class="justify-content-center">
                                    <h3> <img src="{{ asset('/img/rooms/'.$roomImages->image) }}" class="moreImages"  ></h3>
                                </div>
                                @endforeach
                        
                        </div>
                        <div class="slider slider-nav">
                            @foreach ($rooms->room_images as $roomImages)
                            <div class="image-container-slider">
                                <img src="{{ asset('/img/rooms/'.$roomImages->image) }}" class="img-selector">
                            </div>
                            @endforeach
                        </div>
                    @else
                    <div class="p-3">
                            <img src="{{ asset('/img/rooms/'.$rooms->photo) }}" class="img-fluid moreImages" >
                    </div>
            
                      
                    @endif
                   
                    
                @php
                    $roomDetails = $rooms->room_details->first();
                @endphp
                <div class="mt-3 roomDetails  " data-aos="zoom-in"
                data-aos-duration="3000">
                    <div class="p-0 m-3" style="background-image: linear-gradient(to left, #410064 , violet);">
                            <h3 class="text-center font-weight-bold text-uppercase roomName"><span class="text-success">{{ $rooms->type}}</span> </h3> 
                    </div>
                    <div class="text-center" style="line-height:1px;">
                            <label for="" ><span  class="titleDetails"> <h1>Room Details</h1></span>
                                <span class="text-italic">A very good place to be.</span>
                            </label>
                    </div>  
                    <div class="details-body mt-4 pl-4">
                            <div class="row">
                                <div class="col-md-6">
                                        <i class="fa fa-bed" aria-hidden="true"></i>  <label for="">Room No. : #</label>
                                <span> {{$roomDetails->room_no}}</span>
                                </div>
                                <div class="col-md-6">
                                        <i class="fa fa-male" aria-hidden="true"></i> <label for="">Max No. of Guest : </label>
                                            <span>{{$rooms->guests}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <i class="fa fa-smile-o" aria-hidden="true"></i> <label for="">Inclusion : </label> 
                                    <ul class="inclusion">
                                        @foreach($rooms->room_amenities as $inclusion)
                                            <li>&nbsp;{{$inclusion->amenities}}</li> 
                                        @endforeach                                        
                                    </ul>
                                </div>
                                <div class="col-sm-6" >
                                        <div>
                                                <i class="fas fa-money-bill-wave    "></i> <label for="">Price/Nights : </label> <span class="text-success">&#8369;{{$rooms->price}}</span>
                                        </div>
                                </div>
                            </div>
                            <div>
                                    <i class="fa fa-info-circle" aria-hidden="true"></i> <label for="">Room Description : </label>
                            <p style="font-size:15px; line-height:20px; text-align:justify; text-indent:50px;">
                                {{$rooms->description}}
                            </p>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-9  mt-2" id="receiptContainer"   data-aos="fade-left"
            data-aos-anchor="#example-anchor"
            data-aos-offset="500"
            data-aos-duration="500">            
                <div style="box-shadow: 0px 0px 5px gray; border: 1px solid black;   m-4 p-0 bg-white" >
                    <div class="p-3" style="border-bottom: 1px dashed black;">
                        <h3 class="text-center" style="color:black;font-weight:bold">Reservation Details</h3> 
                    </div>
                    <div class="p-3">
                            <form class="" id="bookingForm" autocomplete="off">
                         
                            
                                <div class="form-group md-form">
                                    <label for="dates" class="font-weight-bold">Check In - Check Out</label>
                                    {{ Form::text('dates', $checkIn . ' - ' . $checkOut , ['id'=>'dates', 'class' => 'form-control text-center font-weight-bold', 'placeholder' => 'Check In - Check Out', 'autocomplete'=>'off','style'=>'color:#440266;font-size:18px;']) }}
                                    {{ Form::hidden('room_id', $rooms->room_details->first()->id, ['id' => 'room_id']) }}
                                    {{ Form::hidden('room_price', $rooms->price, ['id'=>'room_price']) }}
                                    {{ Form::hidden('total_cost', old('total_cost'), ['id'=>'cost']) }}
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group md-form">
                                        <label for="name" class="font-weight-bold">First Name:</label>
                                        {{ Form::text('fname', 'test', ['class' => 'form-control text-center font-weight-bold','id'=>'fname']) }}
                                    </div>
                                    <div class="col-md-6 form-group md-form">
                                        <label for="name" class="font-weight-bold">Last Name:</label>
                                        {{ Form::text('name', 'test', ['class' => 'form-control text-center font-weight-bold','id'=>'lname']) }}
                                    </div>
                                </div>
                               
                                <div class="form-group md-form">
                                    <label for="contact" class="font-weight-bold">Contact #:</label>
                                    {{ Form::text('contact', '09061237968', ['class' => 'form-control text-center  font-weight-bold','id'=>'contact']) }}
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group md-form">
                                                <label for="email" class="font-weight-bold">Email:</label>
                                                {{ Form::text('email', 'fsiapco@gmail.com', ['class' => 'form-control text-center  font-weight-bold','id'=>'email']) }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group md-form">
                                                <label for="conemail" class="font-weight-bold">Confirm Email:</label>
                                                {{ Form::text('conEmail', 'fsiapco@gmail.com', ['class' => 'form-control text-center  font-weight-bold','id'=>'confirmEmail']) }}
                                        </div>
                                    </div>
                                </div>
                               
                               
                                <div class="form-group md-form">
                                    <label for="request" class="font-weight-bold">Special Request:</label>
                                    {{ Form::textarea('request', 'towel', ['class' => 'form-control','id'=>'request','rows'=>'10']) }}
                                </div>
                                <p>
                                        <span class="font-weight-bold">Nights: <span class = "noOfNights"></span></span>
                                </p>
                                <h3>
                                    <span class="font-weight-bold">Total Cost:</span>
                                    <span class="float-right font-weight-bold" style="color:#61B361" id = "totalCost"></span>
                                    <span class="float-right font-weight-bold" style="color:#61B361">&#8369;</span>
                                </h3>
                                {{ Form::submit('Book Now', ['class'=>'btn form-control btnBook text-uppercase font-weight-bold m-0','style'=>'background-color:#410064;color:white; letter-spacing:1px; font-size: 20px;']) }}
                         
                        </form>
                    </div>
                </div>
                    
            </div> 
        </div>
    </div>
   
    <!-- Modal -->
    <form action="{{ route('reservation.store') }}" method="POST" >
            @csrf
           <div class="modal fade" id="bookNowModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
               <div class="modal-content">
                   <div class="modal-header text-white" style="background-image: linear-gradient(to right, #410064 , violet);">
                       <h5 class="modal-title" id="exampleModalLongTitle">Confirm Your Reservation</h5>
                       <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <div class="modal-body p-0">
                       <div class="text-center modalDate p-4">
                           {{-- Booking Details --}}
                           {{ Form::hidden('dates', '2019-06-12 - 2019-06-21', ['id' => 'booking_dates']) }}
                           {{ Form::hidden('room_detail_id', $rooms->room_details->first()->id, ['id' => 'room_id']) }}
                           {{ Form::hidden('total_cost', old('total_cost'), ['id'=>'total_cost']) }}
                           
                           {{-- User Details --}}
                           {{ Form::hidden('firstname', 'jeric', ['id'=>'formFirstName']) }}
                           {{ Form::hidden('lastname', 'mangao', ['id'=>'formLastName']) }}
                           {{ Form::hidden('email', 'mangao_jeric@yahoo.com', ['id'=>'formEmail']) }}
                           {{ Form::hidden('contact_number', '09280637616', ['id'=>'formContactNumber']) }}
                           {{ Form::hidden('special_request', 'extra kumot', ['id'=>'formSpecialRequest']) }}
   
   
                           <i class="fas fa-calendar-alt"></i>
                           {{-- June 06 --}}{{\Carbon\Carbon::parse($checkIn)->format('M d')}}
                           <i class="fas fa-angle-right ml-2 mr-2"></i>
                           <i class="fas fa-calendar-alt"></i>
                           {{-- June 10 --}}{{\Carbon\Carbon::parse($checkOut)->format('M d')}}
                           <i class="fas fa-angle-right ml-2 mr-2"></i>
                           <i class="fas fa-moon"></i>
                           <span class="noOfNights"></span> &nbsp;Nights                        
                       </div>
                       <div class="row p-2">
   
                           {{-- Customer Details --}}
                           <div class="col-md-6">
                               <div class="text-center p-3 h4 font-weight-bold">
                                    Your Details
                               </div>
                               <div class="pl-3 pr-3 font-weight-bold">
                                  Name:
                               </div>
                               <div class="pl-5 pr-3 font-weight-bold" style="font-size:18px;color:#4B0082">
                                   <span class="text-capitalize" id="displayFname"></span>
                                   <span class="text-capitalize" id="displayLname"></span>
                               </div>
                               <div class="pl-3 pr-3 font-weight-bold">
                                  Contact #:
                               </div>
                               <div class="pl-5 pr-3 font-weight-bold" style="font-size:18px;color:#4B0082">
                                  <span id="displayContact"></span>
                               </div>
                               <div class="pl-3 pr-3 font-weight-bold">
                                  Email:
                               </div>
                               <div class="pl-5 pr-3 font-weight-bold" style="font-size:18px;color:#4B0082">
                                  <span id="displayEmail"></span>
                               </div>
                               <div class="pl-3 pr-3 font-weight-bold">
                                  Special Request:
                               </div>
                               <div class="pl-5 pr-3 font-weight-bold text-justify">
                                       <span id="displayRequest"></span>
                               </div>
                           </div>
   
   
                           {{-- Reservation Details --}}
                           <div class="col-md-6 reservation_detials" style="border-left: #E1D8CF solid 1px;">
                               <div class="text-center p-3 h4 font-weight-bold">
                                    Reservation Details
                               </div>
                               <div class="modalDate pl-1 text-dark">
                                       <span class="font-weight-bold">Select Room/Rates</span> 
                                   </div>
                                   <div class="pl-2 pr-4 font-weight-bold">
                                       <span style="color:indigo">{{ $rooms->type }} #{{ $rooms->room_details->first()->room_no }}</span><span class="float-right"><span style="color:#61B361">&#8369;{{ $rooms->price }}</span>/Night</span>
                                   </div>
                                   <div class="pl-2 pr-4 font-weight-bold" style="font-style:italic;">
                                       Not refundable
                                   </div>
                                   <div>
                                       <span class="pl-2 pr-4 font-weight-bold" style="font-style:italic;">Tax Inclusive</span>
                                   </div>
                                   <div>
                                       <span class="pl-2 pr-4 font-weight-bold">Sub Total </span><span class="float-right pr-4" style="color:#61B361 !important;font-weight:bold;font-size:20px;" id="displayprice"></span>
                                       <span class="float-right" style="color:#61B361 !important;font-weight:bold;font-size:20px;">&#8369; </span>
                                   </div>
                                   <hr>
                                   <div>
                                       <span class="pl-2 pr-4 font-weight-bold" style="font-style:italic;">Additional Charges(3%) </span><span class="float-right pr-4" style="color:#61B361 !important;font-weight:bold;" id="displayCharges"></span>
                                       <span class="float-right " style="color:#61B361 !important;font-weight:bold;">&#8369; </span> 
                                   </div>
                                   <div>
                                       <span class="pl-2 pr-4 font-weight-bold">Total amount</span><span class="float-right pr-4 price" style="color:#61B361 !important;font-weight:bold;font-size:25px;" id="displayTotal"></span> 
                                       <span class="float-right " style="color:#61B361 !important;font-weight:bold;font-size:25px;">&#8369; </span> 
                                   </div>
                           </div>
                       </div>
                      
                   </div>
                   <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <button type="submit" class="btn text-white" style="background-color:indigo">Confirm and Pay</button>
                   </div>
               </div>
               </div>
           </div>
       </form>
           {{-- end modal --}}
   
@endsection
@section('script')
    <script src="{{ asset('js/formvalidation.js') }}"></script>
    <script>
        $(document).ready(function(){
            
            var input = document.getElementById('dates');
            var night = 0;
            var room_id = $('#room_id').val();
            var resp = [];
            $.getJSON('/getDates/'+room_id)
                .done(function(response) { 
                    var dateArray2 = Array.prototype.concat(...response['dates']);
                    var datepicker = new HotelDatepicker(input, {
                        autoClose : true,
                        disabledDates:dateArray2,
                        onSelectRange : function(){
                            var nights = datepicker.getNights();
                            var price =  $("#room_price").val();
                            $('.noOfNights').html(nights);
                            var total = price * nights; 
                            $("#cost").val(total);
                            $("#totalCost").html(total);
                            night = nights;
                        }
                    });
                    var nights2 = datepicker.getNights();
                    var price =  $("#room_price").val();
                    $('.noOfNights').html(nights2);
                    var total = price * nights2; 
                    $("#cost").val(total);
                    $("#totalCost").html(total);
                    night = nights2;
                   
                    
                });
            
            $("#dates").keypress(function(e){
                e.preventDefault();
              
            });
            $("#dates").keydown(function(){
                var key = event.keyCode || event.charCode;
                if(key == 8 || key == 46){
                    return false;
                }
            })


            $('.btnBook').click(function(e){
                var fname = $('#fname').val();
                var lname = $('#lname').val();
                var contact = $('#contact').val();
                var email = $('#email').val();
                var conEmail = $('#confirmEmail').val();
                var request = $('#request').val();
                var rate = $('#room_price').val();
                var sub = rate * night;
                var charges = sub * .03;
                var total = sub + charges;
                var dates = input.value;
                
                $("#booking_dates").val(dates);
                $("#total_cost").val(total);
             
                if($('#bookingForm').valid()){
                    e.preventDefault();
                    $('#bookNowModal').modal('show');
                    $('#displayFname').html(fname);
                    $('#displayLname').html(lname);
                    $('#displayContact').html(contact);
                    $('#displayEmail').html(email);
                    $('#displayRequest').html(request);
                    $('#displayprice').html(sub.toLocaleString("en"));
                    $('#displayCharges').html(charges.toLocaleString("en"));
                    $('#displayTotal').html(total.toLocaleString("en"));
                }
            })

$('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  centerMode: true,
  fade: true,
  asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  centerMode: true,
  arrows: false,
  focusOnSelect: true
});

        })
</script>
   <script>
    AOS.init();
  </script> 
@endsection