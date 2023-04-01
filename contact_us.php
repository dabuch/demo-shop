<?php
	$msg = '';
	$msgClass = '';

	if(filter_has_var(INPUT_POST, 'submit')) {

		$name    = htmlspecialchars($_POST['name']);
		$email 	 = htmlspecialchars($_POST['email']);
		$subject = htmlspecialchars($_POST['subject']);
		$message = htmlspecialchars($_POST['message']);

		if(!empty($name) && !empty($email) && !empty($subject) &&($message)){

			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){

					$msg = 'Please use a valid email';
					$msgClass = 'alert-danger';

			} else {
				//passed
				$toEmail = 'info@demo-shop.com';
				$subject = 'Contact Request From '.$name;
				$body = '<h2>Contact Request </h2>
				         <h4>Name</h4><p>'.$name.'</p>
						 <h4>Email</h4></p>'.$email.'</p>
						 <h4>Subject</h4><p>'.$subject.'</p>
						 <h4>Message</h4><p>'.$message.'</p>';

				// Email Header
				$headers = "MIME-Version: 1.0" ."\r\n";
				$headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

				//Additional Headers
				$headers .= "From: " .$name. "<".$email.">". "\r\n";

				if(mail($toEmail, $subject, $body, $headers)){
					//Email Sent
					
				    header("location: contact_message.php");

				} else {

					$msg = 'Your email was not sent';
					$msgClass = 'alert-danger';

				}

			}

		} else {

			$msg = 'Please Fill In All Fields';
			$msgClass = 'alert-danger';
		}
	}

?>

<?php include 'header.php';?>
    <main class="container">

        <div class="container">
            <div class="row">
                <center><h2 class="lined-heading" style="color: black;"><span>CONTACT US</span></h2></center>

            </div>
        </div>

        <div class="container">
          <div class="row">
              <div class="col-lg-4 mb-5 bg-danger">
                  <div class="contact-info">
                      <h3 class="mb-4 mt-4 text-white">Contacts</h3>
        
                      <ul>
                          <li class="d-flex mb-4"> <i class="fas fa-map-marker-alt text-white mr-2 font-13 mt-1"></i>
                              <div class="contact-address">
                                  <h5 class="text-white">Address</h5>
                                  <span class="text-white"> 1 Demo Street, </span> <br>
                                  <span class="text-white"> Your District. </span>
                                  <span class="text-white"> City, State.</span>
                              </div>
                          </li>
                          <li class="d-flex mb-4"> <i class="fas fa-phone-alt text-white mr-2 font-13 mt-1"></i>
                              <div class="contact-address">
                                  <h5 class="text-white">Call Us</h5>
                                  <span class="d-table text-white">+234-8037114003 </span>
                              </div>
                          </li>
                          <li class="d-flex mb-4"> <i class="fas fa-envelope text-white mr-2 font-13 mt-1"></i>
                              <div class="contact-address">
                                  <h5 class="text-white">Email Adderss</h5>
                                  <span class="d-table text-white">info@demo-shop.com</span>
                              </div>
                          </li>
                      </ul>
                  </div>
              </div>

            <div class="col-lg-1"></div>

            <div class="col-md-12 col-lg-7">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <h2 class="text-secondary text-center mb-5">Get In Touch</h2>
                  </div>

                  <div class="col-md-12">
                    <form class="w-100" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                      <div class="row">
                        <?php if($msg != ''): ?>
                          <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
                          <?php endif; ?>
                        <div class="row mb-4">
                          <div class="form-group col-lg-6 mb-3">
                            <label><strong>Name :</strong>  </label>
                            <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name: ''; ?>">
                          </div>
                          <div class="form-group col-lg-6 mb-3">
                            <label><strong>Email :</strong>  </label>
                            <input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email: ''; ?>">
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group col-lg- mb-3">
                              <label><strong>Subject :</strong>  </label>
                              <input type="text" name="subject" class="form-control" value="<?php echo isset($_POST['subject']) ? $subject: ''; ?>">
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label><strong>Message :</strong>  </label>
                              <textarea name="message" class="form-control" rows="5" value="<?php echo isset($_POST['message']) ? $message: ''; ?>"></textarea>
                            </div>
                          </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-danger">Submit Message</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div><br><br>

  <!--	Contact Inforamtion -->


    </main>

   <?php include 'footer.php';?>