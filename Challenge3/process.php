<?php
require "./lib/inc/db.inc.php";

  if(!empty($_POST["name"])){
      try {
        $sql = $db->prepare(
          "INSERT INTO Products2 (Name, Description, Price)
          VALUES (:name, :description, :price)"
        );
        $result = $sql->execute(
          ["name" => $_POST["name"],
          "description" => $_POST["description"],
          "price" => $_POST["price"]]
        );
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
  }

  try {
    $sql = $db->prepare(
      "SELECT Name, Description, Price
      FROM Products2");
    $sql->execute();
    $result = $sql->fetchAll();
  } catch (PDOException $e) {
    echo $e->getMessage();
  }

  echo json_encode($result); exit;


?>
