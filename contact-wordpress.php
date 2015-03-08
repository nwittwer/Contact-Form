<?php get_header(); ?>

<!-- 
	Contact Form by Nick Wittwer
	This code relies on WordPress, jQuery, PHP, and Ajax. 
	To use this out of the box, just edit the URL section of the Ajax call (line 41) and upload it to your server

	// Lines you need to change: 50 
    // If you added/changed variables, also edit lines 18-20, 54, 62-64
-->

<script>
function sendEmail(){
	
	// variables from the form
	// * add new variables if you want!

		var email = document.getElementById('email').value;
		var name = document.getElementById('name').value;
		var message = document.getElementById('message').value;


	// basic check for empty inputs

		if (name == "" ) 
		{
		   alert("Sorry, we didn't catch your name?")
		   document.myForm.name.focus() ;
		   return false;
		}

		if (email == "" ) 
	    {
	       alert("How can we email you?")
	       document.myForm.email.focus() ;
	       return false;
	    }
		   
		if (message == "" ) 
		{
		   alert("What did you want to say?")
		   document.myForm.message.focus() ;
		   return false;
		}
   	
	// AJAX call to the PHP file which will send the results

		$.ajax({
		    
		    url: '../wp-content/themes/THEMENAME/send-form.php', // change THEMENAME to the name of your theme 
		    
		    type: 'post',
		    
		    data: { "email":email, "name":name, "message":message}, // add your new variable(s) here
		    
		    
		    success: function(response) {
		    		
		    		// get the information from the inputs in the form
		    		// if you added new variables, add them here as well!

			    		document.getElementById('email').value = "";
			    		document.getElementById('name').value = "";
			    		document.getElementById('message').value = "";
		
					// send that shit!
					// this will hide your form and show the success message
					// modify this if you don't want to use jQuery

						$("#myForm").addClass("message-sent");
						$("#success").show();
						$("#myForm").fadeOut('medium'); // hide the form
			
		    } 
		});	//finish ajax

} // end sendEmail function

</script>




<!-- Start the contact HTML (what the user will see) -->

	<div id="success"><!-- Hidden on load, shown when form is submitted thanks to jQuery -->
		  <span>
		    <p>Your message was sent successfully! We'll be in touch soon.</p>
		  </span>
	</div>


	<!-- The form! -->
	<!-- If you change the name/id, make sure to find/replace it throughout the form -->	
	<form name="myForm" id="myForm" action="javascript:sendEmail();" class="animated fadeIn">
		<label>Your Name</label>
		<input type="name" id="name" />
		<label>Your Email</label>
		<input type="email" id="email" />
		<label>How can we help you?</label>
		<textarea type="text" id="message" cols="10" rows="7"></textarea>
		<input type="submit" class="btn btn-alt"></input>
	</form>
	 

	<!-- 	

	For Foundation users, just uncomment this section for some basic styling
	Select the code and press CMD/CNTRl + / 
	For everyone else, just delete lines 104-131
	
	
	<div class="row">
		<div class="large-8 large-centered medium-8 medium-centered columns">	
			<div id="success">
				  <span>
				    <p>Your message was sent successfully! We'll be in touch soon.</p>
				  </span>
			</div>
			
			<form name="myForm" id="myForm" action="javascript:sendEmail();" class="animated fadeIn">
				<label>Your Name</label>
				<input type="name" id="name" />
				<label>Your Email</label>
				<input type="email" id="email" />
				<label>How can we help you?</label>
				<textarea type="text" id="message" cols="10" rows="7"></textarea>
				<input type="submit" class="btn btn-alt"></input>
			</form>
		</div>
	</div> 

	-->


	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


<?php get_footer(); ?>