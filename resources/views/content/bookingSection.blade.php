

{{-- Start Booking Section --}}

        <div class="row">
                <div class="col">
                        <img class="img-fluid"  src="{{ asset('img/panot.png') }}" alt="" srcset="">
                </div>
                <div class="col" style="position:absolute;height:100%;padding-top:25%;-webkit-flex-wrap;">
                        <img class="img-fluid" src="{{ asset('img/slogan.png') }}" alt="" style="padding-left:5%;">
                </div>
        </div>

        <div class="row" style="display:flex;">
                <div class="col-md-4" id="order-one">
                        <div class="text-center p-4">
                                <h1 style="font-weight:bold;color:gray">HAVENDWELL ROOMS</h1>
                        </div>
                        <div class="p-4 text-center">
                                <div class="card text-white">
                                        <img class="card-img" src="{{ asset('img/room1.png') }}" alt="Card image">
                                        <div class="card-img-overlay roomOverlay" style="">
                                                <div class="row justify-content-center pt-2">
                                                        <h5 class="card-title">Haven Suite 1</h5>
                                                </div>
                                                <div class="row justify-content-center">
                                                        <button style="background-color: rgb(225, 153, 51);color:white;border:none;">CHECK AVAILABILITY AND PRICES</button>
                                                </div> 
                                        </div>
                                </div>
                        </div>
                </div>

                <div class="col-md-8 bg-HW_violet havendwell-room-text" id="order-two">
                        <p>Remarkable views of nature are there when you wake up in the morning and before you retreat at night. The cultural distinctions are evident in its cozy villas and cottages.
                        </p>

                        <p>With different options of quality, acommodations, each traveler's needs will certainly be addressed at Havendwell. All villas and cottages have balconies where you can bask and marvel at the beauty around you together with these amenities.
                        </p>
                        <ul class="rooms">
                                <li  data-aos="zoom-in" data-aos-offset="100"  data-aos-easing="ease-in-sine">&nbsp;Air-conditioning</li>
                                <li  data-aos="zoom-in" data-aos-offset="200"  data-aos-easing="ease-in-sine">&nbsp;Cable television</li>
                                <li data-aos="zoom-in" data-aos-offset="250"  data-aos-easing="ease-in-sine">&nbsp;Coffee/tea-making facility</li>
                                <li  data-aos="zoom-in" data-aos-offset="300"  data-aos-easing="ease-in-sine">&nbsp;Room safe</li>
                                <li data-aos="zoom-in" data-aos-offset="350"  data-aos-easing="ease-in-sine">&nbsp;Telephone</li>
                        </ul>
                        <button style="width:20%;background-color: rgb(225, 153, 51);color:white;border:none;text-transform:uppercase">view all</button>
                </div>

                <div class="col-md-4" id="order-three">
                        <div class="p-4 text-center">
                                <div class="card text-white">
                                        <img class="card-img" src="{{ asset('img/room1.png') }}" alt="Card image">
                                        <div class="card-img-overlay roomOverlay" style="">
                                                <div class="row justify-content-center pt-2">
                                                        <h5 class="card-title">Haven Suite 1</h5>
                                                </div>
                                                <div class="row justify-content-center">
                                                        <button style="width:50%;background-color: rgb(225, 153, 51);color:white;border:none;">CHECK AVAILABILITY AND PRICES</button>
                                                </div> 
                                        </div>
                                </div>
                        </div>             
                </div>
                <div class="col-md-8" id="order-four">
                        <div class="row">
                                <div class="col bg-HW_violet">
                                        <div class="p-4 text-center">
                                                <div class="card text-white">
                                                        <img class="card-img" src="{{ asset('img/room1.png') }}" alt="Card image">
                                                
                                                </div>
                                        </div>         
                                </div>

                                <div class="col bg-HW_violet">
                                        <div class="p-4 text-center">
                                                <div class="card text-white">
                                                        <img class="card-img" src="{{ asset('img/room1.png') }}" alt="Card image">
                                                        
                                                </div>
                                        </div>          
                                </div>
                        </div>
                </div>
        </div>



        <div class="row">
                <div class="col-md-4" style="background-color: rgb(246,230,250);">
                        <h3 class="headingText" style="padding-left:50px;text-transform:uppercase;font-weight:bold;font-family: Arial, Helveticam sans-serif; padding-top:15px;">BOOKING</h3>
                </div>
                <div class="col-md-8" style="background-color: rgb(255,225,194);padding: 2% 0;">
                        <div class="calendar-container" style="margin: 0 auto; display:block;">

                        <div class="row">
                                <div class="col-md-4 text-center nights">
                                        <span id ="nights" style="font-size:50px;font-style:italic;color:#660066">0</span><i class=" fa fa-moon"></i> <span id = "nightText" class="font-weight-bold"></span> 
                                        <span> <i class="fa fa-arrow-right ml-3"></i></span>
                                </div>
                                <div class="col-md-4 ">
                                        <p>
                                                <input type="text" placeholder="CHECK IN" class="form-control textboxField mt-4 text-center" id = "arrival" readonly>
                                        </p>
                                </div>
                                <div class="col-md-4 ">
                                        <p>
                                                <input type="text" placeholder="CHECK OUT" class="form-control textboxField mt-4 text-center" id = "check_out" readonly>
                                        </p>
                                </div>
                        </div>
                        <div class="row">
                                <div class="col mb-2">
                                        <input type="text"  name ="dates" id="dates" class="form-control" style="display:none;" value = "{{ \Carbon\Carbon::now()->format('Y-m-d') }} - {{ \Carbon\Carbon::now()->addDay()->format('Y-m-d') }}">
                                        <button id = "btnSubmit" class="form-control btnColor m-auto">Submit</button>    
                                </div>
                        </div>
                        </div>
                </div>   
        </div>

        
<div class="container-fluid  mt-4">

<h2 class="headingText" style="padding-left:50px;text-transform:uppercase;font-weight:bold;font-family: Arial, Helveticam sans-serif;">events</h2>
 
        <div class="row">
        
                <div class="col-md-6" id="eventCorporate">
                        
                        <h4 style="color:rgb(102, 51, 153);font-weight:bold;text-transform:uppercase;font-family: Arial, Helvetica, sans-serif;">Corporate</h4>
                        <p>Conduct meetings, conferences and other corporate events in a setting that gives you more than just business power-ups</p>
                        <p>Here at <strong><i>Havendwell</i></strong>, you may opt to choose among 3 function rooms that can best suit yout purpose. Each of these venues can be set up in classroom style, U-shape and theater. If you opt for something beyond ordinary, you may also choose to have an outdoor set-up</p>
                        <ul class="rooms">
                                <li>&nbsp;Wi-Fi internet access</li>
                                <li>&nbsp;LCD projector</li>
                                <li>&nbsp;Projector screen</li>
                                <li>&nbsp;Sound system</li>
                        </ul>
                       
                                <div class="row">
                                        <div class="col">
                                                <button class="pl-4 pr-4 btn-Event" style="">Request Quotation</button>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col">
                                                <img src="../img/1.png" alt="">
                                        </div>
                                </div>
                </div>

                <div class="col-md-6" style="background-color:#f6e6fa;" id="eventWedding">
                        
                <h4 style="color:rgb(102, 51, 153);font-weight:bold;text-transform:uppercase;font-family: Arial, Helvetica, sans-serif;">Weddings & Events</h4>
                        <p>Life is full of wonderful surprises and moments best remembered for all time. Whether you are exchanging vows, celebrating life or simply rejoicing milestones, spending a special moment at Havendwell will be worthwhile</p>
                        <p>Your photos for these precious times will look even more stunning with the pecturesque scenery gracing the background, as well as the artistic cultures dotting every corner of the resort</p>
                        <div class="container" style="margin-top:100px;">
                                <div class="row">
                                        <div class="col-lg-12 md-6">
                                                <button class="pl-4 pr-4 btn-Event" style="">Request Quotation</button>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-md-6">
                                                <img src="../img/2.png" alt="">
                                        </div>
                                </div>
                        </div>

                        <!-- <button style="width:30%;float:right;margin-right:10%;background-color: rgb(225, 153, 51);color:white;border:none; text-transform:uppercase;">Request Quotation</button>
                        <img src="../img/2.png" alt="" style="width:40%;padding-top:50px; bottom:10px; position:absolute;" > -->
                </div>
        </div>
</div>
<div class="container-fluid">
        <div class="row">
                <div class="col" style="background-color:#ffe1c2;">
                        <h2 class="headingText" style="padding: 20px 0 0 50px;text-transform:uppercase;font-weight:bold;font-family: Arial, Helveticam sans-serif;" id="mobileAbout">about us</h2> 
                </div>
                <div class="col mobileDesign2"></div>
        </div>
        <div class="row">
                
                <div class="col-md-6 aboutCont" style="background-color:#ffe1c2;">
                        <h3 style="color:rgb(102, 51, 153);font-weight:bold;text-transform:uppercase;font-family: Arial, Helvetica, sans-serif;">History</h3>
                        <p><strong>Havendwell Resort</strong> is a family owned tourism establishment in the province of Camiguin with business addresses at Umycco Upper Poblacion, Mambajao Camiguin and Yumbing Mambajao Camiguin.</p>
                        <div id="showReadmore1"><p>Havendwell is one of the newest resorts in the island offering quality standard of facilities and services. It is designed with a sense of a peaceful community and a relaxed intimate atmosphere, making it perfect for families and couples for whom a tranquil envrironment is an important part of the holiday experience.</p>
                        <p>Havendwell located at Yumbing, Mambajao Camiguin is a total package of an amazing tranquil beachfront ambiance. The ocean view and spectacular sunset manifested the true essence of nature's beauty. It has a very tranquil and relaxing atmosphere with the added value of its proximity to the very beautiful white island which is one of the most popular tourist destinations in the island. While the garden resort surrounded with variety of foliage and blooms is located at Umycco Upper Poblacion, Mambajao Camiguin.</p></div>
                </div>

                <div class="col-md-6 aboutCont">
                        <div id="showReadmore2"><p>A location with high proximity to the central business district of Mambajao which is Barangay Poblacion. The resort has a great advantage in terms of its access with only a walking distance to the tranding center like public market, malls, groceries, drugstores and financial institutions like bank and money changers</p>
                        <p>It is also near to yhe government facilities like hospitals and other health facility</p></div> 
                        <button class="pl-3 pr-3" id="readMore" style="background-color:rgb(225, 153, 51);color:white;border:none;float:right;display:none">Read More</button>
                        <br><br>
                        
                        <h3 style="color:rgb(102, 51, 153);font-weight:bold;text-transform:uppercase;font-family: Arial, Helvetica, sans-serif;">MISSION & VISION</h3>
                        <p>We are dedicated to provide the highest standerds quality service in order to serve our customers with delightful experiences that will surely exceed their expectations. As an agent of sustainable ecotourusm we are committed to help preserve Camiguin's natural beauty and promote the island's local tourism</p>
                        <p>To be acknowledged as the best nature-friendly resort in Camiguin equipped with globally competitive facilities and amenities with an outstanding customoer-oriented service and management</p>
                </div>
        </div>
</div>


{{-- End Of Booking Section --}}