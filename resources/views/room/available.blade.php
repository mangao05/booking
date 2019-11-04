@extends('layouts.master')
@section('style')
    <style scoped>
        hr{
            border: 1px dashed #410064;
        }
        .btnDetails{
            font-size: 70%;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .bookingDetails{
            border-right:#E1D8CF solid 1px;
        }
        @media screen and (min-width:200px) and (max-width:499px){
            .nav-link{
                color:white!important;
            }
            .checkAvailable{
                padding: 0 !important;                
            }
            .container-fluid{
                padding: 0 6% !important;
            }
            .bookingDetails{
                border-right:none;
                border-bottom:#E1D8CF solid 1px;
            }
            .roomPrice{
                padding:10px 0  !important;
                text-align:center;
            }     
        }  

         
         @media only screen and (max-width: 900px) and (min-width: 770px)  {
            .datepicker {
               
                width:35vw !important;      
                }
                .datepicker__month-day{
                    padding: 10px 10px !important;
                }
               

        } 

        @media only screen and (max-width: 1210px) and (min-width: 900px)  {
            .datepicker {
           
                width:320px !important;
                }
                .datepicker__months {
                        overflow: hidden;
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
                        
            }
        @media only screen and (max-width: 1400px) and (min-width: 1210px) {
            .datepicker {
                width: 450px !important;
                padding: 0% !important;
                }
            .datepicker__months {
                    overflow: hidden;
                }
            .datepicker__month {
                    width: 100px;
                    margin-left: 5%;
                    margin-right: 5%;
                }
            .calendar{
                position:relative;
                    right:25%;
            }
        }

        @media only screen and (max-width: 1450px) and (min-width: 1400px) {
            .datepicker {
            
                width: 530px !important;
                padding: 0% !important;
                }
            .datepicker__months {
                    overflow: hidden;
                }
            .datepicker__month {
                    width: 100px;
                    margin-left: 5%;
                    margin-right: 5%;
                }
            .calendar{
                position:relative;
                    right:25%;
            }
        }
    
        @media only screen and (max-width: 1800px) and (min-width: 1450px) {
        .datepicker {

        width: 550px !important;
        padding: 0% !important;
        }

    }   

    </style>
@endsection
@section('content')

<div class="container-fluid p-5">
    <div class="row pt-3">    
        <div class="col-md-5 checkAvailable">
           <input type="text"  name ="dates" value="{{ $checkIn }} - {{ $checkOut }}" id="dates" class="form-control" hidden>    
              <div class="col p-3 headerRoomSample " style="background-color: #C752FF;border-bottom:white solid 1px;border-left:white solid 1px;border-right:white solid 1px;">
                <span><i class="fas fa-calendar-alt mr-2"></i><b>{{ \Carbon\Carbon::parse($checkIn)->format('M d') }}</b></span>
                <span><i class="fas fa-angle-double-right mx-3"></i></span>
                <span><i class="fas fa-calendar-alt  mx-3"></i><b>{{ \Carbon\Carbon::parse($checkOut)->format('M d') }}</b></span>
                <span><i class="fas fa-angle-double-right mx-3"></i></span>
                <span><i class="fas fa-moon ml-3"></i><b>
                    @php
                        $from = \Carbon\Carbon::parse($checkIn);
                        $to = \Carbon\Carbon::parse($checkOut);
                        $diff = $from->diffInDays($to);
                        
                        
                    @endphp
                        
                        {{ $diff }}{{  ($diff > 1) ? " Nights"  : " Night"  }}
                </b></span> 
            </div>
            <div id = "displayPicker" class="mb-3"></div>
        </div>
        
        <div class="col-md-7 ">
            @forelse($rooms as $key => $room)
                @forelse($room->room_details as $keys => $detail)
                @if($keys == 1)
                    @break
                @endif
                <div class="row justify-content-center">
                    <div class="col-md-12 mb-3" style="box-shadow:0px 0px 3px gray">
                        <div class="row" style="height:auto;background-color:linen;">
                            <div class="col-lg-4 imageRoom p-0">
                                <img class="img-fluid" src="{{ asset('img/img2.jpg') }}" alt="">
                            </div>
                            <div class="col-lg-8 descriptionRoom p-3">
                                <div class="row justify-content-end">
                                    <div class="col-md-9 pl-5" style="height:auto;">
                                        <span class="h4" style="color:#410064">
                                            <b>{{$room->type}}</b> 
                                        </span>
                                        <span class="font-weight-bold text-white badge badge-info p-2 rounded-0 float-right" style="letter-spacing: 1px; box-shadow: 0px 0px 3px gray;"> {{ count($room->room_details) }}
                                                @php 
                                                    echo (count($room->room_details)  > 1 ) ? 'Rooms' : 'Room' 
                                                @endphp
                                                Available
                                            </span>   
                                        <br>
                                        
                                        <span><i class="fas fa-cube" style="color:#410064"></i>28m<sup>2</sup> </span>
                                            |
                                        <span><b>Max guests:<i class="fas fa-male" style="color:#410064"></i><i class="fas fa-male" style="color:#410064"></i></b></span>
                                        <hr>
                                        <p>
                                            All Deluxe Rooms have customized beds and air-conditioning system that is equipped with an... more
                                        </p>
                                        <hr >
                                    
                                        <table>          
                                                    @forelse($room->room_amenities as $amenityKey => $amenities)
                                            
                                                        @if($amenityKey == 3)
                                                            @break
                                                        @endif
                                                            
                                                        <td style="color:#410064">
                                                            {{ $amenities->icon }}
                                                            {{ $amenities->amenities }}</i>&nbsp;&nbsp;
                                                        </td>
                                                    @empty
                                                        No Amenities
                                                    @endforelse
                                                
                                                
                                                {{-- <td><i class="fas fa-umbrella-beach ml-2" style="color:#410064">Lake View</i></td>
                                                <td><i class="fas fa-wifi ml-2" style="color:#410064">Free Wi-Fi</i></td> --}}
                                        </table>
                                            
                                    </div>
                                        
                                    <div class="col-md-3 text-center" style="border-left:#E1D8CF solid 1px;">
                                            Starting From
                                            <br>
                                            <span style="font-size:25px;font-weight:bold;color:green">&#8369;@convert($room->price)</span> 
                                            <br>
                                            <sup>for</sup>
                                            <span style="font-size:30px;">1</span> 
                                            <sub>night</sub>
                                            {{-- <a  href = "#"  room-id = "{{ $room->id }}" class="btn text-white btnBook mt-5" style="letter-spacing: 2px; background-color:rgba(122,21,122,0.5);box-shadow: 0 8px 16px 0 rgba(0,0,0,0.4); cursor: pointer; ">Book now</a> --}}
                                            <button class="btn px-1 rounded-0 mt-5 text-white btnDetails" style="background-color: #410064;" type="button" data-toggle="collapse" data-target="#collapseExample{{$key}}" aria-expanded="false" aria-controls="collapseExample{{$key}}">
                                                    DETAILS & BOOK
                                            </button> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" row justify-content-end collapse" id="collapseExample{{$key}}">
                            <div class="col-md-12" style="background-color:linen;">
                                <hr>
                                <div class="row p-3">
                                    <div class="col-md-4 bookingDetails" style="">
                                        <table>
                                            @forelse($room->room_amenities as $amenityKey => $amenities)
                                                <tr>
                                                    <td style="color:#410064">
                                                        @if ($amenities->amenities == 'One Queen bed, One Single Bed')
                                                            <i class="fas fa-bed"></i>
                                                        @elseif($amenities->amenities == 'Free Breakfast')
                                                            <i class="fas fa-utensils">
                                                        @elseif($amenities->amenities == 'Private Bathroom')
                                                            <i class="fas fa-bath">
                                                        @elseif($amenities->amenities == 'Cable Tv')
                                                            <i class="fas fa-tv">
                                                        @elseif($amenities->amenities == 'Free Wifi')
                                                            <i class="fas fa-wifi">
                                                        @elseif($amenities->amenities == 'Hot & Cold Shower')
                                                            <i class="fas fa-shower">
                                                        @elseif($amenities->amenities == 'Free Food')
                                                            <i class="fas fa-utensils">
                                                        @endif
                                                        
                                                            </i>
                                                    </td>
                                                    <td>{{ $amenities->amenities }}</td>
                                                </tr>
                                            @empty
                                                No Features
                                            @endforelse            
                                    </table>    
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                ONLINE<br>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,                                                
                                            </div>

                                            <div class="col-md-3 p-5 roomPrice" >
                                                <span>&#8369;@convert($room->price)</span> 
                                            </div>

                                            <div class="col-md-3 py-5 roomPrice">
                                                <a  href = "#"  room-id = "{{ $room->id }}" class="btn text-white btnBook rounded-0 centerAlignment" style="letter-spacing: 2px; background-color:rgba(122,21,122,0.5);box-shadow: 0 8px 16px 0 rgba(0,0,0,0.4); cursor: pointer; ">Book now</a> 
                                            </div>
                                        </div>
                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty 
                @if($key == 1)
                <div style="padding-top:150px;">
                        <h1 class="text-center"><label for=""><i>No Rooms Available</i></label></h1>
                    </div>
                @endif
                @endforelse
                @empty
                {{-- <h1>No Rooms Available</h1> --}}
                @endforelse
        </div>
    </div>
</div>

@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#loadingDiv').bind('ajaxStart', function(){
                $(this).css({'display':'block'});
                $("#roomDiv").hide();
            }).bind('ajaxStop', function(){
                $(this).hide();
                $("#roomDiv").show();
            });
            var input = document.getElementById('dates');
            var container = document.getElementById('displayPicker');
            var datepicker = new HotelDatepicker(input, {
                        container : container,
                        autoClose : false,
                        showTopbar: false ,
                        onSelectRange : function(){
                            $(".btnBook").attr('data-datepick', input.value);
                            var values = datepicker.getValue();
                            var dates = values.split(/ - /);
                            var checkIn = dates[0];
                            var checkOut = dates[1];   
                           window.location.href = "/room/check-availability/"+checkIn+'/'+checkOut;
                        }
                    });
            datepicker.open();

            $(window).click(function(){
                datepicker.open();
            });
            $(".btnBook").click(function(e){
                e.preventDefault();
            
                var values = datepicker.getValue();
                            var dates = values.split(/ - /);
                            var checkIn = dates[0];
                            var checkOut = dates[1];   
                var roomId= $(this).attr('room-id');
                window.location.href="/reservation/"+roomId+"/"+checkIn+"/"+checkOut;
            })
        });
    </script>
@endsection