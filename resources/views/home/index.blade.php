@extends('layouts.master')
<style scoped>
#myCarousel .list-inline {
    white-space:nowrap;
    overflow-x:auto;
}

#myCarousel .carousel-indicators {
    position: static;
    left: initial;
    width: initial;
    margin-left: initial;
}

#myCarousel .carousel-indicators > li {
    width: initial;
    height: initial;
    text-indent: initial;
}

#myCarousel .carousel-indicators > li.active img {
    opacity: 0.7;
}
.error{
        color:red;
}
ul {
  list-style: none;
}

.rooms li:before {
  content: '✓';
  font-weight: bold;
}

</style>
@section('content')
        @include('content.carousel')  

        @include('content.bookingSection')
<div id="test">
        @include('content.contactUs') 
</div>
        <div class="divider"></div>
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
                                        var arrival  = $("#arrival").val(formatDate(new Date(dates[0])));
                                        var check_out = $("#check_out").val(formatDate(new Date(dates[1])));
                                        $("#nights").html(nights);
                                        if(nights > 1){
                                                $("#nightText").html("NIGHTS");
                                        }else{
                                                $("#nightText").html("NIGHT"); 
                                        }
                                }
                                
                                });

                        assignValue();

                        function assignValue(){
                                var values = datepicker.getValue();
                                var nights = datepicker.getNights();
                                var dates = values.split(/ - /);
                                var arrival  = $("#arrival").val(formatDate(new Date(dates[0])));
                                var check_out = $("#check_out").val(formatDate(new Date(dates[1])));
                                $("#nights").html(nights);
                                $("#nightText").html("NIGHT");
                        }
                       
                                
                        datepicker.open();
                        $(window).click(function(){
                                datepicker.open();
                               
                        });

                        $("#btnSubmit").click(function(e){
                                arrival = $("#arrival").val();
                                departure = $("#check_out").val();
                                if(arrival == "" || departure == ""){
                                        e.preventDefault();
                                        Swal.fire({
                                                title: 'Error!',
                                                text: 'Do you want to continue',
                                                type: 'error',
                                                confirmButtonText: 'Cool'
                                        })
                                }else{
                                        window.location.href = "room/check-availability/"+arrival+"/"+departure;
                                }
                        });


                        $('.roomPreview').click(function(){
                                
                                $('#roomPreviewModal').modal('show');
                                $roomID = $(this).attr('id');

                                $.ajax({
                                        url:"roomDetails/"+$roomID,
                                        method:"GET",
                                        success:function(data){
                                                

                                                $(".roomNameModal").html(data.type);
                                                $(".roomImageModal").append("<img id='roomModalImg' class='img-fluid' src='img/rooms/"+data.photo+"'></img>");
                                                $.each(data.room_amenities,function(i,amenities){
                                                        var icon = amenities.list_amenities;
                                                        
                                                        $('.list').append('<li>'+"<i class='fa "+icon.icon+"'>"+" "+data.room_amenities[i].amenities+'</li>');
                                                });  
                                        }
                                });
                        });

                        $('#roomPreviewModal').on('hidden.bs.modal', function (e) {
                                $("li").remove();
                                $("#roomModalImg").remove();
                        })

                        $('#btnFormSubmit').click(function(e){
                                e.preventDefault();
                                var name = $('#name').val();
                                var email = $('#email').val();
                                var contact_number = $('#contact_number').val();
                                var message = $('#message').val();

                                if($('#contactUsForm').valid()){

                                        $.ajax({
                                                type        : 'GET',
                                                url         :  'contactUs',
                                                data        :{
                                                       name :name,
                                                       email:email,
                                                       contact_number:contact_number,
                                                       message:message
                                                },
                                                // dataType    : 'json',
                                                success: function(data){
                                                        document.getElementById('contactUsForm').reset();
                                                        Swal.fire({
                                                                title: 'Sucess!',
                                                                text: 'Message Sent Successfully',
                                                                type: 'success',
                                                                showConfirmButton: true,
                                                                timer: 15000
                                                        })                                    
                                                }
                                        }); 
                                      
                                // $('#contactUsForm').submit();
        
                                }else{
                                        $('#contactUsForm').validate({
                                                rules:{
                                                        name: {
                                                                required:true,
                                                                minlength:2,
                                                        },
                                                        email:{
                                                                required:true,
                                                                email:true,      
                                                        },
                                                        contact_number:{
                                                                required:true,
                                                                number:true,
                                                                minlength:5,
                                                                maxlength:11,
                                                        },
                                                        message:{
                                                                required:true, 
                                                                minlength:5,
                                                        }
                                                }
                                        }); 
                                }
                        });
                       
                 
                   


                });

                AOS.init();
                
        </script> 
@endsection