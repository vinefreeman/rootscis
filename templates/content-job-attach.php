
<?php //articles.sitepoint.com/article/advanced-email-php
// Read POST request params into global vars
//$to      = $_POST['to'];
$from    = "jobs@cis-security.co.uk";
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
?>