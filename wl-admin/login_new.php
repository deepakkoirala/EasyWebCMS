<?php include("loginprocess.php"); ?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Please Login - <?php echo $_SERVER['HTTP_HOST']; ?></title>

    <link rel="stylesheet" href="css/login.css" media="screen" type="text/css" />

</head>

<body>

  <span href="#" class="button" id="toggle-login">Log in</span>

<div id="login">
  <div id="triangle"></div>
  <h1>Log in</h1>
  <form action="" method="post">
    <?php if($error) { ?><h3><?php echo $error; ?></h3> <?php } ?>
    <input type="text" name="txtDoman" placeholder="Username" value="<?php echo $name; ?>" />
    <input type="password" name="txtPass" placeholder="Password" />
    <input type="submit" name="submit" value="Log in" />
  </form>
<h4> © Copyright <?php echo $_SERVER['HTTP_HOST']; ?> <?php echo date("Y"); ?>.</h4>
 </div>

  <script src='../js/jquery.js'></script>

 <script>
$('#toggle-login').click(function(){
  $('#login').slideToggle("fast" );
});
</script>

</body>

</html>