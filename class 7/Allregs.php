
<?php
session_start();
include "./db.php";
$query = "SELECT * FROM `registrations` WHERE Last_Name = 'Chowdhury' ";

$response = mysqli_query($connected,$query);
$Regs = mysqli_fetch_all($response , 1);
// echo "<pre>";--
// print_r($All_Regs);
// echo "</pre>";

// print_r($_SESSION['old']);
// print_r($_SESSION['from_errors']);
?>







<html>
    <head>
        <!-- css link -->
        <link rel="stylesheet" href="./css/about.css">

        <!--Bootstrap link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    </head>


    <body style="background-image: url(https://t3.ftcdn.net/jpg/01/91/95/30/360_F_191953033_gehQATeDoh5z6PyRDbeKyBZuS83CjMEF.jpg);">


 

    <!-- nav bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./index.php">New Registration</a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link disabled" href="./Allregs.php" tabindex="-1" aria-disabled="true">All Registrations</a>
        </li>
      </ul>

    </div>
  </div>
</nav>


<!-- table -->

<div class="col-lg-6 mx-auto mt-5">

<table class="table">
  
    <tr>
        <th>ID</th>
        <th>F-Name</th>
        <th>L-Name</th>
        <th>D.O.B</th>
        <th>Experience</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Pass</th>
        <th>Re-pass</th>
    </tr>

    <?php
    if(count($Regs) > 0){
    foreach($Regs as $key=>$Reg){
    ?>   
        <tr>
        <td><?= ++$key ?></td>
        <td><?= $Reg['Fast_Nama']?> </td>
        <td><?= $Reg['Last_Name']?></td>
        <td><?= $Reg['Date_Of_Birth']?></td>
        <td><?= $Reg['Experience']?></td>
        <td><?= $Reg['Email_Address']?></td>
        <td><?= $Reg['Mobile_Number']?></td>
        <td><?= $Reg['Password']?></td>
        <td><?= $Reg['Re_password']?></td>
    </tr>
<?php
    }
}else{
?>
<tr>
    <td colspan="8" class="text-center">
        <h4>
            <b>Broken......</b>🥺!!
        </h4>
    </td>
</tr>

<?php
}

    ?>

</table>
</div>

<!-- table -->

    <!-- nav bar end -->

  
  <div class="toast <?= isset( $_SESSION['Message']) ? "show" : ""?>" style="position: absolute; bottom: 0px; right: 0px" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                  <img src="..." class="rounded me-2" alt="...">
                  <strong class="me-auto">Registration</strong>
                  <small class="text-body-secondary">Just Now</small>
                  <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">

                <?= isset( $_SESSION['Message']) ? ( $_SESSION['Message']) : ""?>
                  
              </div>
                       
</section>

    </body>
</html>


<?php

session_unset();
?>

