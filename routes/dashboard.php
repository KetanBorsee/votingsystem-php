<?php 

session_start();

if(!isset($_SESSION['userdata'])){

    header("location:../index.html");
}
    $userdata=$_SESSION['userdata'];
    $groupsdata=$_SESSION['groupsdata'];

    if($_SESSION['userdata']['status']==0){
          $status = '<b style="color:red">Not Voted</b>';
    }else{
        $status = '<b style="color:green">Voted</b>';
    }
?>


<html>
    <head>
        <title>Online Registration System</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
    </head>
    <body>
    <style>
     #backbtn{
        padding: 10px;
        border-radius: 5px;
        background-color: rgb(61, 61, 140);
        color: aliceblue;
        width: 10%;
        float:left;
        margin:10px;

    }
    #logoutbtn{
        padding: 10px;
        border-radius: 5px;
        background-color: rgb(61, 61, 140);
        color: aliceblue;
        width: 10%;
        float:right;
        margin:10px;
    }
   #Profile{
    width:30%;
    background-color:white;
    padding:20px;
    border-radius:5px;
    font-size:20px;
    float:left;
   }
   #Group{
    width:60%;
    background-color:white;
    padding:20px;
    border-radius:5px;
    font-size:20px;
    float:right;
   }
   #votebtn{
    padding: 10px;
        border-radius: 5px;
        background-color: rgb(61, 61, 140);
        color: aliceblue;
        width: 10%;

   }
   #mainpanel{
    padding:10px;
   }
   #voted{
    padding: 10px;
        border-radius: 5px;
        background-color: green;
        color: aliceblue;
        width: 10%;


   }
    
      </style>
      
     <div id="MainSection">
     <center>
        <div id="headersection">
        <a href="../index.html"><button id="backbtn">Back</button></a>
        <a href="logout.php" ><button id="logoutbtn" >LogOut</button></a> 
            <h1>Online Registration System</h1>
           </div>
</center>
           <hr/>
           <div id="mainpanel">
           <div id="Profile">
       <center> <img src="../uploads/<?php echo $userdata['photo']; ?>" height="150" width="150"/></center><br/><br/>
        <b>Name:</b> <?php echo $userdata['name'];echo "<br> <br>" ?>
        <b>Mobile:</b><?php echo $userdata['mobile'];echo "<br> <br>" ?>
        <b>Address:</b><?php echo $userdata['address'];echo "<br> <br>" ?>
        <b>Status:</b> <?php echo $status ; ?> 
           </div>



           <div id="Group" >
           <?php
           if($_SESSION['groupsdata']){
                 for($i=0; $i<count($groupsdata);$i++){
                    ?>

                <div>
                    <img style="float:right" src="../uploads/<?php echo $groupsdata[$i]['photo'];?>" height="150" width="150">
                    <b>Group Name : </b> <?php echo $groupsdata[$i]['name']; ?><br><br>
                    <b>Votes : </b> <?php echo $groupsdata[$i]['votes']; ?><br><br>
                    <form action="../api/vote.php" method="post">
                        <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>"/>
                        <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>"/>
                    
                  
                        <?php 
                        if($_SESSION['userdata']['status']==0){
                              ?>
                                <input type="submit" name="votebtn" value="Vote" id="votebtn" />
                              <?php
                              
                        }else{
                            ?>
                            <button disabled type="button" name="votebtn" value="Vote" id="voted" >Voted</button>
                          <?php

                        }
                        
                        ?>

                 </form>
                </div>
                <hr/>

                    <?php
                 }
              

           }
           else{




           }
           
           ?>


           </div>
        </div>
     </div>

    </body>
</html>