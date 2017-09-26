<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Form Processing</title>
  <link href='./styles.css' rel='stylesheet'>
  <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
</head>
<body>
  <ul>
    <li><a href="http://mhernandez.road2hire.ninja/PHPFormChallenges/Challenge1/">Challenge 1</a></li>
    <li><a href="http://mhernandez.road2hire.ninja/PHPFormChallenges/Challenge2/">Challenge 2</a></li>
    <li><a class="selected" href="http://mhernandez.road2hire.ninja/PHPFormChallenges/Challenge3/">Challenge 3</a></li>
  </ul>
  <h1>Challenge 3</h1>
  <form action="index.php" method="post" id="form">

    <h2>Add a Product: </h2>

      <label for="name">Product Name: </label>
      <input type="text" name="name" id="productname" required>

      <label for="name">Product Description: </label>
      <input type="text" name="description" id="productdescription" required>

      <label for="name">Product Price: </label>
      <input type="text" name="price" id="productprice" required>

      <input type="submit" value="Submit" name="submit">

  </form>

  <div class="products">
    <h2>Products:</h2>
    <!--to be populated -->
  </div>

  <script>

  function processSubmit(postData){
    $.ajax({
      url: "./process.php",
      method: "post",
      data: postData
    }).done(function(data) {
      var products = JSON.parse(data);
      var productElements = products.map(function(value){
        return (
          `<div class='product'>
            <p> Name: ${value.Name}</p>
            <p> Description: ${value.Description}</p>
            <p> Price: $${value.Price}</p>
          </div>`
        )
      });
      $(".products").html(productElements);
    });
  }

  $(document).ready(function(){
    processSubmit({});
  });

  $("#form").on("submit", function(e){
    e.preventDefault();
    processSubmit({
      "name" : $("#productname").val(),
      "description" : $("#productdescription").val(),
      "price" : $("#productprice").val()
    });
    //clear input fields
    $("#productname").val('');
    $("#productdescription").val('');
    $("#productprice").val('');
  });

  </script>
</body>
</html>

<!--
Challenge 3: Create a form to add new products to the database.
-->
