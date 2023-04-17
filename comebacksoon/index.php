<!DOCTYPE html>
<html lang="en">

<head>
  <title>Ο υπερσύγχρονος οδηγός πόλης της Νέας Καρβάλης με πληροφορίες για την αγορά και τον άνθρωπο.</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Η Ιστοσελίδα της Νέας Καρβάλης με το βουνό και τη θάλασσα μαζί. Καταστήματα, προϊόντα, εκδηλώσεις, σύλλογοι και σχετικά άρθρα. Μνημεία όπως την εκκλησία του Άγιου Γρηγορίου με τους χιλιάδες επισκέπτες κάθε χρόνο!">
  <meta name="keywords" content="νεα καρβάλη, ν καρβαλη καβαλας, εκδηλώσεις στη καβαλα, επαγγελματικός οδηγός πολης">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/util.css">
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>

<body>

  <!--  -->
  <div class="simpleslide100">
    <div class="simpleslide100-item bg-img1" style="background-image: url('images/bg03.jpg');"></div>
    <div class="simpleslide100-item bg-img1" style="background-image: url('images/faces.jpg');"></div>
    <div class="simpleslide100-item bg-img1" style="background-image: url('images/bg02.jpg');"></div>
    <div class="simpleslide100-item bg-img1" style="background-image: url('images/bg.jpg');"></div>
  </div>

  <div class="size1 overlay1">
    <!--  -->
    <div class="size1 flex-col-c-m p-l-15 p-r-15 p-t-30 p-b-50">
      <h3 class="l1-txt1 txt-center p-b-25">
				Υπο Κατασκευη
			</h3>

      <p class="m2-txt1 txt-center p-b-30">
        Η σελίδα της Νέας Καρβάλης είναι υπο κατασκευή, ακολουθήστε μας για περισσότερα νέα!
      </p>

      <div class="flex-w flex-c-m cd100">
        <div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20">
          <span class="l2-txt1 p-b-9 days">15</span>
          <span class="s2-txt1">Μερες</span>
        </div>

        <div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20">
          <span class="l2-txt1 p-b-9 hours">17</span>
          <span class="s2-txt1">Ωρες</span>
        </div>

        <div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20">
          <span class="l2-txt1 p-b-9 minutes">50</span>
          <span class="s2-txt1">Λεπτα</span>
        </div>

        <div class="flex-col-c-m size2 bor1 m-l-15 m-r-15 m-b-20">
          <span class="l2-txt1 p-b-9 seconds">39</span>
          <span class="s2-txt1">Δευτερολεπτα</span>
        </div>
      </div>

      <div class="">
        <div class="col-xs-12">
          <a href="https://www.facebook.com/livinginnewkarvali/" target="_blank">
            <img src="images/likeus.png" width="200px" height="50px" alt="">
          </a>
        </div><br>
      </div>

      <?php
			if(!empty($_POST['email'])){
				$email = $_POST['email'];

				$to = 'jordantsap@hotmail.gr'; //algungida@gmail.com
				$subject = 'New subscriber from karvali.powerweb.gr';
				$message= "You have a new subscriber from: \n\n Email: $email";
				$headers = 'From: karvali.powerweb.gr';

				mail($to, $subject, $message, $headers);

				echo "<script type='text/javascript'>alert('Ευχαριστούμε που γίνατε μέλος της κοινότητας νέας Καρβάλης!');window.open('https://www.facebook.com/livinginnewkarvali/');</script>";
			}
			?>

        <form class="w-full flex-w flex-c-m validate-form" action="<?php echo $_SERVER["
          PHP_SELF "];?>" method="post">

          <div class="wrap-input100 validate-input where1">
            <input class="input100 placeholder0 s2-txt2" type="text" name="email" placeholder="Enter Email Address">
            <span class="focus-input100"></span>
          </div>


          <button class="flex-c-m size3 s2-txt3 how-btn1 trans-04 where1">
            Εγγραφη Μελους
          </button>
        </form>
    </div>
  </div>


  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="vendor/select2/select2.min.js"></script>
  <script src="vendor/countdowntime/moment.min.js"></script>
  <script src="vendor/countdowntime/moment-timezone.min.js"></script>
  <script src="vendor/countdowntime/moment-timezone-with-data.min.js"></script>
  <script src="vendor/countdowntime/countdowntime.js"></script>
  <script>
  $('.cd100').countdown100({
    /*Set Endtime here*/
    /*Endtime must be > current time*/
    endtimeYear: 0,
    endtimeMonth: 0,
    endtimeDate: 15,
    endtimeHours: 18,
    endtimeMinutes: 0,
    endtimeSeconds: 0,
    timeZone: ""
      // ex:  timeZone: "America/New_York"
      //go to " http://momentjs.com/timezone/ " to get timezone
  });
  </script>
  <script src="vendor/tilt/tilt.jquery.min.js"></script>
  <script>
  $('.js-tilt').tilt({
    scale: 1.1
  })
  </script>
  <script src="assets/js/main.js"></script>

</body>

</html>
