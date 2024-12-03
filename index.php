<!DOCTYPE html>
<html>
<style>
body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
  background-image: url('Images/body.jpg');
}

.container {
  width: 30%;
  border-radius: 10px;
  border-style: groove;
}

input[type=text], input[type=password], input[type=submit] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-sizing: border-box;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
.error {
    background: #f2dede;
    color: #fc0349;
    padding: 10px;
    width: 95%;
    border-radius: 5px;
}
div {
  border-radius: 10px;
  background-color: #f2f2f2;
  padding: 50px;
}
</style>
<body>
<div class="container">
  <form action="login.php" method="post">
	<h2 style="text-align: center;">User Login</h2>
    <label for="uname">Username</label>
    <input type="text" id="uname" name="uname" placeholder="Enter username">
    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Enter password">
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <input type="submit" value="Login">
    </form> 
	<h4>Don't have an account?</h4><a href="register.html">Sign up here.</a>
</div>

</body>
</html>
