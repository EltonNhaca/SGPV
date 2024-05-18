<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}
form {border: 3px solid #f1f1f1;}

.content{
  max-width: 500px;
  margin: auto;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: aquamarine; /*#04AA6D*/
  color: black;
  font-size: 16px;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}


#banner {
  background: linear-gradient(rgba(0, 0, 0, 0.5), #009688) ,url(images/placegar-parque-estacionamento-4.jpg);
  background-size: cover;
  background-position: center;
  height: 100vh;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: lightblue; /*#f44336*/
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
  color: #fff;
}

.content h2 {
  color: #fff;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

  <div id="banner">
       <div class="content">
          <h2>Login do Funcionario do Parque</h2>

          <form action="login-bd.php" method="post">
          <div class="imgcontainer">
            <img src="images/person-8.png" alt="Avatar" class="avatar">
         </div>

         <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Introduza seu nome de utilizador" name="username" id="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Introduza a password" name="password" id="psw" required>
              
            <button type="submit">Login</button>
            <label>
              <input type="checkbox" checked="checked" name="remember" value="yes"> Remember me
            </label>
          </div>

          <div class="container" style="background-color:#f1f1f1">
            <button type="button" name = "cancelbtn" id="cancelbtn" class="cancelbtn"><a href="MenuInicial.html"></a>Cancel</button>
            <!--<span class="psw">Forgot <a href="#">password?</a></span>-->
          </div>
        </form>
  </div>
  </div>

</body>
</html>
