
<div id="carouselExampleIndicators" class="carousel slide lazy-load" data-ride="carousel">
  <ol class="carousel-indicators d-none d-md-block">
      {{-- <div class="text-center bookingSection p-3"> --}}
          <div class="row text-white bg-transparent"  style="font-size:13px;">
              <div class="col-lg-4">
                <div class="row">

                  <div class="col-md-12" style="border-right:2px solid white;">
                      <div class="row">
                        <div class="col-3 text-right calendarNumber p-0">
                            01
                        </div>
                        <div class="col-6 text-center pt-3">
                            <div class="textFormatCalendar">
                              DECEMBER
                            </div>
                            <div>
                              Check In
                            </div>
                        </div>
                        <div class="col-3 text-left pt-3">
                            <i class="fas fa-calendar-alt" style="font-size:35px;"></i>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 ">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="row">
                            <div class="col-3 text-right calendarNumber p-0">
                                04
                            </div>
                            <div class="col-6 text-center pt-3">
                                <div class="textFormatCalendar">
                                  DECEMBER
                                </div>
                                <div>
                                  Check In
                                </div>
                            </div>
                            <div class="col-3 text-left p-3">
                                <i class="fas fa-calendar-alt fa-3x"  style="font-size:40px;"></i>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-6 text-center pt-4">
                          <span>Promo Code</span>
                          <input type="text"> 
                      </div>
                    </div>
              </div>
              <div class="col-lg-4 ">
                  <div class="row">
                    <div class="col-md-6 pt-4 text-center">
                      <button class="text-white" style="background-color: rgb(225, 153, 51);font-size:13px;">CHECK AVAILABILITY AND PRICES</button>
                    </div>
                    <div class="col-md-6 pt-4 text-center" style="font-size:13px;" >
                      MODIFY OR CANCEL YOUR RESERVATION
                    </div>
                  </div>
              </div>
          </div>
      {{-- </div> --}}
  </ol>
  <div class="carousel-inner">
    
    <div class="carousel-item active test">
      <img class="d-block w-100" src="{{ asset('img/home.png') }}"  alt="First slide">
        <div class="carousel-caption  d-none d-md-block">
            <h1 class="fontCarousel roomLabel animated fadeInDown delay-1s">Welcome to HAVENDWELL</h1>
            <p class="animated fadeInUp delay-2s">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
            </p>
            <span class="ml-2">
              <a href="list">
                <button style="background-color: #9744BE;height:50px;width:200px;border:white 1px solid" class="btn animated fadeInUp text-white">Check Room</button>
              </a>
            </span>
            
        </div>
    </div>
    <div class="carousel-item test">
      <img class="d-block w-100" src="{{ asset('img/home.png') }}" alt="Second slide">
        <div class="carousel-caption  d-none d-md-block">
            <h1 class="fontCarousel roomLabel animated fadeInDown delay-1s">BEST PLACE TO FIND ROOM</h1>
            <p class="animated fadeInUp delay-2s">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
            </p>
            
            <span class="ml-2">
                <a href="list">
                   <button style="background-color: #9744BE;height:50px;width:200px;border:white 1px solid" class="btn animated fadeInUp text-white">Check Room</button>
                  </a>
            </span>
            
        </div>
    </div>
    <div class="carousel-item test">
        <img class="d-block w-100" src="{{ asset('img/home.png') }}" alt="Third slide">

        <div class="carousel-caption  d-none d-md-block">
            <h1 class="fontCarousel roomLabel animated fadeInDown delay-1s">Deluxe Family Loft</h1>
            <p class="animated fadeInUp delay-2s">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
            </p>
            <span class="ml-2">
                <a href="list">
                <button style="background-color: #9744BE;height:50px;width:200px;border:white 1px solid" class="btn animated fadeInUp text-white">Check Room</button>
                    
                  </a>
            </span>
            
        </div>
    </div>
</div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

