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
