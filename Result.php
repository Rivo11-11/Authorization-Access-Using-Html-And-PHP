
<head>
  <title> Answer form </title>
  <link rel="stylesheet" href="style.css">
</head>
<?php

if($_SERVER['HTTP_REFERER']=='http://localhost/MyProject/registration.html') //From Register
  {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db.lab2";

$name=$_POST["name"] ;
$email=$_POST["email"];
$password1=$_POST["password"];

$x=false ;


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user WHERE email='$email'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) 
      $x=true ; 
  else
   $sql = "INSERT INTO user ( name ,email,password)
        VALUES ( '$name', '$email','$password1')" ;
if ($conn->query($sql) === TRUE) 
 $String="New record created successfully" ;
 else
  $String="Error: " . $sql . "<br>" . $conn->error ;
$conn->close();



if($x==false)
{
  echo '<body>
    <div class="center">
      <h1>',"welcome      ",$name, '</h1>
  </body>' ;
}

else
{
  // echo "<script>
  // window.location.href='login.html';
  // alert('email already exist'); 
  //        </script>";
      echo '"<meta http-equiv = "refresh" content = "1.4; url = login.html" />
      <body>
      <div class="center">
      <h1>
      ',"Email Already Existed",'
      </h1>
      </div>
      </body>'     ;
        
}
  }

else //From Login
{

  $email=$_POST['email1'] ;
  $passwordd=$_POST['password1'] ;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db.lab2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT name,password FROM user WHERE email='$email'";
$result = $conn->query($sql);
$row = $result->fetch_assoc() ;

if( $row!='')
   {
    if($row['password'] != $passwordd) // Check on Password
    {
    //   echo '"<meta http-equiv = "refresh" content = "1.4; url = login.html" />
    //   <body>
    //   <div class="center">
    //   <h1>
    //   ',"Wrong Password Enterred\n
    // Try Again!", '
    //   </h1>
    //   </div>
    //   </body>'     ;
      echo "<script>
  window.location.href='login.html';
  alert('Wrong Password Enterred'); 
         </script>";
      
    }
    else
    {
    $name=$row['name'] ;
    echo '<body>
    <div class="center">
      <h1>',"welcome      ",$name, '</h1>
  </body>' ;
    }
   } 

  else
  {
    // echo 
    // '"<meta http-equiv = "refresh" content = "1.4; url = login.html" />
    // <body>
    // <div class="center">
    // <h1>
    // ',"Wrong Email or Password\n
    // Try Again!", '
    // </h1>
    // </div>
    // </body>'     ;

    echo "<script>
  window.location.href='login.html';
  alert('Wrong Email or Password'); 
         </script>";
  }
    
  
  

$conn->close();






}

?>


 