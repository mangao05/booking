$(document).ready(function(){

    $.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z]+$/i.test(value);
      }, "Letters only please"); 

    $('#bookingForm').validate({
        rules:{
            fname:{
                required:true,
                lettersonly:true
            },
            lname:{
                required:true,
                lettersonly:true
            },
            contact:{
                required:true,
                digits:true,
                minlength:11,
                maxlength:11
            },
            email:{
                required:true,
                email:true
            },
            conEmail:{
                required:true,
                equalTo: "#email"
            }
        }
    });
    
});