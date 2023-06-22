<?php

$conn = mysqli_connect('localhost','root','','user_db');
$conn1 = mysqli_connect('localhost','root','','contact_db');

    
   $query = "SELECT * FROM user_form";
   $result = mysqli_query($conn, $query);
   $u =mysqli_num_rows ($result);


   $sql = "SELECT name, email FROM user_form";
   $result2 = mysqli_query($conn, $sql);
    
   $sql3 = "SELECT feedback.feedback, user_form.name FROM feedback JOIN user_form ON feedback.id = user_form.id";
   $result3 = mysqli_query($conn, $sql3);

   $sql4 = "SELECT name, number, email, courses, gender FROM contact_form";
   $result4 = mysqli_query($conn1, $sql4);
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Student Companion | Project</title>


      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   
      <link rel="stylesheet" href="css/style.css">
      
   


   </head>
   <body>
      <header class="header">

         <section class="flex">
      
            <a href="index.php" class="logo">Student Companion</a>
            <nav class="navbar" >
               <a href="logout.php">Logout</a>
            </nav>
      
            <div id="menu-btn" class="fas fa-bars"></div>
      
         </section>
      
      </header>

      <section class="about">
         <div class="row" >
               
               <div class="content">
                  
               </div>
         </div>
      </section>
      <section class="courses" id="courses">

            <h6 class = "heading">Admin<span> Page</span></h6>
      
      
      
               <div class="swiper-slide slide">
                     <h3>Number of users</h3>
                     <h3 style ='color:#00e77f;'>  <?php echo $u ?> </h3>
                     
               </div>

               <div class="swiper-slide slide">
                     <h3>Users details</h3>
                     <?php
                     echo "<table style= 'margin-left: auto; margin-right: auto; font-size:18px; color:#ffffff'>";
                     echo "<tr><th style ='color:#00e77f; font-size:20px;'>Name</th><th style ='color:#00e77f; font-size:20px;'>Email</th></tr>";

                     
                     while ($row = mysqli_fetch_assoc($result2)) {
                        echo "<tr><td>" . $row["name"] . "</td> <td>" . $row["email"] . "</td></tr>";
                        }
                        echo "</table>";
                     ?>
               </div>
               
               <div class="swiper-slide slide" >
                     <h3>Feedback details</h3>
                     <?php
                     echo "<table style= 'margin-left: auto; margin-right: auto; font-size:18px; color:#ffffff'>";
                     echo "<tr><th style ='color:#00e77f; font-size:20px;'>User Name</th><th style ='color:#00e77f; font-size:20px;'>Feedback</th></tr>";
                     
                     while ($row3 = mysqli_fetch_assoc($result3)) {
                       echo "<tr><td>" . $row3["name"]. "</td><td>" .  $row3["feedback"] . "</td></tr>";
                     }
                     
                     echo "</table>";
                     ?>
               </div>

               <div class="swiper-slide slide">
                     <h3>Course contact details</h3>
                     <?php
                     echo "<table style= 'margin-left: auto; margin-right: auto; font-size:18px; color:#ffffff' >";
                     echo "<tr><th style ='color:#00e77f; font-size:20px;'>Name</th><th style ='color:#00e77f; font-size:20px;'>Number</th><th style ='color:#00e77f; font-size:20px;'>Email</th><th style ='color:#00e77f; font-size:20px;'>Course</th><th style ='color:#00e77f; font-size:20px;'>Gender</th></tr>";
                     
                     while ($row4 = mysqli_fetch_assoc($result4)) {
                       echo "<tr><td>" . $row4["name"] . "</td><td>" . $row4["number"] . "</td><td>" . $row4["email"] . "</td><td>" . $row4["courses"] . "</td><td>" . $row4["gender"] . "</td></tr>";
                     }
                     
                     echo "</table>";
                     ?>
               </div>
         </section>
      </body>
</html>