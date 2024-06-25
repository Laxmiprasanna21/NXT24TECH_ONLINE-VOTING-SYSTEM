<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location:  ../");
    }
    
    $userdata = $_SESSION['userdata'];
    $groupdata = $_SESSION['groupsdata'];

    if($_SESSION['userdata']['status']==0){
        $status = '<b style="color:red">Not Voted </b>';
    }
    else{
        $status = '<b style="color:green">Voted </b>';
    }
?>


<html>
    <head>
    <title>Online Voting System - Dashboard</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
    </head>  
    <body>
        <style>
            #backbtn{

                padding: 9px;
                border-radius: 3px;
                background-color: rgb(159, 221, 83);
                color: black ;
                font-size: 13px;
                float: left;
                margin: 10px;
            }
            #logoutbtn{
                padding: 9px;
                border-radius: 3px;
                background-color: rgb(159, 221, 83);
                color: black ;
                font-size: 13px;
                float: right;
                margin: 10px;
            }

            #Profile{
                background-color: white;
                width: 35%;
                padding: 10px;
                float: left;
            }
            #Group{
                background-color: white;
                width: 60%;
                padding: 20px;
                float: right;
            }

            #votebtn{
                padding: 9px;
                border-radius: 3px;
                background-color: rgb(159, 221, 83);
                color: black ;
                font-size: 13px;
                float: left;
            }
            #mainpanel{
                padding: 10px;
            }
            #voted{
                border-radius: 3px;
                background-color: green;
                color: black ;
                font-size: 13px;
                float: left;
            }
            

        </style>


        <div id="mainSection">
            <center>
            <div id="headerSection">
                <a href="../"><button id="backbtn"> Back</button></a>
                <a href="logout.php"><button id="logoutbtn">Logout</button></a>
                <h1>Online Voting System</h1>
            </div>
            </center>
            <hr>

            <div id="mainpanel">
            <div id="Profile">
                <center><img src="../uploads/<?php echo $userdata['photo'] ?>"height="120" width="120" ></center><br><br><br>
                <b>Name:</b> <?php echo  $userdata['name']?><br><br>
                <b>Mobile Number:</b><?php echo  $userdata['mobile number']?><br><br>
                <b>Address</b><?php echo  $userdata['address']?><br><br>
                <b>Status:</b><?php echo  $status ?><br><br>
            </div>
            <div id="Group">
                <?php
                    if($_SESSION['groupsdata']){
                        for($i=0; $i<count($groupdata); $i++){
                            ?>
                            <div>
                                <img style="float: right;" src="../uploads/<?php echo $groupdata[$i]['photo']  ?> " height="100" width="100">
                                <b>Group Name: </b><?php echo $groupdata[$i]['name'] ?><br><br>
                                <b>Votes: </b><?php echo $groupdata[$i]['votes'] ?><br><br>
                                <form action="../api/vote.php" method="POST">
                                    <input type="hidden" name="gvotes" value="<?php echo $groupdata[$i]['votes'] ?>">
                                    <input type="hidden" name="gid" value="<?php echo $groupdata[$i]['id'] ?>">
                                    <?php 
                                        if($_SESSION['userdata']['status']==0){
                                            ?>
                                            <input type="submit" name="votebtn" value="Vote" id="votebtn">
                                            <?php

                                        }
                                        else{
                                            ?>
                                            <button disabled type="button" name="votebtn" value="vote" id="voted">Voted</button>
                                            <?php
                                        }
                                    
                                    ?>
                                    <input type="submit" name="votebtn" value="Vote" id="votebtn">
                                </form>
                            </div>

            </div>
            
                            <hr>
                            <?php
                        }

                    }
                    else{
                        
                    }
                
                ?>
            </div>
        
        
        </div>
        
        
    </body>  
</html>