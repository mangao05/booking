
<div class="parallax p-5" style=" background-image: url('img/img5.jpg');" id="contact"  >
        <div class="row  justify-content-center" data-aos="zoom-in"
        data-aos-duration="1000">
                <div class="col-md-5 p-0  mt-4" style="border-bottom-right-radius:10px;border-top-left-radius:10px;background-color:rgba(225, 225, 225, 0.9);box-shadow:0px 0px 5px black">
                        <div class="p-2 text-white" style="border-top-left-radius:10px;background-color:rgb(99, 81, 206)">
                                <h3 class="font-weight-bold text-center mt-2">
                                        Contact
                                </h3>
                             
                        </div>

                       
                        <div class="row  justify-content-center" >
                                <div class="col-md-9 p-4">
                                        <form  id="contactUsForm" >
                                        <div>
                                                <span class="font-weight-bold">
                                                        Name: 
                                                </span>
                                        </div>
                                        <div>
                                                <input class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}"  type="text" minlength="2" id="name" name="name" required/>
                                                @if($errors->any())
                                                <h6 class="error text-bold">{{$errors->first('name')}}</h4>
                                                @endif
                                        </div>
                                        <div>
                                                <span class="font-weight-bold">
                                                        Email:
                                                </span>
                                        </div>
                                        <div>
                                                <input  class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}"  id="email" name="email" type="email" required/>
                                                @if($errors->any())
                                                <h6 class="error text-bold">{{$errors->first('email')}}</h4>
                                                @endif
                                        </div>
                                        <div>
                                                <span class="font-weight-bold">
                                                        Contact Number:
                                                </span>
                                        </div>
                                        <div>
                                                <input  class="form-control @error('contact_number') is-invalid @enderror"  value="{{ old('contact_number') }}" type="number"  id="contact_number" name="contact_number"  onKeyPress="if(this.value.length==13) return false;" onkeydown="javascript: return event.keyCode == 69 ? false : true" required/>
                                                @if($errors->any())
                                                <h6 class="error text-bold">{{$errors->first('contact_number')}}</h4>
                                                @endif
                                        </div>
                                        
                                        <div class="mt-3">
                                                <textarea  placeholder="Message here..." style="font-style:italic;"  class="form-control @error('message') is-invalid @enderror mb-4"  value="{{ old('message') }}  " cols="30" rows="10"  id="message" name="message"  required></textarea>
                                                @if($errors->any())
                                                <h6 class="error text-bold">{{$errors->first('message')}}</h4>
                                                @endif
                                        </div>
                                        <button class="pl-4 pr-4" id="btnFormSubmit"  style="margin:0 auto;display:block;background-color: rgb(225, 153, 51);color:white;border:none; text-transform:uppercase;">Submit</button>
                                                      
                                        </form>
                                </div>
                        </div>
                </div>
        </div>
</div>



