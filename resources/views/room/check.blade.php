@extends('layouts.app')
@section('content')
    
        <div class="row" style="position:relative">
            <div class="col-3">
                    
                        <input type="text"  name ="dates" id="dates" class="form-control" style="display:none;">
                        
                        <a id = "btnSubmit" class="btn btn-success float-right" style="display:none;">Submit</a>
                    <span id = "nights"> </span> NIGHTs
                    <input type="text" placeholder="CHECK IN" class="form-control" id = "arrival" readonly>
                    <input type="text" placeholder="CHECK OUT" class="form-control" id = "check_out" readonly>

            </div>
        </div>
        <div id = "displayPicker" style="position:absolute"></div>
        
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
                
                    return monthNames[monthIndex] + ' ' +day + ', ' + year;

                }

            var input = document.getElementById('dates');
            var container = document.getElementById('displayPicker');
            var datepicker = new HotelDatepicker(input, {
                        container : container,
                        autoClose : false,
                        showTopbar: false,
                        onSelectRange: function() {
                            var values = datepicker.getValue();
                            var nights = datepicker.getNights();
                            var dates = values.split(/ - /);
                            $("#btnSubmit").show();
                            $("#arrival").val(formatDate(new Date(dates[0])));
                            $("#check_out").val(formatDate(new Date(dates[1])));
                            $("#nights").html(nights);
                        }
                    
                    });
                        
            datepicker.open();
            $(window).click(function(){
                datepicker.open();
            })

            $("#btnSubmit").click(function(){
                arrival = $("#arrival").val();
                departure = $("#check_out").val();
                window.location.href = "room/check-availability/"+arrival+"/"+departure;
            });
       })
     
   </script>
@endsection