<div class="container navCont ">
<nav class="navbar navbar-expand-lg navbar-light pt-4 pb-4 bg-transparent">

  <a class="navbar-brand" href="/"><img class="logo" src="{{ asset('../img/sampleLogo.png') }}" style="width:260px;position:absolute;top:10px;left:-20px;" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span><i class="fa fa-bars "></i></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

    <ul class="navbar-nav ml-auto mt-lg-5">
      <li class="nav-item mr-3">
        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item mr-3">
        <a class="nav-link rooms" href="{{ route('list.index') }}">Rooms <span class="sr-only">(current)</span></a>
      </li>
     
      <li class="nav-item mr-3">
        <a class="nav-link" href="#">Booking <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item mr-3">
        <a class="nav-link" href="#">Events <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item mr-3">
        <a class="nav-link" href="#">Blog <span class="sr-only">(current)</span></a>
      </li> -->
      <li class="nav-item mr-3">
        <a class="nav-link" href="#contact">Contact <span class="sr-only">(current)</span></a>
      </li>
    </ul>

  </div>
</nav>
</div>