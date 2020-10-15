<?php
class UserController {
    private $table_name = "mlf_users";
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbs = "multi_lingual_base";
    private $con = null;

    private function connect_to_dbs(){
        $this->con = mysqli_connect(
            $this->host,
            $this->user,
            $this->pass,
            $this->dbs
        );
    }

    private function close_con(){
        mysqli_close($this->con);
    }

    public function user_register($req_data){
        $id = 0;
        $sur_name = $req_data['sur_name'];
        $first_name = $req_data['first_name'];
        $f_h_name = $req_data['f_h_name'];
        $adhar_no = $req_data['adhar_no'];
        $address = $req_data['address'];
        $village = $req_data['village'];
        $taluka = $req_data['taluka'];
        $state = $req_data['state'];
        $district = $req_data['district'];
        $country = $req_data['country'];
        $pincode = $req_data['pincode'];
        $phone_no = $req_data['phone_no'];
        $mob_no = $req_data['mob_no'];
        $whatsapp_no = $req_data['whatsapp_no'];
        $telegtam_no = $req_data['telegram_no'];
        $email = $req_data['email'];
        $str = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $password = substr(str_shuffle($str),0,8);
        $this->connect_to_dbs();
        $qry = "insert into mlf_users values(".$id.",'".$sur_name."','".$first_name."','".$f_h_name."','".$adhar_no."','".$address."','".$village."','".$taluka."','".$state."','".$district."','".$country."','".$pincode."','".$phone_no."','".$mob_no."','".$whatsapp_no."','".$telegtam_no."','".$email."','".$password."')";
        $result = mysqli_query($this->con,$qry);
        if($result){
            $ret_arr = array(
                "status"=>true,
                "msg"=>"success",
                "pass"=>$password
            );
        }
        else{
            $ret_arr = array(
                "status"=>false,
                "msg"=>"Error. Try again later"
            );
        }
        $this->close_con();
        return json_encode($ret_arr);
    }

    public function user_login($req_data){
        $email = $req_data['email'];
        $password = $req_data['password'];

        $qry = "select * from mlf_users where email='".$email."' and password='".$password."'";
        $this->connect_to_dbs();
        $result = mysqli_query($this->con,$qry);
        $res = mysqli_fetch_assoc($result);
        if(!empty($res)){
            session_start();
            $_SESSION['user_details'] = $res;
            $ret_arr = array(
                "status"=>true,
                "msg"=>"success"
            );
        }
        else{
            $ret_arr = array(
                "status"=>false,
                "msg"=>"No data found. Please register first."
            );
        }
        $this->close_con();
        return json_encode($ret_arr);
    }

    public function user_update($req_data){
        $id = $req_data['user_id'];
        $sur_name = $req_data['sur_name'];
        $first_name = $req_data['first_name'];
        $f_h_name = $req_data['f_h_name'];
        $adhar_no = $req_data['adhar_no'];
        $address = $req_data['address'];
        $village = $req_data['village'];
        $taluka = $req_data['taluka'];
        $state = $req_data['state'];
        $district = $req_data['district'];
        $country = $req_data['country'];
        $pincode = $req_data['pincode'];
        $phone_no = $req_data['phone_no'];
        $mob_no = $req_data['mob_no'];
        $whatsapp_no = $req_data['whatsapp_no'];
        $telegtam_no = $req_data['telegram_no'];
        $this->connect_to_dbs();
        $qry = "update mlf_users set sur_name='".$sur_name."',first_name='".$first_name."',f_h_name='".$f_h_name."',adhar_no='".$adhar_no."',address='".$address."',village='".$village."',taluka='".$taluka."',state='".$state."',district='".$district."',country='".$country."',pincode='".$pincode."',phone_no='".$phone_no."',mob_no='".$mob_no."',whatsapp_no='".$whatsapp_no."',telegram_no='".$telegtam_no."' where user_id=".$id;
        $result = mysqli_query($this->con,$qry);
        if($result){
            $ret_arr = array(
                "status"=>true,
                "msg"=>"successfully updated"
            );
        }
        else{
            $ret_arr = array(
                "status"=>false,
                "msg"=>"Error. Try again later"
            );
        }
        $this->close_con();
        return json_encode($ret_arr);
    }
}
?>