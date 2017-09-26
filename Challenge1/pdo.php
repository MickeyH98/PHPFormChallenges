<?php
require('lib/inc/db.inc.php');

if(isset($_POST['submit']) && $_POST['submit'] == 'Submit') {
		try {
      $sql = "INSERT INTO `tbl_institution` (InstitutionID, Name, Address, City, StateProvince, PostalCode, Active) ";
      $sql .= "VALUES(NULL, :name, :address, :city, :state, :zip, :active)";
      $stmt = $db->prepare($sql);
      $stmt->execute(array(
				':name'=>$_POST['name'],
				':address'=>$_POST['address'],
				':city'=>$_POST['city'],
				':state'=>$_POST['state'],
				':zip'=>$_POST['zip'],
				':active'=>$_POST['active'],
      ));

		} catch (PDOException $e) {
      echo $e->getMessage();
		}
}

		?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Form Processing</title>
  <style>
    div {
      padding: 10px;
    }
    </style>

</head>
<body>
  <h1>Data Insertion</h1>
  <p>Add a new college</p>
  <?php if(!isset($_GET['msg'])) { ?>
  <form action="pdo.php" method="post">
    <input type="hidden" name="hiddenValue" value="its a secret" />
    <div>
      <label for="fname">Name: <input type="text" value="" id="name" name="name" /></label>
    </div>
    <div>
      <label for="lname">Address: <input type="text" value="" id="address" name="address" /></label>
    </div>
    <div>
      <label for="lname">City: <input type="text" value="" id="city" name="city" /></label>
    </div>
    <div>
      <label for="lname">State: <input type="text" value="" id="state" name="state" /></label>
    </div>
    <div>
      <label for="lname">Zip: <input type="text" value="" id="zip" name="zip" /></label>
    </div>
    <div>
      <span>Active: <label for="yes">Yes: <input type="radio" value="1" id="yes" name="active" /></label><label for="no">No: <input type="radio" value="0" id="no" name="active" /></label>
    </div>
    <div>
      <input type="submit" value="Submit" name="submit" />
    </div>
  </form>
  <?php } else { ?>
  <p>You have a message from the server: <?php echo $_GET['msg']; ?>.</p>
  <?php }

    try {
			$sql = "SELECT * FROM `tbl_institution` WHERE `StateProvince` = :state AND Name LIKE :name ORDER BY InstitutionID DESC";

			$stmt = $db->prepare($sql);
			$stmt->execute(array(
				':state'=>'NC',
				':name'=>'w%'
			));
			// $row = $stmt->fetch();

			while( $row = $stmt->fetch()) {
  			echo "<p>".htmlentities($row['Name']).", ".$row['StateProvince']."</p>";
			}


		} catch (PDOException $e) {
			echo $e->getMessage();
		}



  ?>
</body>
</html>
