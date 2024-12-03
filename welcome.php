<!DOCTYPE html>
<html>
<style>
body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
}
.container {
  width: 30%;
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
  <h3>Successfully Logged In</h3>
	<h4>Hello!! Welcome to my Page!!</h4>
  <a href="index.php">Logout</a>
</div>

</body>
</html>
