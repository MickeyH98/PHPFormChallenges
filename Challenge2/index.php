<?php
require "./lib/inc/db.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Form Processing</title>
  <link href='./styles.css' rel='stylesheet'>
</head>
<body>
  <ul>
    <li><a href="http://mhernandez.road2hire.ninja/PHPFormChallenges/Challenge1/">Challenge 1</a></li>
    <li><a class="selected" href="http://mhernandez.road2hire.ninja/PHPFormChallenges/Challenge2/">Challenge 2</a></li>
    <li><a href="http://mhernandez.road2hire.ninja/PHPFormChallenges/Challenge3/">Challenge 3</a></li>
  </ul>
  <h1>Challenge 2</h1>
  <form action="index.php" method="post" class="form">
    <div>
      <label for="title">Product Color: </label>
      <select name="color">
        <option value="" name="">Select a color</option>
        <?php
        //generate option tags from database
        try {
          $sql = $db->prepare("SELECT Color FROM Products GROUP BY Color");
          $sql->execute();
          $result = $sql->fetchAll();

        } catch (PDOException $e) {
          echo $e->getMessage();
        }
        foreach($result as $name){
        ?>
          <option value="<?= $name["Color"] ?>" name="<?= $name["Color"] ?>"><?= $name["Color"] ?></option>
        <?php
        }
        ?>
      </select>
    </div>

    <div>
      <input type="submit" value="Submit" name="submit" />
    </div>
  </form>
  <?php
    if($_POST["color"]){
      $color = $_POST["color"];

      echo "<div class='" . strtolower($color) . "Products'>";
      echo "<style>body .form{background: linear-gradient(to bottom, white, $color);}</style>";
      if($color){
        echo "<h2>$color Products:</h2>";

      }
      try {
        $sql = $db->prepare(
          "SELECT Name, Description, Price
          FROM Products
          WHERE Color = :color"
        );
        $sql->execute(["color" => $color]);
        $result = $sql->fetchAll();

      } catch (PDOException $e) {
        echo $e->getMessage();
      }
      foreach($result as $name){
      ?>
      <div class="product">
        <p> Name: <?= $name["Name"] ?> </p>
        <p> Description: <?= $name["Description"] ?> </p>
        <p> Price: $<?= $name["Price"] ?> </p>
      </div>
      <?php
      }

    echo "</div>";
  }
  ?>
</body>
</html>

<!--
Challenge 2: Create a MySQL table that holds a list of products (name, description, price, color).
Create a form that allows users to select a color.
When they submit the color choice, display all products that are that color.
Bonus if you can dynamically generate the color choices in the form from all of the unique color options in the database.
-->
