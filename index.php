<?php

$db_name = 'mysql:host=localhost;dbname=contact_db';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $courses = $_POST['courses'];
   $courses = filter_var($courses, FILTER_SANITIZE_STRING);
   $gender = $_POST['gender'];
   $gender = filter_var($gender, FILTER_SANITIZE_STRING);

   $select_contact = $conn->prepare("SELECT * FROM `contact_form` WHERE name = ? AND number = ? AND email = ? AND courses = ? AND gender = ?");
   $select_contact->execute([$name, $number, $email, $courses, $gender]);

   if($select_contact->rowCount() > 0){
      $message[] = 'already sent message!';
   }else{
      $insert_message = $conn->prepare("INSERT INTO `contact_form`(name, number, email, courses, gender) VALUES(?,?,?,?,?)");
      $insert_message->execute([$name, $number, $email, $courses, $gender]);
      $message[] = 'message sent successfully!';
   }

}

?>






<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Student Companion | What do you want to do?</title>


  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>


<header class="header">

   <section class="flex">

      <a href="#home" class="logo">Student Companion</a>

      <nav class="navbar">
         <a href="index.php">Home</a>
         <a href="about1.html">About </a>
         <a href="parent.html">Note To Parents</a>
         <a href="feedback/feedback.php">Feedback</a>
         <a href="#contact">Contact</a>
         <a href="login1.php">Login|SignUp</a>


      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>

   </section>

</header>



<section class="home" id="home">

   <div class="row">

      <div class="content">
         <h3>Student <span>Companion</span></h3>
         <a href="#contact" class="btn">contact us</a>
      </div>

      <div class="image">
         <img src="images/homg-img.svg" alt="">
      </div>

   </div>

</section>



<section class="count">

   <div class="box-container">

      <div class="box">
         <i class="fas fa-graduation-cap"></i>
         <div class="content">
            <h3>50+</h3>
            <p>Activities</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-user-graduate"></i>
         <div class="content">
            <h3>1000+</h3>
            <p>Students</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-chalkboard-user"></i>
         <div class="content">
            <h3>70+</h3>
            <p>Sources</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-face-smile"></i>
         <div class="content">
            <h3>100%</h3>
            <p>satisfaction</p>
         </div>
      </div>

   </div>

</section>





<section class="courses" id="courses">

   <h1 class="heading">What Do You <span>Want To Do?</span></h1>

   

         <div class="swiper-slide slide">
            <img src="images/music.png" alt="">
            <h3>Music</h3>
            <p>You are so strained. Your mind must become fresh.

               So Don't be Worry. Just open your ears & Listen to the music.</p>
               <a href="login1.php" class="btn1">Listen Now</a>
         </div>

         <div class="swiper-slide slide">
            <img src="images/6895877.jpg" alt="">
            <h3>Learn And Grow</h3>
            <p>Everyday you learn a lot in school. So discover new things

               & learn new things everyday. So that your mind will improve a lot.</p>
               <a href="login1.php" class="btn1">Learn Now</a>
         </div>


         <div class="swiper-slide slide">
            <img src="images/images/game.png" alt="">
            <h3>Games</h3>
            <p>Playing game for some time will refresh your mind and increase your productivity</p>
            <a href="login1.php" class="btn1">Play Now</a>
         </div>

         <div class="swiper-slide slide">
            <img src="images/images/bio.png" alt="">
            <h3>Biography</h3>
            <p>Design is thinking made real</p>
            <a href="login1.php" class="btn1">Read Now</a>
         </div>

         <div class="swiper-slide slide">
            <img src="images/course-5.svg" alt="">
            <h3>Get help for your project</h3>
            <p>Doing projects is a great way to keep learning!...</p>
            <a href="login1.php" class="btn1">Let's Go</a>
         </div>

         <div class="swiper-slide slide">
            <img src="images/images/ai.png" alt="">
            <h3>AI Tools</h3>
            <p>AI tools will make your work easiler by simplifying the your work</p>
            <a href="login1.php" class="btn1">Explore Now</a>
         </div>

         <div class="swiper-slide slide">
            <img src="images/images/globe.png" alt="">
            <h3>Atlas</h3>
            <p>Explore the world at your fingertip</p>
            <a href="login1.php" class="btn1">Explore Now</a>
         </div>

         <div class="swiper-slide slide">
            <img src="images/images/thesau.png" alt="">
            <h3>Thesaurus Dictionary</h3>
            <p>It can be used on a computer while writing an e-mail, letter, or paper to find an alternative meaning for words</p>
            <a href="login1.php"  class="btn1">Explore Now</a>
         </div>

         <div class="swiper-slide slide">
            <img src="images/images/news.png" alt="">
            <h3>Read News</h3>
            <p>Current Affairs are very important. They help you improve your knowledge & also your Language.</p>
            <a href="login1.php"  class="btn1">Read Now</a>
         </div>

         

      

      <div class="swiper-pagination"></div>

   

</section>





<section class="contact" id="contact">

   <h1 class="heading"><span>contact</span> us</h1>

   <div class="row">

      <div class="image">
         <img src="images/contact-img.svg" alt="">
      </div>

      <form action="" method="post">
         <span>your name</span>
         <input type="text" required placeholder="enter your full name" maxlength="50" name="name" class="box">
         <span>your email</span>
         <input type="email" required placeholder="enter your valie email" maxlength="50" name="email" class="box">
         <span>your number</span>
         <input type="number" required placeholder="enter your valie number" max="9999999999" min="0" name="number" class="box" onkeypress="if(this.value.length == 10) return false;">
         <span>select course</span>
         <select name="courses" class="box" required>
            <option value="" disabled selected>select the course --</option>
            <option value="web development">web development</option>
            <option value="science and biology">science and biology</option>
            <option value="engineering">engineering</option>
            <option value="digital marketing">digital marketing</option>
            <option value="graphic design">graphic design</option>
            <option value="teaching">teaching</option>
            <option value="social studies">social studies</option>
            <option value="data analysis">data analysis</option>
            <option value="artificial intelligence">artificial intelligence</option>
         </select>
         <span>select gender</span>
         <div class="radio">
            <input type="radio" name="gender" value="male" id="male">
            <label for="male">male</label>
            <input type="radio" name="gender" value="female" id="female">
            <label for="female">female</label>
         </div>
         <input type="submit" value="send message" class="btn" name="send">
      </form>

   </div>

</section>



<footer class="footer">

   <section>

      <div class="credit">&copy; copyright @ 2023 by <span>404 ErroR</span> | all rights reserved!</div>
      <div> <a href="admin_log.php" class="btn">Admin Login</a></div>
   </section>

</footer>






</body>
</html>