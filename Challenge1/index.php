<?php
require "./lib/inc/db.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link href='./styles.css' rel='stylesheet'>
  <title>Form Processing</title>
</head>
<body>
  <ul>
    <li><a class="selected" href="http://mhernandez.road2hire.ninja/PHPFormChallenges/Challenge1/">Challenge 1</a></li>
    <li><a href="http://mhernandez.road2hire.ninja/PHPFormChallenges/Challenge2/">Challenge 2</a></li>
    <li><a href="http://mhernandez.road2hire.ninja/PHPFormChallenges/Challenge3/">Challenge 3</a></li>
  </ul>
  <div class="wrapper">
    <h1>Challenge 1</h1>
    <form action="index.php" method="post">
      <input type="hidden" name="hiddenValue" value="its a secret" />

      <div>
        <label for="title">States List: </label>
        <select name="title">
          <?php
          //generate option tags from database
          try {
            $sql = $db->prepare("SELECT Name FROM stateTable");
            $sql->execute();
            $result = $sql->fetchAll();

          } catch (PDOException $e) {
            echo $e->getMessage();
          }
          foreach($result as $name){
          ?>
            <option value="<?= $name["Name"] ?>"><?= $name["Name"] ?></option>
          <?php
          }
          ?>
        </select>
      </div>
    </form>
  </div>
</body>
</html>

<!--
Challenge 1:
Create a MySQL table that holds a record for each state.
Create an html form that has a select field with all of the US states.
Generate the states using PHP/MySQL.
-->
