<?php
require_once(__DIR__.'/../controllers/UserController.php');
?>
<?php
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        //echo json_encode($_POST);
        switch($_POST['ActionToCall']){

            case "user_register" :
                $new_user = new UserController();
                echo $new_user->user_register($_POST);
            break;

            case "user_login" :
                $new_user = new UserController();
                echo $new_user->user_login($_POST);
            break;

            case "user_update" :
                $new_user = new UserController();
                echo $new_user->user_update($_POST);
            break;

            case "get_cities" :
                $ret_arr = [];
                $con = mysqli_connect("localhost","root","","multi_lingual_base");
                $qry = "select * from all_cities where state_id=".$_POST['state_id']." order by city_name";
                $result = mysqli_query($con,$qry);
                while($res = mysqli_fetch_assoc($result)){
                    $ret_arr[] = $res;
                }
                mysqli_close($con);
                echo json_encode($ret_arr);
            break;

        }
    }
    
?>





<?php
    function getStatesList(){
        $ret_arr = [];
        $con = mysqli_connect("localhost","root","","multi_lingual_base");
        $qry = "select * from state_list order by id asc";
        $result = mysqli_query($con,$qry);
        while($res = mysqli_fetch_assoc($result)){
            $ret_arr[] = $res;
        }
        mysqli_close($con);
        return $ret_arr;
    }

    function getDistrictsList(){
        $ret_arr = [];
        $con = mysqli_connect("localhost","root","","multi_lingual_base");
        $qry = "select * from all_cities order by city_name asc";
        $result = mysqli_query($con,$qry);
        while($res = mysqli_fetch_assoc($result)){
            $ret_arr[] = $res;
        }
        mysqli_close($con);
        return $ret_arr;
    }

    function getUserDetails($user_id){
        $ret_arr = [];
        $con = mysqli_connect("localhost","root","","multi_lingual_base");
        $qry = "select * from mlf_users where user_id=".$user_id;
        $result = mysqli_query($con,$qry);
        while($res = mysqli_fetch_assoc($result)){
            $ret_arr[] = $res;
        }
        mysqli_close($con);
        return $ret_arr;
    }
?>