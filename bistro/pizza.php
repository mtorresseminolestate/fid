<!DOCTYPE html>
<html lang = "en">
<head>
<meta charset="utf-8">
  <title>Thank you for your order</title>
  <style>
  ol, ul { 
     list-style-type: none;
      }
  body {  
    background-color: #faf2e4;
    margin: 0 10%;
    font-family: sans-serif;
  }
  h1 {
    text-align: center;
    font-family: serif;
    font-weight: normal;
    text-transform: uppercase;
    border-bottom: 1px solid #57b1dc;
    margin-top: 30px;
  }

  h2 {
    color: #d1633c;
    font-size: 1em;
  }
  p.disclaimer { 
    border-top: 1px solid #d1633c; 
    padding-top: 1em;
  }
  </style>
</head>

<body>
  <?php if (isset($_POST['toppings']) && !is_array($_POST['toppings'])) {
    $toppings_problem = TRUE;
    $toppings = is_string($_POST['toppings']) ? $_POST['toppings'] : '<em>empty</em>';
  }
  else {
    $toppings_problem = FALSE;
    $toppings = isset($_POST['toppings']) ? implode(', ', $_POST['toppings']) : '<em>empty</em>';
  } ?>
<h1>THANK YOU</h1>

<p>Thank you for ordering from Black Goose Bistro. We've received the following information about your order:</p>

<h2>Your Information</h2>
<ul>
<li><strong>Name:</strong> <?php print $_POST['customername'] ? $_POST['customername'] : '<em>empty</em>'; ?></li>
<li><strong>Address:</strong> <?php print $_POST['address'] ? $_POST['address'] : '<em>empty</em>'; ?></li>
<li><strong>Telephone Number:</strong> <?php print $_POST['telephone'] ? $_POST['telephone'] : '<em>empty</em>'; ?></li>
<li><strong>Email Address:</strong> <?php print $_POST['email'] ? $_POST['email'] : '<em>empty</em>'; ?></li>
</ul>
<p><strong>Delivery Instructions:</strong> <?php print $_POST['instructions'] ? $_POST['instructions'] : '<em>empty</em>'; ?></p>

<h2>Your Pizza</h2>

<?php if (!isset($_POST['crust']) && !isset($_POST['toppings']) && !isset($_POST['pizzas'])) { ?>
<em>Sorry, we did not receive your information. <a href="http://www.blackgoosebistro.com/pizza.html">Please, try again.</a></em>
<?php } 
  else { ?>
    <ul>
    <li><strong>Crust:</strong> <?php print isset($_POST['crust']) && $_POST['crust'] ? $_POST['crust'] : '<em>empty</em>'; ?></li>
    <li><strong>Toppings:</strong> <?php
      print $toppings;
      if ($toppings_problem) { ?>
        <span style="color:red">*</span>
     <?php } ?></li>
    <li><strong>Number:</strong> <?php print isset($_POST['pizzas']) && $_POST['pizzas'] ? $_POST['pizzas'] : '<em>empty</em>'; ?></li>
    </ul>
<?php  }
if ($toppings_problem) { ?>
  <hr/>
  <p>&nbsp;</p>
<?php } ?>

<p class="disclaimer"><small>This website is for educational purposes only. No actual pizzas will show up at your door.</small></p>

</body>
</html>
