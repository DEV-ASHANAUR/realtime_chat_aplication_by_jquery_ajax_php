<?php
    date_default_timezone_set('Asia/Dhaka');
    class Main{
        //connection property
        protected $host = 'localhost';
        protected $user = 'root';
        protected $pass = '';
        protected $db = 'chat';
        //query propery
        protected $con;
        protected $sql;
        protected $result;
        //database connection
        public function __construct()
        {
            if(!isset($this->con)){
                $this->con = new mysqli($this->host,$this->user,$this->pass,$this->db);
                if(!$this->con){
                    echo "connect Error".$this->con->connect_error;
                }
            }
            return $this->con;
        }
        
        public function retrive_user_auth($user)
        {
            $user = $user;
            $this->sql = "SELECT * FROM `login` WHERE username = '$user'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function sub_query($user_id)
        {
            $user_id = $user_id;
            $this->sql = "INSERT INTO `login_details`(`user_id`) VALUES ('$user_id')";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                $lastid = mysqli_insert_id($this->con);
                return $lastid;
            }else{
                return false;
            }
        }
        //reg function
        public function reg($userName,$pass1)
        {
            $userName = $userName;
            $pass1 = $pass1;
            $this->sql = "INSERT INTO `login`(`username`,`password`) VALUES ('$userName','$pass1')";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        public function fetch_user($user_id)
        {
            $user_id = $user_id;
            $this->sql = "SELECT * FROM `login` WHERE `user_id` != '$user_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function fetch_user_img($user_id)
        {
            $user_id = $user_id;
            $this->sql = "SELECT * FROM `login` WHERE `user_id` = '$user_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        //update last activity
        public function update_last_activity($last_id)
        {
            $last_id = $last_id;
            $this->sql = "UPDATE `login_details` SET `last_activity`= now() WHERE login_details_id = '$last_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }

        }
        //fetch_user_last_activity
        public function fetch_user_activity($user_id)
        {
            $user_id = $user_id;
            $this->sql = "SELECT * FROM `login_details` WHERE `user_id` = '$user_id' ORDER BY `last_activity` DESC LIMIT 1";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                foreach($this->result as $roww){
                   return $roww['last_activity'];
                }
            }else{
                return false;
            }
        }
        public function send_chat_message($to_user_id,$from_user_id,$chat_message)
        {
            $to_user_id = $to_user_id;
            $from_user_id = $from_user_id;
            $chat_message = $chat_message;
            $status = 1;
            $this->sql = "INSERT INTO `chat_message`(`to_user_id`, `from_user_id`, `chat_message`, `status`) VALUES ('$to_user_id','$from_user_id','$chat_message','$status')";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return 4;
            }else{
                return 3;
            }

        }
        
        //fetch chat history
        public function fetch_user_history($form_user_id,$to_user_id)
        {
            $form_user_id = $form_user_id;
            $to_user_id = $to_user_id;
            $this->sql = "SELECT * FROM `chat_message` WHERE (`from_user_id` = '$form_user_id' AND `to_user_id` = '$to_user_id') OR (`from_user_id` = '$to_user_id' AND `to_user_id` = '$form_user_id') ORDER BY `created_at`";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                $output = '<div>';
                foreach($this->result as $row){
                    $db_from_user_id = $row["from_user_id"];
                    $user_name = '';
                    if($row["from_user_id"] == $form_user_id)
                    {
                        $user_name = '<b class="text-info">You</b>';
                        $output.=
                        '<div style="margin:0;padding:0;">
                            <p style="text-align:right; margin-bottom:0px;"><small>'.$user_name.'</small></p>
                            <p style="background-color: #ddd;border-radius: 12px 12px;background-color: #0c1fd2; text-align:right;padding: 7px 16px;width: 50%;color:#fff;margin-left:50%;margin-bottom:0px;">'.$row["chat_message"].'
                                
                            </p>
                        </div>';
                        $output.='<div align="right" style="margin-top:0;margin-bottom:0;">
                                    <small><em>'.$this->facebook_time_ago($row["created_at"]).'</em></small>
                        </div>';
                    }else
                    {
                        $user_name = '<b class="text-muted">'.$this->get_name($db_from_user_id).'</b>';
                        $output.=
                        '<div style="margin:0;padding:0;">
                            <p style="margin-bottom:0px;"><small>'.$user_name.'</small></p>
                            <p style="background-color: #ddd;border-radius: 12px 12px;background-color: #ddd; padding: 7px 16px;width: 50%;color:#000;margin-bottom:0px;">'.$row["chat_message"].'
                                
                            </p>
                        </div>';
                        $output.='<div style="margin-top:0;margin-bottom:0;">
                                    <small><em>'.$this->facebook_time_ago($row["created_at"]).'</em></small>
                        </div>';
                        // $output.=
                        // '<div style="margin:0;padding:0;>
                        //     <p style=""><small>'.$user_name.'</small></p>
                        //     <p style="background-color: #ddd;border-radius: 12px 12px;background-color: #0c1fd2;padding: 7px 16px;width: 50%;color:#fff;margin-bottom:0px; ">'.$row["chat_message"].'</p>
                            
                        // </div>';
                        // $output.='<div style="margin-top:0;margin-bottom:0;">
                        //             <small><em>'.$this->facebook_time_ago($row["created_at"]).'</em></small>
                        // </div>';
                    }
                    // $output.=
                    // '<li style="border-bottom:1px dotted #ccc">
                    //     <p>'.$user_name.' - '.$row["chat_message"].'
                    //         <div align="right">
                    //             <small><em>'.$this->facebook_time_ago($row["created_at"]).'</em></small>
                    //         </div>
                    //     </p>
                    // </li>';
                }
                $output.='</div>';
                $this->update_status($form_user_id,$to_user_id);
                return $output;
            }else{
                return false;
            }

        }
        //update notification status
        public function update_status($form_user_id,$to_user_id)
        {
            $form_user_id = $form_user_id;
            $to_user_id = $to_user_id;
            $this->sql = "UPDATE `chat_message` SET `status`= 0 WHERE `from_user_id` = '$to_user_id' AND `to_user_id` = '$form_user_id' AND `status` = 1";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        function get_name($db_from_user_id)
        {
            $from_user_id = $db_from_user_id;
            $this->sql = "SELECT `username` FROM `login` WHERE `user_id` = '$from_user_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                foreach($this->result as $row)
                {
                    return $row['username'];
                }
            }else{
                return false;
            }
        }
        //unseen message count
        public function count_unseen_message($from_user_id,$to_user_id)
        {
            $from_user_id = $from_user_id;
            $to_user_id = $to_user_id;
            $this->sql = "SELECT * FROM `chat_message` WHERE `from_user_id` = '$from_user_id' AND `to_user_id` = '$to_user_id' AND `status` = 1";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                $count = $this->result->num_rows;
                $output = '';
                if($count>0){
                    $output = '<span class="badge badge-danger">'.$count.'</span>'; 
                }
                return $output;
            }else{
                return false;
            }
        }
        public function update_is_type($is_type,$log_d_id)
        {
            $is_type = $is_type;
            $log_d_id = $log_d_id;
            $this->sql = "UPDATE `login_details` SET `is_type`='$is_type' WHERE `login_details_id` = '$log_d_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function fetch_is_type_status($user_id)
        {
            $user_id = $user_id;
            $this->sql = "SELECT `is_type` FROM `login_details` WHERE `user_id` = '$user_id' ORDER  BY `last_activity` DESC LIMIT 1";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                $output = '';
                foreach($this->result as $row){
                    if($row['is_type'] == 'yes'){
                        $output = '-<small><em><span class="text-muted">Typing..</span></em></small>';
                    }
                }
                return $output;
            }else{
                return false;
            }
        }
        //update profile img
        public function update_profile($user_id,$imageName)
        {
            $user_id = $user_id;
            $imageName = $imageName;
            $this->sql = "UPDATE `login` SET `user_photo`='$imageName' WHERE user_id = '$user_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        //date setting
        public function facebook_time_ago($timestamp)  
        {  
            $time_ago = strtotime($timestamp);  
            $current_time = time();  
            $time_difference = $current_time - $time_ago;  
            $seconds = $time_difference;  
            $minutes      = round($seconds / 60 );           // value 60 is seconds  
            $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
            $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
            $weeks          = round($seconds / 604800);          // 7*24*60*60;  
            $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
            $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
            if($seconds <= 60)  
            {  
                return "Just Now";  
            }  
            else if($minutes <=60)  
            {  
            if($minutes == 1)  
            {  
                return "1 minute ago";  
            }else   
            {  
                return "$minutes minutes ago";  
            }  
            }  
            else if($hours <=24)  
            {  
            if($hours==1)  
            {  
                return "an hour ago";  
            }else  
            {  
                return "$hours hrs ago";  
            }  
            }  
            else if($days <= 7)  
            {  
            if($days==1)  
            {  
                return "yesterday";  
            }
            else  
            {  
                return "$days days ago";  
            }  
            }  
            else if($weeks <= 4.3) //4.3 == 52/12  
            {  
            if($weeks==1)  
            {  
                return "a week ago";  
            }  
            else  
            {  
                return "$weeks weeks ago";  
            }  
            }  
            else if($months <=12)  
            {  
            if($months==1)  
            {  
                return "a month ago";  
            }  
            else  
            {  
                return "$months months ago";  
            }  
            }  
            else  
            {  
            if($years==1)  
            {  
                return "one year ago";  
            }  
            else  
            {  
                return "$years years ago";  
            }  
            }  
        }
        //destroy database connection 
        public function __destruct(){
            $this->con->close();
        }
    }
    //$obj = new Main();


?>