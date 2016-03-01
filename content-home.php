<?php /*
	   *
	   * HOMEPAGE WIDGETS 
	   *
	   */ ?>

				<?php 
				//-------------------------------------
				// ------- Western States Trail -------
				//------------------------------------- ?>
				<div id="google-tracker" class="hm-features hm-features__google">

					<h2>Project Western States Trail</h2>
					<p>The Google Tracker project and ATRA are taking you along for the experience of a lifetime. View updates, photos and videos while they happen along the Western States trail.</p>
					<p><a href="<?php echo home_url(); ?>/project/" class="btn">Join the experience!</a></p>

				</div> <?php // end #google-tracker .hm-features .hm-features__google ?>

				<?php 
				//------------------------------------------
				// ------------ Newsletter Form ------------
				//------------------------------------------ ?>
				<div id="newsletter" class="hm-features hm-features__newsletter">
					
			       <span id="success_message" style="display:none;">
			           <div style="text-align:center;">Thanks for signing up!</div>
			       </span>
			       <form data-id="embedded_signup:form" class="ctct-custom-form Form" name="embedded_signup" method="POST" action="https://visitor2.constantcontact.com/api/signup">
			           <h2>Sign up to stay in touch with ATRA!</h2>
			           <p>You’ll receive interesting news with special offers delivered to your inbox once a month!</p>
			           <?php // The following code must be included to ensure your sign-up form works properly. ?>
			           <input data-id="ca:input" type="hidden" name="ca" value="2589cc0d-7ae3-44ac-8e19-68104d80e97e">
			           <input data-id="list:input" type="hidden" name="list" value="1968659447">
			           <input data-id="source:input" type="hidden" name="source" value="EFD">
			           <input data-id="required:input" type="hidden" name="required" value="list,email">
			           <input data-id="url:input" type="hidden" name="url" value="">
			           <p data-id="First Name:p" class="first-name"><label data-id="First Name:label" data-name="first_name">First Name</label> <input data-id="First Name:input" type="text" name="first_name" value="" placeholder="First Name" maxlength="50"></p>
			           <p data-id="Last Name:p" class="last-name"><label data-id="Last Name:label" data-name="last_name">Last Name</label> <input data-id="Last Name:input" type="text" name="last_name" value="" placeholder="Last Name" maxlength="50"></p>
			           <p data-id="Email Address:p" ><label data-id="Email Address:label" data-name="email" class="ctct-form-required">Email Address</label> <input data-id="Email Address:input" type="text" name="email" value="" placeholder="Email Address" maxlength="80"></p>
			           <button type="submit" class="btn" data-enabled="enabled">Sign Up</button>
					   <p class="small">By submitting this form, you are granting: American Trail Running Assoc., PO Box 9454, Colorado Springs, Colorado, 80932, United States, http://www.trailrunner.com permission to email you. You may unsubscribe via the link found at the bottom of every email.  (See our <a href="http://www.constantcontact.com/legal/privacy-statement" target="_blank">Email Privacy Policy</a> for details.) Emails are serviced by Constant Contact.</p>
			       </form>
					<script type='text/javascript'>
						var localizedErrMap = {};
						localizedErrMap['required'] = 		'This field is required.';
						localizedErrMap['ca'] = 			'An unexpected error occurred while attempting to send email.';
						localizedErrMap['email'] = 			'Please enter your email address in name@email.com format.';
						localizedErrMap['birthday'] = 		'Please enter birthday in MM/DD format.';
						localizedErrMap['anniversary'] = 	'Please enter anniversary in MM/DD/YYYY format.';
						localizedErrMap['custom_date'] = 	'Please enter this date in MM/DD/YYYY format.';
						localizedErrMap['list'] = 			'Please select at least one email list.';
						localizedErrMap['generic'] = 		'This field is invalid.';
						localizedErrMap['shared'] = 		'Sorry, we could not complete your sign-up. Please contact us to resolve this.';
						localizedErrMap['state_mismatch'] = 'Mismatched State/Province and Country.';
						localizedErrMap['state_province'] = 'Select a state/province';
						localizedErrMap['selectcountry'] = 	'Select a country';
						var postURL = 'https://visitor2.constantcontact.com/api/signup';
					</script>
					<script type='text/javascript' src='https://static.ctctcdn.com/h/contacts-embedded-signup-assets/1.0.2/js/signup-form.js'></script>
				</div> <?php // end #newsletter .hm-features .hm-features__newsletter ?>