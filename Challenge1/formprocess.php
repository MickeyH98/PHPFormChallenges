<?php 
  /**
   * this is for processing the form we submitted
   *
   */
  var_dump($_POST);
  
  
    
  ?>
  <h1>Your answers</h1>
  <p>Your name is <?php echo $_POST['title'] . '. ' . $_POST['fname'] . ' ' . $_POST['lname']; ?>. Your gender is <?php echo $_POST['gender']; ?>.</p>
  <p>You like to drink <ul><?php
    foreach($_POST['drinks'] as $drink) {
      echo '<li>'.$drink . '</li>';
    }
    ?>
  </ul>
  .</p>
  <p>You also said you'd like us to know the following: <?php echo $_POST['moreinfo']; ?></p>
<p><a href="form.php">Return to the form page</a>.</p>