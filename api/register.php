<?php
include_once("connection.php");

$name=$_POST['Name'];
$mobile=$_POST['Mobile'];
$password=$_POST['Password'];
$address=$_POST['Address'];
$image=$_FILES['File']['name'];
$tmp_name=$_FILES['File']['tmp_name'];
$role=$_POST['Role'];

if(isset($_POST['Name'])){
    move_uploaded_file($tmp_name,"../uploads/$image");
 $insert= mysqli_query($conn,"INSERT INTO voters (name,mobile,password,address,photo,role,status,votes) VALUES ('$name','$mobile','$password','$address','$image','$role',0,0)");
 if($insert){
     echo '
    <script>
     alert("Registration Successfull");
        window.location="../index.html";
    </script>
  ';
 }
 else{
  echo '
  <script>
   alert("Some Error Occurred!");
  window.location="../routes/register.html";
   </script>
  ';
}

}else{
  echo '
  <script>
   alert("Enter Valid Details ");
  window.location="../routes/register.html";
   </script>
  ';
}
?>