<?php
session_start();
error_reporting(0);
 ?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Bloom Soft </title>


<link rel="stylesheet" href="css/reset.css">

<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

<link rel="stylesheet" href="css/style.css">

</head>

<body>


<div class="pen-title">
  <h1>Bloom Soft</h1>
</div>
<div class="module form-module">

  <div class="form">
    <h2>Login to your account</h2>

  </div>
  <div class="form">
    <h2>Login to your account</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <h3><?php
    $UserMessage=null;
    if (isset($_POST['submit'])){
     if (empty($_POST['username'])){
      $_SESSION['username']=FALSE;
      $UserMessage.='<p>You forgot to enter your username!';
        } else {
          $_SESSION['username']=$_POST['username'];
            }
      echo $UserMessage;

    }?></h3>
      <input type="text" placeholder="Username" name="username" size="20" maxlength="30" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" required/>
      <h3><?php
    $PassMessage=null;
    if (isset($_POST['submit'])){
     if (empty($_POST['password'])){
      $_SESSION['password']=FALSE;
      $PassMessage.='<p>You forgot to enter your password!';
        } else {
          $_SESSION['password']=$_POST['password'];
            }
      echo $PassMessage;

    }?></h3>
    <input type="password" name="password" placeholder="Password" size="20" maxlength="20" required />
      <button type="submit" name="submit" value="Login">Login</button>
    </form>
  </div>
  <div class="cta"><a href="MainPage.php"></a></div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://codepen.io/andytran/pen/vLmRVp.js'></script>

<script src="js/index.js"></script>



  </body>
</html>
<?php
if ($_SESSION['username']=="test" &&   $_SESSION['password']=="1234") {

       header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/data.php");
}
/*End of main Submit conditional*/

?>
