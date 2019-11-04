@extends('layouts.master')
@section('style')
    
        <style>
        hr{
            border: 1px dashed #410064;
        }
        .btnDetails{
            font-size: 70%;
            font-weight: bold;
            letter-spacing: 1px;
        }
    </style>
    
@endsection
@section('content')
<div class="pt-3 divRoom">
    
        <!-- <div class="row justify-content-center p-0 mb-5">
                <div class="col-md-8 p-3 text-center align-self-center headerRoomSample" style="background-color: #691AA9;border-top:white solid 1px;border-left:white solid 1px;border-right:white solid 1px;">
                  
                    HAVEND<b style="font-size:25px;">WELL</b>
                           
                </div>
        </div> -->
        <div class="row justify-content-center mt-5 mb-1">
            <!-- <div class="col-md-8" style="background-color: #C752FF;border-bottom:white solid 1px;border-left:white solid 1px;border-right:white solid 1px;">
                {{-- test --}}
            </div> -->
        </div>             
            @forelse($rooms as $key => $room)
                <div class="row justify-content-center pb-2 pl-5 pr-5 ">
                    <div class="col-md-8">
                        <div class="row" style="height:auto;background-color:linen;">
                            <div class="col-lg-4 imageRoom p-0">
                                <img class="img-fluid" src="{{ asset('img/rooms/'.$room->photo) }}" alt="">
                            </div>
                            <div class="col-lg-8 descriptionRoom p-3">
                                <div class="row justify-content-end">
                                    <div class="col-md-9 pl-5" style="height:auto;">
                                        <h4 style="color:#410064">
                                            <b>{{ $room->type }}</b>      
                                        </h4> 
                                        <span><i class="fas fa-cube" style="color:#410064"></i>28m<sup>2</sup> </span>
                                        |
                                        <span>
                                            <b>Max guests:
                                                {{-- {{ $room->guests }} --}}
                                               @for($i=1; $i<=$room->guests; $i++)
                                                    <i class="fas fa-male" style="color:#410064"></i>
                                               @endfor
                                                
                                            </b>
                                        </span>
                                        <hr>
                                        <p>
                                            All Deluxe Rooms have customized beds and air-conditioning system that is equipped with an... more
                                        </p>
                                        <hr>
                                        <table>
                                         
                                             @forelse($room->room_amenities as $amenityKey => $room_amenities)           
                                                    @if($amenityKey == 3)
                                                        @break
                                                    @endif
                                                <td style="color:#410064">
                                                   <i class="fa {{$room_amenities->list_amenities['icon']}}"> </i> 
                                                   {{$room_amenities->amenities}}
                                                   &nbsp;&nbsp;
                                                </td>      
                                                @empty
                                                    No Amenities
                                                @endforelse
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
                                            <button class="btn px-1 rounded-0 mt-5 text-white btnDetails" style="background-color: #410064;" type="button" data-toggle="collapse" data-target="#collapseExample{{ $key }}" aria-expanded="false" aria-controls="collapseExample{{ $key }}">
                                                    DETAILS & BOOK
                                            </button> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" row justify-content-end collapse" id="collapseExample{{ $key }}">
                            <div class="col-md-12" style="background-color:linen;">
                                <hr>
                                <div class="row p-3">
                                    <div class="col-md-4 roomDetails" style="border-right:#E1D8CF solid 1px;">
                                        <table>
                                            @forelse($room->room_amenities as $amenityKey => $room_amenities)           
                                                @if($amenityKey == 3)
                                                    @break
                                                @endif
                                                <tr>
                                                    <td style="color:#410064">
                                                            <i class="fa {{$room_amenities->list_amenities['icon']}}"> </i> 
                                                            {{$room_amenities->amenities}}
                                                            &nbsp;&nbsp;
                                                    </td>     
                                                </tr>
                                             
                                            @empty
                                                No Amenities
                                            @endforelse
                                        </table>


                                    </div>
                                    <div class="col-md-8">
                                        <!-- <table>
                                            <tr>
                                                <td colspan="3">
                                                ONLINE
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width:500px;">
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                                </td>
                                                <td class="text-center" style="width:200px;">
                                                    <span>&#8369;</span> @convert($room->price)
                                                </td>
                                                <td class="text-center" style="width:200px;">
                                                    <button style="background-color: #410064;color:white;" class="btn">Book Now</button>
                                                </td>
                                            </tr>

                                          
                                        </table> -->

                                        <div class="container">
                                            <h5 class="pt-2">ONLINE</h5>
                                            <div class="row">
                                                <div class="col-md-7">
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="row">
                                                        <div class="col p-3" >
                                                            <span>&#8369;</span> @convert($room->price)
                                                        </div>
                                                        <div class="col p-3" style="">
                                                            <button style="background-color: #410064;color:white; margin:0 auto; display:block;" class="btn">Book Now</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
            <div class="row justify-content-end pr-5">
                {{$rooms->links()}}
            </div>
            
</div>
    
@endsection

@section('script')
   
@endsection