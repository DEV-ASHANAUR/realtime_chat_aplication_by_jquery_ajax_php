<?php
    include 'main.php';
    session_start();
    $obj = new Main;
    $user_id = $_SESSION['user_id'];
    $user_data = $obj->fetch_user($user_id);
    if($user_data->num_rows>0){
        $output='<table id="myTable" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-left pl-3">UserName</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>';
        while($row = $user_data->fetch_object()){
            $user_idd = $row->user_id;
            $img = $row->user_photo;
            if(!empty($img)){
                $photo = $img;
            }else{
                $photo = 'default.jpg';
            }
            $status = '';
            $current_timestamp = strtotime(date('Y-m-d H:i:s') . '-10 second');
            $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
            $data = $obj->fetch_user_activity($user_idd);
 
            if($data > $current_timestamp){
                $status = '<span class="btn btn-success">Active</span>';
            }else{
                $status = '<span class="btn btn-danger">offline</span>';
            }
            $output.='<tr>
                        <td class="text-left pl-3"><img class="user_photo img-fluid mr-2" src="upload/'.$photo.'">'.ucwords($row->username).' '.$obj->count_unseen_message($user_idd,$user_id).' '.$obj->fetch_is_type_status($user_idd).'</td>
                        <td>'.$status.'</td>
                        <td><button type="button" data-tousername="'.$row->username.'" data-touserid="'.$row->user_id.'" class="btn btn-info btn-xs start_chat">Start <i class="far fa-comment-alt"></i></button></td>
                    </tr>';
                
                }
            $output.='
            </table>';
            echo $output;
    }

?>