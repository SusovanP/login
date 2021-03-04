<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->
<link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="Resource/all.css">
<link rel="stylesheet" href="Resource/bootstrap.min.css">
<script src="Resource/jquery.slim.min.js"></script>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" method="post">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email Username" name="userid" required autofocus>
                <label for="inputEmail">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
             
              <input type="submit" class="btn btn-lg btn-primary btn-block text-uppercase"  name="submit" value="Signin"> 
            
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>



<?php
    include("init.php");

    if(isset($_POST['submit'])){

    if (isset($_POST["userid"],$_POST["password"]))
    {
        $username=$_POST["userid"];
        $password=$_POST["password"];
       
        $sql = "SELECT * FROM user WHERE username='$username' and password = '$password'";
        $result=mysqli_query($conn,$sql);

        // $row=mysqli_fetch_array($result);
        $count=mysqli_num_rows($result);
    
        if($count <1)
        {
        ?>
            <script>
            alert("Username or Password not match!");
            header('location: /login/login.php')
            </script>
            <?php
        }
        else
        {

            $data =mysqli_fetch_assoc($result);

            $id=$data['id'];


            $_SESSION['id']=$id;
            header('location: /login/dashboard.php');
        }

        
    }
}
?>