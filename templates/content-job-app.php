 <?php if (!isset($_GET['check'])) { ?>
 <?php if (isset($_GET['ref'])) {$urlref = $_GET['ref']; } else {$urlref = "n-a";} ?>
 
 <form action="?check&ref=<?php echo $urlref ; ?>" method="POST" enctype="multipart/form-data">
						<fieldset class=" labels-top">
							<?php
								if ($_GET['ref']){ $myref = $_GET['ref']; if ($_GET['jb']){$myjb = $_GET['jb'];} ?>
									<div class="alert alert-success">
										<p>Position: <strong><?php echo $myjb; ?></strong>.  Ref: <strong><?php echo $myref; ?></strong><br />Wrong position?  <a href="<?php echo GET_OPTION('home'); ?>/security-jobs" class="btn btn-success btn-xs">Choose again</a></p>
									</div>
								<?php } else { ?>
										<div class="alert alert-success">
											<p>You will need a <strong>job title</strong> and <strong>reference</strong> to complete this form; please choose a position from our <a href="<?php echo GET_OPTION('home'); ?>/security-jobs">online job listings page</a>.</p>
										</div>


								<?php	} ?>
							<p></p>
							<p>Please complete this form:</p>
							
							<div class="row formsection"><div class="col-lg-12">
                           <p><strong>1. PERSONAL INFORMATION</strong></p>
                                                    			
										<div class="col-lg-6 col-md-6 col-sm-6">
											<label for="first-name"><sup>* </sup>First Name</label>
											<input id="first-name" name="first-name" type="text" class="text" />
											<label for="middle-name">Middle Name</label>
											<input id="middle-name" name="middle-name" type="text" class="text" />
									    <label for="surname"><sup>* </sup>Surname</label>
											<input id="surname" name="surname" type="text" class="text" />
		                                    <label for="email"><sup>* </sup>Email Address</label>
											<input id="email" name="email" type="text" class="text" />
		                                 
		                                       
										</div>
										
										<div class="col-lg-6 col-md-6 col-sm-6">
											<label for="address"><sup>* </sup>Street Address</label>
											<input id="address" name="address" type="text" class="text" />
		                                    <label for="address"><sup>* </sup>City, Postcode</label>
											<input id="city" name="city" type="text" class="text" />
		                                    <label for="phone"><sup>* </sup>Phone Number / Mobile</label>
											<input id="phone" name="phone" type="text" class="text" />
		                                    
										</div>
								</div> <!-- /col-lg-12 -->	
							</div><!-- /.row -->
                                <div class="clear"><br />
                                 <label for="ukeligible"><sup>* </sup>Are you eligible to work in the UK?</label>
								  
									    <input type="radio" name="ukeligible" value="uk_yes" id="ukeligible_0" />yes
									    <input type="radio" name="ukeligible" value="uk_no" id="ukeligible_1" />no
                                      <!--  removed by VF oct 2010-->
                                      <!--  <label for="pport"><sup>* </sup>Passport Number.</label>
									<input id="pport" name="pport" type="text" class="text" />
                                    <label for="ppexpires"><sup>* </sup>Expiry Date.</label>
									<input id="ppexpires" name="ppexpires" type="text" class="text" />-->
                                     <label for="visa"><sup>* </sup>What working restrictions do you have? </label>
									<textarea id="visa_restriction" name="visa_restriction" cols="50" rows="2"></textarea>
                                    
                                     <label for="caution"><sup>* </sup>Have you been convicted or cautioned with a criminal offence within the last 5 years? </label>
									 <input type="radio" name="caution" value="caution_0" id="caution_0" />yes
									 <input type="radio" name="caution" value="caution_1" id="caution_1" />no
									   
                                       <label for="caution_yes"><sup>*</sup>If yes, please explain: </label>
									<textarea id="caution_yes" name="caution_yes" cols="50" rows="3"></textarea>
                                     <label for="fileatt">Upload Your CV: </label>
                                    <input type="file" name="fileatt" />
                                    </div>
							<hr />
							<div class="formsection">

                             <p><strong>2. Position / Availability</strong></p>
                             
                             <label for="job"><sup>* </sup>Position Applied For</label>
									<input id="job" name="job" type="text" class="text" value="<?php if (isset($_GET['jb'])) {$apply = $_GET['jb']; echo $apply;} ?>" />
                                      <label for="jobref">Job Reference (CIS only)</label>
                                      <input id="jobref" name="jobref" type="text" class="text" value="<?php if (isset($_GET['ref'])) {$apply2 = $_GET['ref']; echo $apply2;} else {echo "N/A";} ?>" readonly="readonly" />
                                    <label for="days"><sup>* </sup>Days/Hours Available (Mon-Sun) </label>
									<textarea id="days" name="days" cols="50" rows="3"></textarea>
                                    <p>Hours Available:</p>
                                    <label for="days_nights"><sup>* </sup>Days &amp; Nights:</label>
									 <input type="radio" name="days_nights" value="dn0" id="days_nights_0" />yes
									 <input type="radio" name="days_nights" value="dn1" id="days_nights_1" />no
                                       <label for="days_only"><sup>* </sup>Days Only:</label>
									 <input type="radio" name="days_only" value="days0" id="days_only_0" />yes
									 <input type="radio" name="days_only" value="days1" id="days_only_1" />no
                                     <label for="nights_only"><sup>* </sup>Nights Only:</label>
									 <input type="radio" name="nights_only" value="n0" id="nights_only_0" />yes
									 <input type="radio" name="nights_only" value="n1" id="nights_only_1" />no
                                 
                                 <label for="date_avail"><sup>* </sup>What date are you available to start work? </label>
									<input id="date_avail" name="date_avail" type="text" class="text" />
                                    
							<label for="skills">Skills and Qualifications: Licenses, Skills, Training, Awards</label>
							<textarea id="skills" name="skills" cols="50" rows="4"></textarea>
                            
                            <label for="sia"><sup>* </sup>SIA Licence No./ Application No.  </label>
									<input id="sia" name="sia" type="text" class="text" />
							</div>
							<hr />
                            <div class="formsection">
                             <p><strong>3. Employment History</strong></p>
                             Present Or Last Position:
                               <label for="employer"><sup>* </sup>Employer</label>
									<input id="employer" name="employer" type="text" class="text" />
                             <label for="emp_address">Address.</label>
							<textarea id="emp_address" name="emp_address" cols="50" rows="5"></textarea>
                              <label for="supervisor"><sup>* </sup>Your Supervisor</label>
									<input id="supervisor" name="supervisor" type="text" class="text" />
                                     <label for="emp_phone"><sup>* </sup>Phone</label>
									<input id="emp_phone" name="emp_phone" type="text" class="text" />
                                     <label for="emp_fax"><sup>* </sup>Fax</label>
									<input id="emp_fax" name="emp_fax" type="text" class="text" />
                                     <label for="emp_email"><sup>* </sup>Email</label>
									<input id="emp_email" name="emp_email" type="text" class="text" />
                                    <label for="emp_title"><sup>* </sup>Position Title</label>
									<input id="emp_title" name="emp_title" type="text" class="text" />
                                    <label for="emp_from"><sup>* </sup>From - To</label>
									<input id="emp_from" name="emp_from" type="text" class="text" />
							
							</div>
                           
                            
							<div class="submit">
                             <label for="answer"><strong>So that we know you're human, please answer the following question</strong><br /><sup>* </sup>What is 1 + 1? (enter number below)</label>
									<input id="answer" name="answer" type="text" class="text" />
                           <p><br /> 
                           	 	<div class="alert alert-success">Please ensure that you have completed all the required fields.</p></div>
									<input id="submit" name="submit" type="submit" class="btn btn-default btn-lg" alt="Submit" value="Send" />
							</div>
						</fieldset>
					</form>
                    
                    <?php } else { ?>
					
              <?php // check if for is ok to send
			  $errors = 0;
			  if (!$_POST['first-name']) {$forminvalid = true; $errors ++;}
			  if (!$_POST['surname']) {$forminvalid = true; $errors ++;}
			   if (!$_POST['email']) {$forminvalid = true; $errors ++;}
			  if (!$_POST['address']) {$forminvalid = true; $errors ++;}
			  if (!$_POST['city']) {$forminvalid = true; $errors ++;}
			  if (!$_POST['phone']) {$forminvalid = true; $errors ++;}
			  if (!$_POST['ukeligible']) {$forminvalid = true; $errors ++;}
		// oct 2010	   if (!$_POST['pport']) {$forminvalid = true; $errors ++;}
		//	oct 2010   if (!$_POST['ppexpires']) {$forminvalid = true; $errors ++;}
			    if ($_POST['ukeligible'] == "uk_no" ) {if (!$_POST['visa_restriction']) {$forminvalid = true;} } 
			if (!$_POST['caution']) {$forminvalid = true; $errors ++;}
			  if ($_POST['caution'] == "caution_0") { if (!$_POST['caution_yes']) {$forminvalid = true;}}
				  if (!$_POST['job']) {$forminvalid = true; $errors ++;}
				  if (!$_POST['days']) {$forminvalid = true; $errors ++;}
				  if (!$_POST['days_nights']) {$forminvalid = true; $errors ++;}
	//			  	  if (!$_POST['days_only']) {$forminvalid = true; $errors ++;}
//				  if (!$_POST['nights_only']) {$forminvalid = true; $errors ++;}
					  if (!$_POST['job']) {$forminvalid = true; $errors ++;}
					    if (!$_POST['date_avail']) {$forminvalid = true; $errors ++;}
					  if (!$_POST['skills']) {$forminvalid = true; $errors ++;}
						    if (!$_POST['sia']) {$forminvalid = true; $errors ++;}
				    if (!$_POST['employer']) {$forminvalid = true; $errors ++;}
					 if (!$_POST['supervisor']) {$forminvalid = true; $errors ++;}
					  if (!$_POST['emp_phone']) {$forminvalid = true; $errors ++;}
					  if (!$_POST['emp_fax']) {$forminvalid = true; $errors ++;}
					  if (!$_POST['emp_email']) {$forminvalid = true; $errors ++;}
					  if (!$_POST['emp_title']) {$forminvalid = true; $errors ++;}
					  if (!$_POST['emp_from']) {$forminvalid = true; $errors ++;}
					  if (!$_POST['answer'] or $_POST['answer'] != "2") {$forminvalid = true; $errors ++;}
					 
			if ($forminvalid != true) { //send it


		// send email if form is ok...
		// SET FORM FIELD VALUES TO VARIABLES
		$firstname = $_POST['first-name'];
		$middlename = $_POST["middle-name"];
		$surname = $_POST["surname"];
		$email = $_POST["email"];
		$address = $_POST["address"];
		$phone = $_POST["phone"];
		 if  ($_POST["ukeligible"] == "uk_no" ){$ukel = 'no' ;} else {$ukel = 'yes' ;}
	//	$ppor = $_POST["pport"];
	//	$ppex = $_POST["ppexpires"];
		 if (!$_POST["visa_restriction"]) {$visa = 'not applicable';} else {$visa = $_POST["visa_restriction"];}
		if ($_POST["caution"] == 'caution_0' ) {$caution = 'yes' ;} else {$caution = 'no' ;}
		 if (!$_POST["caution_yes"]) {$caution_y = 'not applicable';} else {$caution_y = $_POST["caution_yes"];}
		$position = $_POST["job"];
		$days = $_POST["days"];		
			
		if ($_POST["days_nights"] == 'dn1' ) {$daysnights = 'no' ;}else{$daysnights = 'yes' ;}
		if ($_POST["days_nights"] == 'dn0' ) {$daysonly = "not applicable"; $nightsonly = "not applicable"; } else {
		if ($_POST["days_only"] == 'days1' ) {$daysonly = 'no' ;}else{$daysonly = 'yes' ;}
		if ($_POST["nights_only"] == 'n1' ) {$nightsonly = 'no' ;}else{$nightsonly= 'yes' ;} }
		$avail = $_POST["date_avail"];
		$skills = $_POST["skills"];
		$sia = $_POST["sia"];
		$lastemp = $_POST["employer"];
		$empadd = $_POST["emp_address"];
		$emptel = $_POST["emp_phone"];
		$empemail = $_POST["emp_email"];
		$empfax = $_POST["emp_fax"];
		$empsup = $_POST["supervisor"];
		$emptitle = $_POST["emp_title"];
		$empfrom = $_POST["emp_from"];
		$year = date(Y);
		$thisjobref = $_POST["jobref"];
		
			/*
			Attachment information here.  Was part of include / get template part but the variables were not moving across.
			*/
			//get_template_part('templates/content', 'job-attach'); 

			 //articles.sitepoint.com/article/advanced-email-php
						// Read POST request params into global vars
						//$to      = $_POST['to'];
						$from    = "CIS Security Recruitment <jobs@cis-security.co.uk>";
						//$subject = $_POST['subject'];
						$message =  "Hello\n\nThe below information has been submitted from the CIS online applicaton form:\n\n1. PERSONAL INFORMATION\nFirst Name: $firstname\nMiddle Name: $middlename\nSurname: $surname\nEmail Address: $email\nPostal Address: $address\nTelephone: $phone\nEligible to work in UK: $ukel\nVisa working restrictions: $visa\nCautioned in the last 5 years: $caution\nIf cautioned explain: $caution_y\n\n2.POSITION, AVAILABILITY:\nPosition Applied for: $position\n\nDays, Hours Available: $days\n\nHours Available:\nDays & Nights: $daysnights. Days Only: $daysonly. Nights Only: $nightsonly. \nDates Available to start: $avail\nSkills and Qualifications: $skills\n\nSIA or Application No: $sia\n\n3.EMPLOYMENT HISTORY:\n(Present or last employer)\nEmployer: $lastemp\nEmployers Address: $empadd\nSupervisor: $empsup\nPhone: $emptel\nFax: $empfax\nEmail: $empemail\nPosition Title: $emptitle\nFrom - To: $empfrom\n\nFORM END.\n\n\n\n\n\n\n-------------------------\nCIS Security $year";

						// Obtain file upload vars
						$fileatt      = $_FILES['fileatt']['tmp_name'];
						$fileatt_type = $_FILES['fileatt']['type'];
						$fileatt_name = $_FILES['fileatt']['name'];

						$headers = "From: $from";

						if (is_uploaded_file($fileatt)) {
						  // Read the file to be attached ('rb' = read binary)
						  $file = fopen($fileatt,'rb');
						  $data = fread($file,filesize($fileatt));
						  fclose($file);

						  // Generate a boundary string
						  $semi_rand = md5(time());
						  $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
						  
						  // Add the headers for a file attachment
						  $headers .= "\nMIME-Version: 1.0\n" .
						              "Content-Type: multipart/mixed;\n" .
						              " boundary=\"{$mime_boundary}\"";

						  // Add a multipart boundary above the plain message
						  $message = "This is a multi-part message in MIME format.\n\n" .
						             "--{$mime_boundary}\n" .
						             "Content-Type: text/plain; charset=\"iso-8859-1\"\n" .
						             "Content-Transfer-Encoding: 7bit\n\n" .
						             $message . "\n\n";

						  // Base64 encode the file data
						  $data = chunk_split(base64_encode($data));

						  // Add file attachment to the message
						  $message .= "--{$mime_boundary}\n" .
						              "Content-Type: {$fileatt_type};\n" .
						              " name=\"{$fileatt_name}\"\n" .
						              //"Content-Disposition: attachment;\n" .
						              //" filename=\"{$fileatt_name}\"\n" .
						              "Content-Transfer-Encoding: base64\n\n" .
						              $data . "\n\n" .
						              "--{$mime_boundary}--\n";
						}

				/* END ATTACHMENT AND MESSAGE INFO*/		


			//mail variablesc
			
			$emailto = "jobs@cis-security.co.uk";
			//testing:
			//$emailto = "vinny@redheadmedia.co.uk";
			// headers is called in the attach.in file above -  removed the -f header - was it causing confusion and errors occasionally
			$subject = "Job Ref: " . $thisjobref . " - CIS Security Online Application";
			
			 
		mail( $emailto, $subject, $message, $headers );
  		   
//send nice email to potential customer
$emailback = $_POST['email'];
			$headersb = "From: CIS Security Recruitment <jobs@cis-security.co.uk>";
			$subjectb = "CIS Security:  Thanks for contacting us";
			$who = $_POST['first-name'];
			 $messageb = "Hi $who,\n\nThank you for contacting CIS Security, please accept this email as confirmation that we have received your application.\n\nUnfortunately, due to the high level of applications we receive each week, we are unable to respond to each applicant personally.  Should you be shortlisted for interview, we will contact you within two weeks of receiving your application.\n\nKind regards\n\nRecruitment Team\nCIS Security Ltd\n\n-------------------------\n\nweb: http://www.cis-security.co.uk";
		mail( $emailback, $subjectb, $messageb, $headersb, 'jobs@cis-security.co.uk' );

?> <div class="alert alert-success">
<p>Success. Thank you for sending us your application; please check your email for confirmation.</p>
</div>
<p><a href="http://www.cis-security.co.uk">CIS home page</a></p>

<br /><br /><br /><br />
	<?php		} else { //output the form  
?>   
					  
			  
                    <?php //echo $forminvalid;   if ($forminvalid != true) {echo "the form is complete";} else {echo "incomplete";} echo "<br />$errors";  ?>
                    <?php if (isset($_GET['ref'])) {$urlref = $_GET['ref']; } else {$urlref = "n-a";} ?>
                    
                    <form action="?check&ref=<?php echo $urlref ; ?>" method="POST" enctype="multipart/form-data">
						<fieldset class=" labels-top">
							<div class="alert alert-success">
							<p><strong>The form is incomplete, please see below and update your answers where indicated - thank you.</strong></p>
							</div>
						<div class="row formsection"><div class="col-lg-12">
							
                           <p><strong>1. PERSONAL INFORMATION</strong></p>
										
								<div class="col-lg-6 col-md-6 col-sm-6">
									<label for="first-name"><sup>* </sup>First Name</label><?php if (!$_POST['first-name']) {echo "<em class='error'>(please complete)</em>" ; } ?>
									<input id="first-name" name="first-name" type="text" class="text" value="<?php echo $_POST['first-name'] ; ?>" />
									<label for="middle-name">Middle Name</label>
									<input id="middle-name" name="middle-name" type="text" class="text" value="<?php echo $_POST['middle-name'] ; ?>" />
							    <label for="surname"><sup>* </sup>Surname</label><?php if (!$_POST['surname']) {echo "<em class='error'>(please complete)</em>" ; } ?>
									<input id="surname" name="surname" type="text" class="text" value="<?php echo $_POST['surname'] ; ?>" />
                                    <label for="email"><sup>* </sup>Email Address</label><?php if (!$_POST['email']) {echo "<em class='error'>(please complete)</em>" ; } ?>
									<input id="email" name="email" type="text" class="text" value="<?php echo $_POST['email'] ; ?>" />
                                 
                                       
								</div>
								
								<div class="col-lg-6 col-md-6 col-sm-6">
									<label for="address"><sup>* </sup>Street Address</label><?php if (!$_POST['address']) {echo "<em class='error'>(please complete)</em>" ; } ?>
									<input id="address" name="address" type="text" class="text" value="<?php echo $_POST['address'] ; ?>" />
                                    <label for="city"><sup>* </sup>City, Postcode</label><?php if (!$_POST['city']) {echo "<em class='error'>(please complete)</em>" ; } ?>
									<input id="city" name="city" type="text" class="text" value="<?php echo $_POST['city'] ; ?>" />
                                    <label for="phone"><sup>* </sup>Phone Number / Mobile</label><?php if (!$_POST['phone']) {echo "<em class='error'>(please complete)</em>" ; } ?>
									<input id="phone" name="phone" type="text" class="text" value="<?php echo $_POST['phone'] ; ?>" />
                                    
								</div>
                    	    </div>
                    	</div> <!-- /.row & ./col-lg-12 -->
                                <div class="clear"><br />
                                 <label for="ukeligible"><sup>* </sup>Are you eligible to work in the UK?</label>
								  <?php $radio = 0; if ($_POST['ukeligible'] == "uk_yes") { $radio ++;} 
								  if ($_POST['ukeligible'] == "uk_no") { $radio ++;} 
								  if ($radio < 1) {echo "<em class='error'>(please select)</em>" ; } ?>
								  <input type="radio" name="ukeligible" value="uk_yes" id="ukeligible_0"<?php if ($_POST['ukeligible'] == "uk_yes") {echo " checked" ;} ?>/>yes
									    <input type="radio" name="ukeligible" value="uk_no" id="ukeligible_1"<?php if ($_POST['ukeligible'] == "uk_no") {echo " checked" ;} ?> />no
                                    
                                    <!--Removed by VF oct 2010 --> <!--  <label for="pport"><sup>* </sup>Passport Number.</label><?php// if (!$_POST['pport']) {echo "<em class='error'>(please complete)</em>" ; } ?>
									<input id="pport" name="pport" type="text" class="text" value="<?php //echo $_POST['pport'] ; ?>" />
                                    <label for="ppexpires"><sup>* </sup>Expiry Date.</label><?php// if (!$_POST['ppexpires']) {echo "<em class='error'>(please complete)</em>" ; } ?>
									<input id="ppexpires" name="ppexpires" type="text" class="text" value="<?php// echo $_POST['ppexpires'] ; ?>" />-->
                                     <label for="visa"><sup>* </sup>What working restrictions do you have? </label><?php if (!$_POST['visa_restriction']) { if ($_POST['ukeligible'] == "uk_no" ) {echo "<em class='error'>(please complete)</em>" ; } }?>
									<textarea id="visa_restriction" name="visa_restriction" cols="50" rows="2"> <?php echo $_POST['visa_restriction'] ; ?></textarea>
                                    
                                     <label for="caution"><sup>* </sup>Have you been convicted or cautioned with a criminal offence within the last 5 years? </label>
                                     <?php $radio1 = 0; if ($_POST['caution'] == "caution_0") { $radio1 ++;} 
								  if ($_POST['caution'] == "caution_1") { $radio1 ++;} 
								  if ($radio1 < 1) {echo "<em class='error'>(please select)</em>" ; } ?>
									 <input type="radio" name="caution" value="caution_0" id="caution_0"<?php if ($_POST['caution'] == "caution_0") {echo " checked" ;} ?> />yes
									 <input type="radio" name="caution" value="caution_1" id="caution_1"<?php if ($_POST['caution'] == "caution_1") {echo " checked" ;} ?> />no
									   
                                       <label for="caution_yes">If yes, please explain: </label> <?php if (!$_POST['caution_yes']) { if ($_POST['caution'] == "caution_0") { echo "<em class='error'>(please complete)</em>" ; }} ?>
									<textarea id="caution_yes" name="caution_yes" cols="50" rows="3"><?php echo $_POST['caution_yes'] ; ?></textarea>
                                     <label for="fileatt">Upload Your CV: <em class='error'>(please select if you want to include CV)</em> </label>
                                    <input type="file" name="fileatt" />
                                    </div>
                                    <hr />
							<!--</div> columns-2 -->
							<div class="formsection">
                             <p><strong>2. Position / Availability</strong></p>
                             <label for="job"><sup>* </sup>Position Applied For</label><?php if (!$_POST['job']) {echo "<em class='error'>(please complete)</em>" ; } ?>
									<input id="job" name="job" type="text" class="text" value="<?php echo $_POST['job'] ; ?>" />
                                    <label for="jobref">Job Reference (CIS only)</label>
                                      <input id="jobref" name="jobref" type="text" class="text" value="<?php echo $_POST['jobref'] ; ?>" readonly="readonly" />
                                    <label for="days"><sup>* </sup>Days/Hours Available (Mon-Sun) </label><?php if (!$_POST['days']) {echo "<em class='error'>(please complete)</em>" ; } ?>
									<textarea id="days" name="days" cols="50" rows="3"><?php echo $_POST['days'] ; ?></textarea>
                                    <p>Hours Available:</p>
                                     <label for="days_nights"><sup>* </sup>Days &amp; Nights:</label>
                                     <?php $radio2 = 0; if ($_POST['days_nights'] == "dn0") { $radio2 ++;} 
								  if ($_POST['days_nights'] == "dn1") { $radio2 ++;} 
								  if ($radio2 < 1) {echo "<em class='error'>(please select)</em>" ; } ?>
									 <input type="radio" name="days_nights" value="dn0" id="days_nights_0"<?php if ($_POST['days_nights'] == "dn0")  {echo " checked" ;} ?> />yes
									 <input type="radio" name="days_nights" value="dn1" id="days_nights_1"<?php if ($_POST['days_nights'] == "dn1")  {echo " checked" ;} ?> />no
                                     
                                       <label for="days_only"><sup>* </sup>Days Only:</label>
                                       <?php //$radio3 = 0; if ($_POST['days_only'] == "days0") { $radio3 ++;} 
//								  if ($_POST['days_only'] == "days1") { $radio3 ++;} 
//								  if ($radio3 < 1) {echo "<em class='error'>(please select)</em>" ; } ?>
									 <input type="radio" name="days_only" value="days0" id="days_only_0"<?php if ($_POST['days_only'] == "days0")  {echo " checked" ;} ?> />yes
									 <input type="radio" name="days_only" value="days1" id="days_only_1"<?php if ($_POST['days_only'] == "days1")  {echo " checked" ;} ?> />no
                                     
                                     <label for="nights_only"><sup>* </sup>Nights Only:</label>
                                     <?php //$radio4 = 0; if ($_POST['nights_only'] == "n0") { $radio4 ++;} 
//								  if ($_POST['nights_only'] == "n1") { $radio4 ++;} 
//								  if ($radio4 < 1) {echo "<em class='error'>(please select)</em>" ; } ?>
									 <input type="radio" name="nights_only" value="n0" id="nights_only_0"<?php if ($_POST['nights_only'] == "n0")  {echo " checked" ;} ?> />yes
									 <input type="radio" name="nights_only" value="n1" id="nights_only_1"<?php if ($_POST['nights_only'] == "n1")  {echo " checked" ;} ?> />no
                                 
                                 <label for="date_avail"><sup>* </sup>What date are you available to start work? </label><?php if (!$_POST['date_avail']) {echo "<em class='error'>(please complete)</em>" ; } ?>
									<input id="date_avail" name="date_avail" type="text" class="text" value="<?php echo $_POST['date_avail'] ; ?>" />
                                    
							<label for="skills"><sup>* </sup>Skills and Qualifications: Licenses, Skills, Training, Awards</label><?php if (!$_POST['skills']) {echo "<em class='error'>(please complete)</em>" ; } ?>
							<textarea id="skills" name="skills" cols="50" rows="4"><?php echo $_POST['skills'] ; ?></textarea>
                            
                            <label for="sia"><sup>* </sup>SIA Licence No./ Application No.  </label><?php if (!$_POST['sia']) {echo "<em class='error'>(please complete)</em>" ; } ?>
									<input id="sia" name="sia" type="text" class="text" value="<?php echo $_POST['sia'] ; ?>" />
							</div>
							<hr />
                            <div class="formsection">
                             <p><strong>3. Employment History</strong></p>
                             Present Or Last Position:
                               <label for="employer"><sup>* </sup>Employer</label><?php if (!$_POST['employer']) {echo "<em class='error'>(please complete)</em>" ; } ?>
									<input id="employer" name="employer" type="text" class="text" value="<?php echo $_POST['employer'] ; ?>" />
                             <label for="emp_address">Address.</label><?php if (!$_POST['emp_address']) {echo "<em class='error'>(please complete)</em>" ; } ?>
							<textarea id="emp_address" name="emp_address" cols="50" rows="5"><?php echo $_POST['emp_address']; ?></textarea>
                              <label for="supervisor"><sup>* </sup>Your Supervisor</label><?php if (!$_POST['supervisor']) {echo "<em class='error'>(please complete)</em>" ; } ?>
									<input id="supervisor" name="supervisor" type="text" class="text" value="<?php echo $_POST['supervisor'] ; ?>" />
                                     <label for="emp_phone"><sup>* </sup>Phone</label><?php if (!$_POST['emp_phone']) {echo "<em class='error'>(please complete)</em>" ; } ?>
									<input id="emp_phone" name="emp_phone" type="text" class="text" value="<?php echo $_POST['emp_phone'] ; ?>" />
                                     <label for="emp_fax"><sup>* </sup>Fax</label><?php if (!$_POST['emp_fax']) {echo "<em class='error'>(please complete)</em>" ; } ?>
									<input id="emp_fax" name="emp_fax" type="text" class="text" value="<?php echo $_POST['emp_fax'] ; ?>" />
                                     <label for="emp_email"><sup>* </sup>Email</label><?php if (!$_POST['emp_email']) {echo "<em class='error'>(please complete)</em>" ; } ?>
									<input id="emp_email" name="emp_email" type="text" class="text" value="<?php echo $_POST['emp_email'] ; ?>" />
                                    <label for="emp_title"><sup>* </sup>Position Title</label><?php if (!$_POST['emp_title']) {echo "<em class='error'>(please complete)</em>" ; } ?>
									<input id="emp_title" name="emp_title" type="text" class="text" value="<?php echo $_POST['emp_title'] ; ?>" />
                                    <label for="emp_from"><sup>* </sup>From - To</label><?php if (!$_POST['emp_from']) {echo "<em class='error'>(please complete)</em>" ; } ?>
									<input id="emp_from" name="emp_from" type="text" class="text" value="<?php echo $_POST['emp_from'] ; ?>" />
							
							</div>
                           
                            
							<div class="submit">
                             <label for="answer"><strong>So that we know you're human, please answer the following question</strong><br /><sup>* </sup>What is 1 + 1? (enter number below)</label>
                             <?php if (!$_POST['answer'] or $_POST['answer'] != "2") {echo "<em class='error'>(please enter answer)</em>" ; } ?>
									<input id="answer" name="answer" type="text" class="text" value="<?php echo $_POST['answer'] ; ?>" />
                           <p><br /> 
                           	<div class="alert alert-success">	
                           	Please ensure that you have completed all the required fields.</p>
                           </div>
									<input id="submit" name="submit" type="submit" class="btn btn-default btn-lg" alt="Submit" value="Send" />
							</div>
						</fieldset>
					</form>
                    
                    
                    <?php } //end else for forminvalid check 
						} //end else for overall form check
						?>