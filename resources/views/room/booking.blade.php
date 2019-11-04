@extends('layouts.app')
@section('content')
    <h1>{{ $room->type }}</h1>
    @foreach($room->room_details as $details)
        <p>{{ $details->amenities }}</p>
    @endforeach
    {!! Form::open(['route' => 'room.check', 'method' => 'POST']) !!}
        <input type="text"  name ="dates" id="dates" class="form-control" style="display:none;">
        {{ Form::submit('Submit', ['class' => 'btn btn-success']) }}
    {!! Form::close() !!}
    <div id = "displayPicker"></div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            function formatDate(date) {
                var monthNames = [
                    "January", "February", "March",
                    "April", "May", "June", "July",
                    "August", "September", "October",
                    "November", "December"
                ];
                
                var day = date.getDate();
                var monthIndex = date.getMonth();
                var year = date.getFullYear();
               
                return year + '-' + monthNames[monthIndex] + '-' + day;

                }
                

                var room_id = '{{ $room->id }}';
                dates = [];
                var input = document.getElementById('dates');
                var container = document.getElementById('displayPicker');
                $.ajax({
                    url : '/room/getDetails/'+room_id,
                    method: 'GET',
                    dataType : 'json',
                    success : function(data){
                        var datesArrays = data;
                        var dateArray = [].concat.apply([], datesArrays); 
                        var dateArray2 = Array.prototype.concat(...datesArrays);

                        var datepicker = new HotelDatepicker(input, {
                            container: container,
                            autoClose : false,
                            showTopbar: false,
                            disabledDates:dateArray2
                        });
                            datepicker.open();
                             $(window).click(function() {
                                datepicker.open();
                            })
                    }
                });
        });
    </script>    
@endsection