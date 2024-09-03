<?php
session_start();
include('connection.php');

$votes = $_POST['gvotes'];
$total_votes = $votes+1;
$gid = $_POST['gid'];
$uid= $_SESSION['userdata']['id'];

$update_votes = mysqli_query($conn,"UPDATE voters SET votes='$total_votes' WHERE id='$gid' " );
$update_user_status = mysqli_query($conn,"UPDATE voters SET status=1 WHERE id='gid' "  );

if($update_votes and $update_user_status){
    $groups = mysqli_query($conn,"SELECT * FROM voters WHERE role=2");  
    $groupsdata = mysqli_fetch_all($groups,MYSQLI_ASSOC); 

    $_SESSION['userdata']['status'] = 1 ;
    $_SESSION['groupsdata'] = $groupsdata;
    echo'
    <script>
    alert("Voting Successsfull");
    window.location="../routes/dashboard.php";
    
    </script>
    ';

}else{
echo'
<script>
alert("Some Error Occured!");
window.location="../routes/dashboard.php";

</script>
';
}

?>