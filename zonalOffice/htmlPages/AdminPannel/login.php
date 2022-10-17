<?php
    try{
        require('../../connection.php');
        session_start();
        #for login
        if(isset($_POST['login'])){
            $un=mysqli_real_escape_string($conn,$_POST['uname']);
            $pswnml = mysqli_real_escape_string($conn,$_POST['psw']);
            $unvar = base64_encode($un);
            $pswvar = md5($pswnml);
            
            $query="SELECT * FROM users u inner join usercgs m on m.reid = u.reid WHERE u.pwd='$pswvar' AND (u.email='$unvar' OR u.uname='$unvar' )";
            
            $result=mysqli_query($conn,$query);
            

            if($result){
                if(mysqli_num_rows($result)==1){
                    
                        $_SESSION['logged_in']=true;
                        $_SESSION['uname']=$un;

                        while($record = mysqli_fetch_array($result)){
                            $_SESSION['ref']=$record['reid'];
                            //get categorization is for choose path
                        }
                        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==1){
                            header("location: DashBoard/principle.php");
                        }
                        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==2){
                            header("location: MainAdmin.php");
                        }
                        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==3){
                            header("location: DashBoard/RowDataAdmin.php");
                        }
                        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==4){
                            header("location: DashBoard/BranchAdmin.php");
                        }
                        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==5){
                            header("location: DashBoard/teacherAdmin.php");
                        }
                        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==6){
                            header("location: DashBoard/markingAdmin.php");
                        }
                        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==7){
                            header("location: DashBoard/cOfficer.php");
                        }
                        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['ref']==8){
                            header("location: DashBoard/developer.php");
                        }
            
                }else{
                    echo "<script>
                    alert('Incorrect E-mail or Password!');
                    window.location.href='../../index.php'
                    </script>";
                }
            }else{
                echo "<script>
                alert('E-mail or Username Not Registered!');
                window.location.href='../../index.php'
                </script>";
            }
        }
    }catch(Exception $e) {
        echo "Authentication Failed!";
    }
?>