<?php
include 'header.php';
include 'Functions.php';
$user_id = $_SESSION['user_id'];
$amount=$_REQUEST['amount'];
$billing_id=$_REQUEST['id'];
// if($user_id==""){
//   header("Location: booking-page-form.php?status=Please login firstly.");

// }
?>  
  <!--Contact info-->
<style>
   > input[type="text"],

    > input[type="email"],

    > input[type="password"] {

     

     

      &:invalid:not(:focus):not(:placeholder-shown) {

        // Show a light reminder

        background: pink;

        & + label {

          opacity: 0;

        }

      }

      

     

      &:invalid:focus:not(:placeholder-shown) {

      

        & ~ .requirements {

          max-height: 200px;

          padding: 0 30px 20px 50px;

        }

      }

      

    }

    

   

    .requirements {

      padding: 0 30px 0 50px;

      color: #999;

      max-height: 0;

      transition: 0.28s;

      overflow: hidden;

      color: red;

      font-style: italic;

    }

   body{    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol"!important;

          color: #32325d;}

.field__input{ 

  background-color: transparent;

  border-radius: 0;

     color: #32325d;

    font-weight: 500;

    font-family: Source Code Pro, Consolas, Menlo, monospace;

    font-size: 14px;

    -webkit-font-smoothing: antialiased;

  border: none;



  -webkit-appearance: none;

  -moz-appearance: none;



  font-family: inherit;

  font-size: 1em;

}



.field__input:focus::-webkit-input-placeholder{

  color: var(--uiFieldPlaceholderColor);

  color:#ccc!important;

}



.field__input:focus::-moz-placeholder{

  color: var(--uiFieldPlaceholderColor);

  color:#ccc!important;

  opacity: 1;

}





.a-field{

  display: inline-block;

}



.a-field__input{ 

  display: block;

  box-sizing: border-box;

  width: 100%;

}



.a-field__input:focus{

  outline: none;

}





.a-field{

  --uiFieldHeight: var(--fieldHeight, 34px);  

  --uiFieldBorderWidth: var(--fieldBorderWidth, 2px);

  --uiFieldBorderColor: var(--fieldBorderColor);

  --uiFieldFontSize: var(--fieldFontSize, 1em);

  --uiFieldHintFontSize: var(--fieldHintFontSize, 1em);

  --uiFieldPaddingRight: var(--fieldPaddingRight, 15px);

  --uiFieldPaddingBottom: var(--fieldPaddingBottom, 15px);

  --uiFieldPaddingLeft: var(--fieldPaddingLeft, 0px);  

  --uifieldMarginTop: var(--fieldMarginTop, 5px); 

      color: #cfd7df;

  position: relative;

  width: 100%;

  box-sizing: border-box;

  font-size: var(--uiFieldFontSize);

  padding-top: 20px;  

}



.a-field .a-field__input{

  height: var(--uiFieldHeight);

  padding: 0 var(--uiFieldPaddingRight) 0 var(--uiFieldPaddingLeft);

  border-bottom: var(--uiFieldBorderWidth) solid var(--uiFieldBorderColor);  

}



.a-field .a-field__input::-webkit-input-placeholder{

  opacity: 0;

  //transition: opacity 0s ease-out;

}



.a-field .a-field__input::-moz-placeholder{

  opacity: 0;

  transition: opacity 0s ease-out;

}



.a-field .a-field__input:not(:placeholder-shown) ~ .a-field__label-wrap .a-field__label{

  opacity: 1;

  bottom: calc(51% - -1.4em);

}



.a-field .a-field__input:focus::-webkit-input-placeholder{

  opacity: 1;

  transition-delay: 0.15s;

}



.a-field .a-field__input:focus::-moz-placeholder{

  opacity: 1;

  transition-delay: 0.15s;

}



.a-field .a-field__label-wrap{

  box-sizing: border-box;

  width: 100%;

  height: var(--uiFieldHeight); 

  pointer-events: none;

  cursor: text;

  position: absolute;

  bottom: -7px;

  left: 0;

  font-size:14px;

}



.a-field .a-field__label {

    position: absolute;font-size: 14px;

    left: var(--uiFieldPaddingLeft);

    bottom: calc(50% - .5em);

    line-height: 1;

    font-size: var(--uiFieldHintFontSize);

    pointer-events: none;

    transition-property: color, transform;

    

    transition-timing-function: cubic-bezier(0.165, 0.84, 0.44, 1);

    transition: bottom .1s cubic-bezier(0.9,-0.15, 0.1, 1.15), opacity .1s ease-out;

    will-change: bottom, opacity;

}



.a-field .a-field__input:focus ~ .a-field__label-wrap .a-field__label{

  opacity: 1;

  bottom: var(--uiFieldHeight);

}



.example.example2 .field.half-width {

  width: 50%;

}



.example.example2 .field.quarter-width {

  width: calc(25% - 10px);

}



.example.example2 .baseline {

  position: absolute;

  width: 100%;

  height: 1px;

  left: 0;

  bottom: 0;

  background-color: #cfd7df;

  transition: background-color 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);

}





.example.example2 .input {

  position: absolute;

  width: 100%;

  left: 0;

  bottom: 0;

  padding-bottom: 7px;

  color: #32325d;

  background-color: transparent;

}



.example.example2 .input::-webkit-input-placeholder {

  color: transparent;

  transition: color 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);

}



.example.example2 .input::-moz-placeholder {

  color: transparent;

  transition: color 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);

}



.example.example2 .input:-ms-input-placeholder {

  color: transparent;

  transition: color 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);

}



.example.example2 .input.StripeElement {

  opacity: 0;

  transition: opacity 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);

  will-change: opacity;

}



.example.example2 .input.focused,

.example.example2 .input:not(.empty) {

  opacity: 1;

}



.example.example2 .input.focused::-webkit-input-placeholder,

.example.example2 .input:not(.empty)::-webkit-input-placeholder {

  color: #cfd7df;

}



.example.example2 .input.focused::-moz-placeholder,

.example.example2 .input:not(.empty)::-moz-placeholder {

  color: #cfd7df;

}



.example.example2 .input.focused:-ms-input-placeholder,

.example.example2 .input:not(.empty):-ms-input-placeholder {

  color: #cfd7df;

}



.example.example2 .input.focused + label + .baseline {

  background-color: #24b47e;

}



.example.example2 .input.focused.invalid + label + .baseline {

  background-color: #e25950;

}





.example.example2 input:-webkit-autofill {

  -webkit-text-fill-color: #e39f48;

  transition: background-color 100000000s;

  -webkit-animation: 1ms void-animation-out;

}



.example.example2 .StripeElement--webkit-autofill {

  background: transparent !important;

}





.example.example2 input:active {

  background-color: #15957000;

}



.example.example2 .error svg {

  margin-top: 0 !important;

}



.example.example2 .error svg .base {

  fill: #e25950;

}



.example.example2 .error svg .glyph {

  fill: #fff;

}



.example.example2 .error .message {

  color: #e25950;

}



.example.example2 .success .icon .border {

  stroke: #abe9d2;

}



.example.example2 .success .icon .checkmark {

  stroke: #24b47e;

}



.example.example2 .success .title {

  color: #32325d;

  font-size: 16px !important;

}



.example.example2 .success .message {

  color: #8898aa;

  font-size: 13px !important;

}

.example.example2 .success .reset path {

  fill: #24b47e;

}    
span#myspan {
    color: #fff;
    padding: 5px 7px;
    font-size: 14px;
    height: auto;
    width: auto;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
}  

/******************payment-form css************/
.payment-form {
    max-width: 450px;
    margin: 0 auto;
    border: 1px solid #ddd;
    padding: 20px;
}
.card-img img {
    max-width: 150px;
}
.card-img {
    text-align:center;
	background:#ddd;
	padding:10px;
	margin:10px 0px;
}
/******************css stripe************/
form#payment-form .input-group
{
	display:flex;
}
form#payment-form .input-group label {
    order: 1;
}
form#payment-form .input-group .input {
    order: 2;
    opacity: 1;
    position: relative;
    height: 38px;
    padding: 10px .75rem;
    border: 1px solid #ced4da;
    margin-bottom: 10px;
    width: 100%;
}
form#payment-form button {
    color: #fff;
    background: rgb(233, 6, 22);
    border: none;
    width: 100%;
    padding: 7px;
    margin-top: 10px;
    font-size: 20px;
    font-weight: bold;
    border-radius: 30px;
	outline:none !important;
}
.error.visible {
    text-align: center;
    margin-top: 10px;
}
#stripe-payment-page
{
	padding:50px 0px;
}
</style>
  <section class="contact-info">
      <div class="row no-margin">  
            
  		<div class="col-md-12 no-padding">
           <section class="banner" id="about-box">
				<div class="container">
					<h2>Stripe Payment</h2>
				</div>
			</section>
        </div>  
      </div>
  </section> 
  <!--/Contact info-->

  <!--Contact form-->
  <section class="contact-form" id="stripe-payment-page">
	<div class="container">
      <div class="row">
  		<div class="col-md-12 col-sm-12 no-padding animatedParent">
			<div class="payment-form">

		<h2 class="text-center">Payment</h2>
		<div class="card-img"><img src="images/cards.png" alt="cards"></div>
		<div class=" cell example example2" id="example-2">

			<form role="form" id="payment-form" action="charge.php?user_id=<?php echo $user_id;?>&amp;amount=<?php echo $amount;?>&id=<?php echo $billing_id;?>" method="post">

			<div class="form-group">

				<label for="firstname">First Name</label>

				<input type="text" class="form-control" name="firstname" id="example2-firstname" placeholder="" required="">

			</div>

			<div class="form-group">

				<label for="lastname">Last name</label>

				<input type="text" class="form-control" name="lastname" id="example2-lastname" placeholder="" required="">

			</div> <!-- form-group.// -->

			

			<div id="card-element">

			

				<div class="input-group">

					

						<div id="example2-card-number" class="input empty StripeElement"><div class="__PrivateStripeElement" style="margin: 0px !important; padding: 0px !important; border: none !important; display: block !important; background: transparent !important; position: relative !important; opacity: 1 !important;"><iframe frameborder="0" allowtransparency="true" scrolling="no" name="__privateStripeFrame5" allowpaymentrequest="true" src="https://js.stripe.com/v3/elements-inner-card-1fc23f9347df058ee8f7c8e5edaf73f0.html#style[base][color]=%2332325D&amp;style[base][fontWeight]=500&amp;style[base][fontFamily]=Source+Code+Pro%2C+Consolas%2C+Menlo%2C+monospace&amp;style[base][fontSize]=16px&amp;style[base][fontSmoothing]=antialiased&amp;style[base][::placeholder][color]=%23CFD7DF&amp;style[base][:-webkit-autofill][color]=%23e39f48&amp;style[invalid][color]=%23E25950&amp;style[invalid][::placeholder][color]=%23FFCCA5&amp;componentName=cardNumber&amp;wait=true&amp;rtl=false&amp;keyMode=test&amp;apiKey=pk_test_ty6PDGQUFAbxzU7XtHOoeTT100rqDxmJlm&amp;origin=https%3A%2F%2Fwww.dharmani.com&amp;referrer=https%3A%2F%2Fwww.dharmani.com%2FFahrschule%2FWebsite%2Fform.php%3Fplan%3Dmonthly&amp;controllerId=__privateStripeController1" title="Secure payment input frame" style="border: none !important; margin: 0px !important; padding: 0px !important; width: 1px !important; min-width: 100% !important; overflow: hidden !important; display: block !important; user-select: none !important; height: 19.2px;"></iframe><input class="__PrivateStripeElement-input" aria-hidden="true" aria-label=" " autocomplete="false" maxlength="1" style="border: none !important; display: block !important; position: absolute !important; height: 1px !important; top: 0px !important; left: 0px !important; padding: 0px !important; margin: 0px !important; width: 100% !important; opacity: 0 !important; background: transparent !important; pointer-events: none !important; font-size: 16px !important;"></div></div>

						<label for="example2-card-number" data-tid="elements_examples.form.card_number_label">Card Number</label>

				   

				</div>



				<!--<div class="form-group">

				 	<label for="cardNumber">Card number</label>

						<div class="input-group">

							<input type="text" class="form-control" name="cardNumber" placeholder="">

							<div class="input-group-append">

								<span class="input-group-text text-muted">

									<i class="fab fa-cc-visa"></i> &nbsp; <i class="fab fa-cc-amex"></i> &nbsp; 

									<i class="fab fa-cc-mastercard"></i> 

								</span>

							</div>

						</div> 

					</div> --> <!-- form-group.// -->

				<div class="input-group">

					

						<div id="example2-card-expiry" class="input empty StripeElement"><div class="__PrivateStripeElement" style="margin: 0px !important; padding: 0px !important; border: none !important; display: block !important; background: transparent !important; position: relative !important; opacity: 1 !important;"><iframe frameborder="0" allowtransparency="true" scrolling="no" name="__privateStripeFrame6" allowpaymentrequest="true" src="https://js.stripe.com/v3/elements-inner-card-1fc23f9347df058ee8f7c8e5edaf73f0.html#style[base][color]=%2332325D&amp;style[base][fontWeight]=500&amp;style[base][fontFamily]=Source+Code+Pro%2C+Consolas%2C+Menlo%2C+monospace&amp;style[base][fontSize]=16px&amp;style[base][fontSmoothing]=antialiased&amp;style[base][::placeholder][color]=%23CFD7DF&amp;style[base][:-webkit-autofill][color]=%23e39f48&amp;style[invalid][color]=%23E25950&amp;style[invalid][::placeholder][color]=%23FFCCA5&amp;componentName=cardExpiry&amp;wait=true&amp;rtl=false&amp;keyMode=test&amp;apiKey=pk_test_ty6PDGQUFAbxzU7XtHOoeTT100rqDxmJlm&amp;origin=https%3A%2F%2Fwww.dharmani.com&amp;referrer=https%3A%2F%2Fwww.dharmani.com%2FFahrschule%2FWebsite%2Fform.php%3Fplan%3Dmonthly&amp;controllerId=__privateStripeController1" title="Secure payment input frame" style="border: none !important; margin: 0px !important; padding: 0px !important; width: 1px !important; min-width: 100% !important; overflow: hidden !important; display: block !important; user-select: none !important; height: 19.2px;"></iframe><input class="__PrivateStripeElement-input" aria-hidden="true" aria-label=" " autocomplete="false" maxlength="1" style="border: none !important; display: block !important; position: absolute !important; height: 1px !important; top: 0px !important; left: 0px !important; padding: 0px !important; margin: 0px !important; width: 100% !important; opacity: 0 !important; background: transparent !important; pointer-events: none !important; font-size: 16px !important;"></div></div>

						<label for="example2-card-expiry" data-tid="elements_examples.form.card_expiry_label">Expiration</label>

					</div>

				</div>

				<div class="input-group">

				

						<div id="example2-card-cvc" class="input empty StripeElement"><div class="__PrivateStripeElement" style="margin: 0px !important; padding: 0px !important; border: none !important; display: block !important; background: transparent !important; position: relative !important; opacity: 1 !important;"><iframe frameborder="0" allowtransparency="true" scrolling="no" name="__privateStripeFrame7" allowpaymentrequest="true" src="https://js.stripe.com/v3/elements-inner-card-1fc23f9347df058ee8f7c8e5edaf73f0.html#style[base][color]=%2332325D&amp;style[base][fontWeight]=500&amp;style[base][fontFamily]=Source+Code+Pro%2C+Consolas%2C+Menlo%2C+monospace&amp;style[base][fontSize]=16px&amp;style[base][fontSmoothing]=antialiased&amp;style[base][::placeholder][color]=%23CFD7DF&amp;style[base][:-webkit-autofill][color]=%23e39f48&amp;style[invalid][color]=%23E25950&amp;style[invalid][::placeholder][color]=%23FFCCA5&amp;componentName=cardCvc&amp;wait=true&amp;rtl=false&amp;keyMode=test&amp;apiKey=pk_test_ty6PDGQUFAbxzU7XtHOoeTT100rqDxmJlm&amp;origin=https%3A%2F%2Fwww.dharmani.com&amp;referrer=https%3A%2F%2Fwww.dharmani.com%2FFahrschule%2FWebsite%2Fform.php%3Fplan%3Dmonthly&amp;controllerId=__privateStripeController1" title="Secure payment input frame" style="border: none !important; margin: 0px !important; padding: 0px !important; width: 1px !important; min-width: 100% !important; overflow: hidden !important; display: block !important; user-select: none !important; height: 19.2px;"></iframe><input class="__PrivateStripeElement-input" aria-hidden="true" aria-label=" " autocomplete="false" maxlength="1" style="border: none !important; display: block !important; position: absolute !important; height: 1px !important; top: 0px !important; left: 0px !important; padding: 0px !important; margin: 0px !important; width: 100% !important; opacity: 0 !important; background: transparent !important; pointer-events: none !important; font-size: 16px !important;"></div></div>

						<label for="example2-card-cvc" data-tid="elements_examples.form.card_cvc_label">CVC</label>

					

				</div>



				<button name="payment_button" type="submit" data-tid="elements_examples.form.pay_button">Pay CHF <?php echo $amount;?></button>

        <a name="reset" class="reset" style="display: none;">Reset</a>

		        <div class="error" role="alert">

		            <span class="message"></span>

		        </div>

		    </form></div>

			

		</div>
        </div>
        </div>
      </div>
  </section> 
  <!--Contact form-->
       
</div>

<?php include 'footer.php';?>
<script src="https://js.stripe.com/v3/"></script>
<script src="js/index.js"></script>
<script type="text/javascript">
jQuery(".cate li").click(function(){
    jQuery(this).addClass("active").siblings().removeClass("active");
});

$('#email').click(function(){
	$('#error').css('display','none');
})

$('#firstname').keypress(function (e) {
    //var regex = new RegExp("^[a-zA-Z]+$");
    var regex = new RegExp("^[a-zA-Z ]*$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    else
    {
    e.preventDefault();
    alert('Please Enter Alphabate');
    return false;
    }
});
//Validate last name as charcater
$('#lastname').keypress(function (e) {
    //var regex = new RegExp("^[a-zA-Z]+$");
    var regex = new RegExp("^[a-zA-Z ]*$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    else
    {
    e.preventDefault();
    alert('Please Enter Alphabate');
    return false;
    }
});
$(document).ready(function(){
	var user_id = $('#user_id').val();
    if(user_id)
    {
	    $.ajax({
	        url : 'GetPhpData.php',
	        type: "POST",
	        data: {user_id:user_id,type:'get_user_detail'},
	        dataType: "JSON",
	        success: function(data)
	        {
	        	console.log(data);
	            if(data.status==1)
	            {
	            	$('#first_form').css('display','none');
	            	$('#user_email').val(data.data.email);
	            	$('#email').val(data.data.email);
	            	$('#user_password').val(data.data.password);
	            	$('#login_button').addClass('adddisable');

	            	$('#signup').val('0');
			    	$('#user_id').val(data.data.user_id);
			    	$('#password').val(data.data.password);
			    	$("#email").prop("disabled", true);
			    	$("#password").prop("disabled", true);
			    	$("#user_email").prop("disabled", true);
			    	$("#user_password").prop("disabled", true);
	            }
	        },
	        error: function (jqXHR, textStatus, errorThrown)
	        {
	        	alert(errorThrown);
	         // window.location.href = 'login.php';
	        }
	    });
    }

	var course_id = sessionStorage.getItem("final_course_id");
	$('#course_id').val(course_id);
	
	
	$.ajax({
		url : 'GetPhpData.php',
		type: "POST",
		data: {course_id:course_id,type:'review'},
		dataType: "JSON",
		success: function(data)
		{
		    if(data.status==1)
		    {
				$('tbody#courses').html('');
				$('td#total_amount, td#subtotal').html('');
			
				$("td#subtotal").append('CHF '+data.total_price);
				$("td#total_amount").append('<b>CHF '+data.total_price+'</b>');
				$('#total_price').val(data.total_price);

		    	$.each(data.data, function(key, value) {
		    		$('tbody#courses').append('<tr><td>'+value.course_detail+' | '+value.c_date+' @ '+value.c_time+'-'+value.c_end_time+' | '+value.place+'  × 1</td><td>CHF '+value.price+'</td></tr>');
		    	});
		    }
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
		  window.location.href = 'registration-form.php';
		}
	});
});

function submitHandler(){
	var filter = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
	var signupvalue = $('#signup').val();
	var email = $('#email').val();
	var phone = $('#phone').val();
	if(signupvalue=='1')
	{
		$.ajax({
			url : 'GetPhpData.php',
			type: "POST",
			data: {email:email,type:'check_user'},
			dataType: "JSON",
			success: function(data)
			{
			    if(data.status==1)
			    {
			    	$('#email').val('');	
			    	$('#error').css('color','red');
			    	$('#error').text(data.message);
			    	return false;
			    }
			    else
			    {
			    	if(!phone.match(filter))
				    {
				    	alert('Please enter Valid 10 Digit Phone Number');
				    	$('#phone').focus(); 
				    }
				    else 
				    {
			    		$("#booking-form").unbind('submit').submit();
			    	}
			    }
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
			  alert(textStatus);
			}
		});
		return false;//This will prevent the form to submit
	}
	else
	{
		if(!phone.match(filter))
	    {
	    	alert('Please enter Valid 10 Digit Phone Number');
	    	$('#phone').focus(); 
	    	return false;
	    }
	    else 
	    {
    		$("#booking-form").unbind('submit').submit();
    	}
	}
};

$("#booking-form").submit(submitHandler);

$('#login_form').submit(function(e){
    e.preventDefault();
	$.ajax({
		url : 'GetPhpData.php',
		type: "POST",
		data: $('#login_form').serialize(),
		dataType: "JSON",
		success: function(data)
		{
			alert(data.message);
		    if(data.status==1)
		    {
		    	$('#signup').val('0');
		    	$('#email').val(data.data.email);
		    	$('#user_id').val(data.data.user_id);
		    	$('#password').val(data.data.password);
		    	$("#email").prop("disabled", true);
		    	$("#password").prop("disabled", true);
		    	$(".sign-in-pop").toggle();
		    }
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
		  alert(textStatus);
		}
	});
});


/***********booking form js*******/
$("input.sel-radio:radio").click(function() {
	
    if (this.checked) {
    	if(this.value=='cash')
		{
			var check = 'bar';
			var notcheck = 'twint';
		}
		else
		{
			var check = 'twint';
			var notcheck = 'bar';
		}
        $('.'+check).addClass('active');
        $('.'+notcheck).removeClass('active');
    }
});

$(".open-sign").click(function(){
	$(".sign-in-pop").toggle();
});
$(".open-voucher").click(function(){
	$(".voucher").toggle();
});

</script>

<!-----stripe js------------------------>
<script>


	$("button.signout").click(function(){

		$(".user-dropdown").toggle();

	});

  $("#coupon").click(function(){

    $('#coupon_applied').css("display", "none");
    $('#invalid_coupon').css("display", "none");

  });
  
  $("#myspan").click(function(){
    var coupon = $('#coupon').val();
    if(coupon=='')
    {
      alert('Please Enter Promo Code');
      $('#coupon').focus();
    }
    else
    {
      $.ajax({
        url : 'CheckCoupon.php',
        type: "POST",
        data: {coupon:coupon},
        dataType: "JSON",

        success: function(data)
        {
            console.log(data);
            if(data.status==1)
            {
              $('#coupon_applied').css("display", "block");
              $("#coupon_applied").text(data.message);
              $("#coupon").prop('disabled', true);
            }
          
            if(data.status==0) 
            {
              $('#invalid_coupon').css("display", "block");
              $("#invalid_coupon").text(data.message);
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Failed to apply promo code');
        }
      });
    }
  });

</script>

<script>
  $("button.signout").click(function(){
	$(".user-dropdown").toggle();
  });
  $(document).ready(function() {

  //Validate first name as charcater

   $('#example2-firstname').keypress(function (e) {

        //var regex = new RegExp("^[a-zA-Z]+$");

        var regex = new RegExp("^[a-zA-Z ]*$");

        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

        if (regex.test(str)) {

            return true;

        }

        else

        {

        e.preventDefault();

        alert('Please Enter Alphabate');

        return false;

        }

    });

   //Validate last name as charcater

   $('#example2-lastname').keypress(function (e) {

        //var regex = new RegExp("^[a-zA-Z]+$");

        var regex = new RegExp("^[a-zA-Z ]*$");

        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);

        if (regex.test(str)) {

            return true;

        }

        else

        {

        e.preventDefault();

        alert('Please Enter Alphabate');

        return false;

        }

    });

  });



  (function() {

  'use strict';



  var elements = stripe.elements({

    fonts: [

      {

        cssSrc: 'https://fonts.googleapis.com/css?family=Source+Code+Pro',

      },

    ],

    // Stripe's examples are localized to specific languages, but if

    // you wish to have Elements automatically detect your user's locale,

    // use `locale: 'auto'` instead.

    locale: window.__exampleLocale

  });



  // Floating labels

  var inputs = document.querySelectorAll('.cell.example.example2 .input');

  Array.prototype.forEach.call(inputs, function(input) {

    input.addEventListener('focus', function() {

      input.classList.add('focused');

    });

    input.addEventListener('blur', function() {

      input.classList.remove('focused');

    });

    input.addEventListener('keyup', function() {

      if (input.value.length === 0) {

        input.classList.add('empty');

      } else {

        input.classList.remove('empty');

      }

    });

  });



  var elementStyles = {

    base: {

      color: '#32325D',

      fontWeight: 500,

      fontFamily: 'Source Code Pro, Consolas, Menlo, monospace',

      fontSize: '16px',

      fontSmoothing: 'antialiased',



      '::placeholder': {

        color: '#CFD7DF',

      },

      ':-webkit-autofill': {

        color: '#e39f48',

      },

    },

    invalid: {

      color: '#E25950',



      '::placeholder': {

        color: '#FFCCA5',

      },

    },

  };



  var elementClasses = {

    focus: 'focused',

    empty: 'empty',

    invalid: 'invalid',

  };



  var cardNumber = elements.create('cardNumber', {

    style: elementStyles,

    classes: elementClasses,

  });



  cardNumber.mount('#example2-card-number');





  var cardExpiry = elements.create('cardExpiry', {

    style: elementStyles,

    classes: elementClasses,

  });

  cardExpiry.mount('#example2-card-expiry');



  var cardCvc = elements.create('cardCvc', {

    style: elementStyles,

    classes: elementClasses,

  });

  cardCvc.mount('#example2-card-cvc');



  registerElements([cardNumber, cardExpiry, cardCvc], 'example2');

})();
</script>