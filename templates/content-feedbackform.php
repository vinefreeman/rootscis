<?php if (!isset($_GET['check'])) { ?>

<form action="?check" method="post">

<h2>CIS Security Feedback form</h2>
						<fieldset class="labels-top">
						<div class="alert alert-success">	
                        <p>Please complete the form below.<br /><em>* = required fields</em></p>
                        </div>

                        <p><strong>Type of feedback</strong></p>

							
						  <label for="feedback-purpose">*I would like to (please select)</label><br />
										  <label>
									    <input type="radio" name="feedbacktype" value="praise" id="feedbacktype_0" />
									    send praise</label>
									  
									  <label>
									    <input type="radio" name="feedbacktype" value="suggestion" id="feedbacktype_1" />
									    make a suggestion</label>
									
									  <label>
									    <input type="radio" name="feedbacktype" value="complain" id="feedbacktype_2" />
									    make a complaint</label>
									 
						 <p>&nbsp;</p>
                          
                       <p><strong>   Describe Your Comments</strong></p>
                          <p>
                          
						  <label for="comments">We aim to reply to your communication within 10 working days. To help us achieve this, please provide us with as much information as you can.</label><br />
							<textarea id="comments" name="comments" cols="70" rows="10"></textarea></p>
                            
                            <p><label>*Do you want to receive a reply?<br /></label>
                              <label>
                                <input type="radio" name="reply" value="yes" id="reply_0" />
                                Yes</label>
                               <label>
                                <input type="radio" name="reply" value="no" id="reply_1" />
                                No</label>
                             </p>
                             <p><label>Have you contacted us before?<br /></label>
                              <label>
                                <input type="radio" name="contact_before" value="yes" id="reply_0" />
                                Yes</label>
                                <label>
                                <input type="radio" name="contact_before" value="no" id="reply_1" />
                                No</label>
                            </p>
                            <p>&nbsp;</p>
                            <p><strong>Personal Details</strong></p>
                            <p>If you have requested a reply, we will need your email address.  You also have the option to provide some additional personal information; essential information is marked with an asterisk(*).</p>
                            <p>
                            <label for="title">Title</label><br />
									<input id="title" name="title" type="text" class="text" />
                            </p>
                            <p>
                            <label for="first-name">First Name</label><br />
									<input id="first-name" name="firstname" type="text" class="text" />
								</p>	
                                
                                
									<p><label for="surname">Surname</label><br />
									<input id="surname" name="surname" type="text" class="text" /></p>
                                    
                                     <p><label>Are you under 18?*</label><br />
                              <label>
                                <input type="radio" name="underage" value="yes" id="reply_0" />
                                Yes</label>
                              
                              <label>
                                <input type="radio" name="underage" value="no" id="reply_1" />
                                No</label>
                              
                            </p>
                                    <p>
                                    <label for="email">*Email Address</label><br />
									<input id="email" name="email" type="text" class="text" /></p>
                                    <p>
                                    <label for="postcode">First part of UK Postcode (W12, BR1 etc.)</label><br />
									<input id="postcode" name="postcode" type="text" class="text" /></p>
							
								
								
							
							<p><label for="tel">UK telephone number</label><br />
							<input id="tel" name="tel" type="text" class="text" /></p>
                            
                            
							<input id="email_check" name="email_check" type="hidden" class="text" value="enter_email" style="display:none" />
							<div class="submit">
								<input id="submit" name="submit" type="submit" class="btn btn-default" alt="Submit" value="Send" />
							
  </fieldset>
					</form>
					<?php } else { 
					if (!$_POST["feedbacktype"]) {$forminvalid = true;}
					if (!$_POST["reply"]) {$forminvalid = true;}
					if (!$_POST["contact_before"]) {$forminvalid = true;}
					if ($_POST["reply"] == 'yes') {if (!$_POST["email"]) {$forminvalid = true;}}
										
					if ($forminvalid == true){ //output for with errors ?>
                    <div class="alert alert-warning">
                    <p><strong>It seems that some of the information is missing or incorrect - see below.</strong></p>
                </div>
						<form action="<?php $_SERVER['PHP_SELF'];?>?check" method="post">
 							<p><em>* = required fields</em></p>

						<fieldset class=" labels-top">

                        <p><strong>Type of feedback</strong></p>
							
						  <label for="feedback-purpose">*I would like to (please select) <?php if (!$_POST["feedbacktype"]){echo "<br /><em class='error'>Please select an option</em>";} ?></label><br />
										  <label>
									    <input type="radio" name="feedbacktype" value="praise" id="feedbacktype_0"<?php if ($_POST["feedbacktype"] == "praise"){echo " checked='checked'";}?> />
									    send praise</label>
									 	  <label>
									    <input type="radio" name="feedbacktype" value="suggestion" id="feedbacktype_1"<?php if ($_POST["feedbacktype"] == "suggestion"){echo " checked='checked'";}?> />
									    make a suggestion</label>
									 	  <label>
									    <input type="radio" name="feedbacktype" value="complain" id="feedbacktype_2"<?php if ($_POST["feedbacktype"] == "complain"){echo " checked='checked'";}?> />
									    make a complaint</label>
									  
                                      <p>&nbsp;</p>
                          
                       <p><strong>   Describe Your Comments</strong></p>
                          <p>
                          
						  <label for="comments">We aim to reply to your communication within 10 working days. To help us achieve this, please provide us with as much information as you can.</label>
							<textarea id="comments" name="comments" cols="70" rows="10"><?php if ($_POST["comments"]){echo $_POST["comments"];}  ?></textarea></p>
                            
                            <p><label>Do you want to receive a reply?<?php if (!$_POST["reply"]){echo "<br /><em class='error'>Please choose</em>";} ?><br /></label>
                              <label>
                                <input type="radio" name="reply" value="yes" id="reply_0"<?php if ($_POST["reply"] == "yes"){echo " checked='checked'";}?> />
                                Yes</label>
                            
                              <label>
                                <input type="radio" name="reply" value="no" id="reply_1"<?php if ($_POST["reply"] == "no"){echo " checked='checked'";}?> />
                                No</label>
                             
                            </p>
                             <p><label>Have you contacted us before<?php if (!$_POST["contact_before"]){echo "<em class='error'>Please choose</em>";} ?></label><br />
                              <label>
                                <input type="radio" name="contact_before" value="yes" id="reply_0"<?php if ($_POST["contact_before"] == "yes"){echo " checked='checked'";}?> />
                                Yes</label>
                             
                              <label>
                                <input type="radio" name="contact_before" value="no" id="reply_1"<?php if ($_POST["contact_before"] == "no"){echo " checked='checked'";}?> />
                                No</label>
                            
                            </p>
                            <p>&nbsp;</p>
                            <p><strong>Personal Details</strong></p>
                            <p>If you have requested a reply, we will need your email address.  You also have the option to provide some additional personal information; essential information is marked with an asterisk(*).</p>
                            <p>
                            <label for="title">Title</label><br />
									<input id="title" name="title" type="text" class="text" value="<?php if ($_POST["title"]) {echo $_POST["title"];}?>" />
                            </p>
                            <p>
                            <label for="first-name">First Name</label><br />
									<input id="first-name" name="firstname" type="text" class="text" value="<?php if ($_POST["firstname"]) {echo $_POST["firstname"];}?>" />
								</p>	
                                
                                
									<p><label for="surname">Surname</label><br />
									<input id="surname" name="surname" type="text" class="text" value="<?php if ($_POST["surname"]) {echo $_POST["surname"];}?>" /></p>
                                    
                                     <p><label>Are you under 18?*</label><br />
                              <label>
                                <input type="radio" name="underage" value="yes" id="reply_0"<?php if ($_POST["underage"] == 'yes') {echo " checked='checked'";}?> />
                                Yes</label>
                           
                              <label>
                                <input type="radio" name="underage" value="no" id="reply_1"<?php if ($_POST["underage"] == 'no') {echo " checked='checked'";}?> />
                                No</label>
                              
                            </p>
                                    <p>
                                    <label for="email">*Email Address <?php if ($_POST["reply"] == 'yes') {if (!$_POST["email"]) {echo "<em class='error'>You have asked for a reply, please enter your email address.</em>";}}?></label><br />
									<input id="email" name="email" type="text" class="text" value="<?php if ($_POST["reply"] == 'yes') {if ($_POST["email"]) {echo $_POST["email"];}}?>" /></p>
                                    <p>
                                    <label for="postcode">First part of UK Postcode (W12, BR1 etc.)</label><br />
									<input id="postcode" name="postcode" type="text" class="text" value="<?php if ($_POST["postcode"]) {echo $_POST["postcode"];}?>" /></p>
							<p><label for="tel">UK telephone number</label><br />
							<input id="tel" name="tel" type="text" class="text" value="<?php if ($_POST["tel"]) {echo $_POST["tel"];}?>" /></p>
							<input id="email_check" name="email_check" type="hidden" class="text" value="enter_email" style="display:none" />
							<div class="submit">
									<input id="submit" name="submit" type="submit" class="btn btn-default" alt="Submit" value="Send" />
  </fieldset>
					</form>
						
				<?php	} else { //send the form
                    	// SET FORM FIELD VALUES TO VARIABLES
		$feedback = $_POST["feedbacktype"];
		$comments = $_POST["comments"];
		$reply = $_POST["reply"];
		$contactbefore = $_POST["contact_before"];
		$title = $_POST["title"];
		$underage = $_POST["underage"]; 
		$name = $_POST["firstname"];
		$postcode = $_POST["postcode"];
		$telephone = $_POST["tel"];
		$year = date(Y);
		$email = $_POST["email"];
		$surname = $_POST["surname"];
		
				
			//mail variablesc
			$emailto = "communication@cis-security.co.uk";
			//$emailto = "vinny@redheadmedia.co.uk";
			$subject = "CIS Security feedback form submission";
			$message = "Hi Tony\n\nThe below information has been submitted from the CIS Security website feedback form:\n\n\nType of feedback: $feedback\n\nComments:\n$comments\n\nRequires a reply: $reply\n\nContacted CIS before: $contactbefore\n\nTitle: $title\n\nFirst Name: $name\n\nSurname: $surname\n\nTelephone: $telephone\n\nEmail Address: $email\n\nFirst part of Postcode: $postcode\n\nUnder 18: $underage\n\n\n\n\n-------------------------\nCIS Security $year";
		mail( $emailto, $subject, $message, "From: CIS Security <general@cis-security.co.uk>", '-fgeneral@cis-security.co.uk' );
  		   
//send nice email to potential customer
if ($_POST["email"]){
$emailback = $_POST['email'];
			$headersb = "From: CIS Security <general@cis-security.co.uk>";
			$subjectb = "Thanks for contacting us";
			$who = $_POST['firstname'];
			 $messageb = "Hi $who,\n\nThanks for contacting CIS Security, this is just a quick confirmation email to let you know we have received your feedback form submission.\n\n\n\nKind regards\n\nCIS Security\n\n-------------------------\n\nweb: http://www.cis-security.co.uk";
		mail( $emailback, $subjectb, $messageb, $headersb, '-fgeneral@cis-security.co.uk' ); }
		echo "<div class='alert alert-success'><p>Thank you for the feedback.</p><p>Your information has been received.</p></div>"  ;} // end else send the form
		} // end check entire form ?>