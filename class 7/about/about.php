<?php
session_start();

include "../db.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- css link -->
     <link rel="stylesheet" href="./css/about.css">

<!--Bootstrap link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
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
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</body>
</html>

<?php
// print_r($_REQUEST);

$name = ($_REQUEST ['Fast_name']);
$last_name = ($_REQUEST ['Last_name']);
$Birthday = ($_REQUEST ['Birthday']);
$Experience = ($_REQUEST ['Experience']);
$Email = ($_REQUEST ['Email']);
$Phone = ($_REQUEST ['Phone']);
$Password = ($_REQUEST ['Password']);
$Re_Pass = ($_REQUEST ['re_password']);
$error= [];

if(empty($name)){
    $error['N_error'] = "Required ";
}

if(empty($last_name)){
    $error['L_error'] = "Required ";
}

if(empty($Birthday)){
    $error['B_error'] = "Required ";
}

if(empty($Experience)){
    $error['E_error'] = "Required ";
}

if(empty($Email)){
    $error['E_error'] = "Required ";
}

if(empty($Phone)){
    $error['P_error'] = "Enter Your Mobile Number";
}

if(empty($Password)){
    $error['Pass_error'] = "Required";
}
else if(strlen($Password) > 10){
    $errors ['pass_error'] =  "Your Pass must be 10 characters or less";
}

if(empty($Re_Pass)){
    $error['re_pass_error'] = "Missing";
}
if($Password != $Re_Pass ){
    $error['re_pass_error'] = "Password Incorrect";
}
?>

<?php
// print_r(count($error));

if(count($error) > 0 ){

    $_SESSION['old'] = $_REQUEST;
    $_SESSION['from_errors'] = $error;
    header("Location: ../index.php");
}
else{
  $query = "INSERT INTO `registrations`(Fast_Nama, Last_Name, Date_Of_Birth, Experience, Email_Address, Mobile_Number, `Password`, Re_password) VALUES ('$name','$last_name','$Birthday','$Experience','$Email','$Phone','$Password','$Re_Pass')";

 $result = mysqli_query($connected , $query);


 if($result){

  $_SESSION['Message'] = '<h6 style="color: green;">Successfully Registration <span>&#9989;</span></h6>
  </div>';
    header("Location: ../index.php");
   

 }

}

?>