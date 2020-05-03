<?php
    include 'Main.php';
    $obj = new Main;
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('location:login.php');
    }
    $user_name = $_SESSION['username'];
    $user_id = $_SESSION['user_id'];
    $user_info = $obj->fetch_user_img($user_id);
    if($user_info->num_rows>0){
        while($row = $user_info->fetch_object()){
            $photo = $row->user_photo;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chat_Aplication</title>
        <link rel="stylesheet" href="css/jquery-ui.theme.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="css/croppie.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/profile.css">
        <link rel="stylesheet" href="css/emojionearea.css">
        <script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/croppie.js"></script>
        <script src="js/emojionearea.min.js"></script>
    </head>
    <body>
        <div class="container">
            
            <div class="row mb-1 mt-4">
                <div class="col-xs-12 col-sm-12 col-md-4 mb-2">
                    <input type="text" class="form-control mb-2" id="myInput" onkeyup="myFunction()" placeholder="Search for name.." title="Type in a name">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 order-first mb-2">
                    <div id="profile_data">
                    
                    </div>
                    <div class="logout">
                        <a href="logout.php" style="background: red;padding: 7px 21px;text-transform: uppercase;color: #fff;cursor: pointer;border-radius: 2px;text-decoration-line: none;">Logout</a>
                        <label for="insert_image" style="background: #1A73E8;padding: 5px 21px;text-transform: uppercase;color: #fff;cursor: pointer;border-radius: 2px;"><i class="fas fa-cloud-upload-alt"></i> change photo</label>
                        <input type="file" name="insert_image" style="display: none" id="insert_image" accept="image/*" />
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertimageModal">
                            Launch demo modal
                        </button> -->
                    </div>
                </div>
            </div>
            
            <div id="user_details"></div>
            <div id="user_model-details"></div>
            <!-- Modal -->
			<div class="modal fade" id="insertimageModal" role="dialog">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Bangladesh have some promising talents.</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <div class="row">
                        <div class="col-md-8 text-center">
                            <div id="image_demo" style="width:350px;margin-top:30px"></div>
                        </div>
                    </div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary crop_image">Crop & Save</button>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- end modal -->
        </div>
        <!-- js script Here -->
        <script type="text/javascript" src="js/filter.js"></script>
        <script>
        
            $(document).ready(function(){
                fetch_profile();
                fetch_user();
                //set intervel
                setInterval(() => {
                    update_last_activity();
                    fetch_user();
                    update_chat_history_date();
                }, 5000);
                //fetch all user
                function fetch_user(){
                    $.ajax({
                        url:'fetch_user.php',
                        type:'POST',
                        success:function(data){
                            $('#user_details').html(data);
                        }
                    });
                }
                //fetch_profile
                function fetch_profile(){
                    $.ajax({
                        url:'fetch_profle.php',
                        type:'POST',
                        success:function(data){
                            $('#profile_data').html(data);
                        }
                    });
                }
                //update activity
                function update_last_activity(){
                    $.ajax({
                        url:'update_last_activity.php',
                        success:function(){

                        }
                    });
                }
                
                function make_chat_dialog_box(to_user_id, to_user_name){
                    var modal_content ='<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You Have Chat With '+to_user_name+' ">';
                    modal_content+='<div class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
                    modal_content+= fetch_user_chat_history(to_user_id);
                    modal_content+='</div>';
                    modal_content+='<div class="form-group">';
                    modal_content+='<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_messaage"></textarea>';
                    modal_content+='</div><div class="form-group" align="right">';
                    modal_content+='<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
                    $('#user_model-details').html(modal_content);
                }
                $(document).on('click','.start_chat',function(){
                    var to_user_id = $(this).data('touserid');
                    var to_user_name = $(this).data('tousername');
                    
                    //alert(to_user_id + to_user_name);
                    make_chat_dialog_box(to_user_id, to_user_name);
                    $("#user_dialog_"+to_user_id).dialog({
                        autoOpen:false,
                        width:400
                    });
                    $("#user_dialog_"+to_user_id).dialog('open');

                    $('#chat_message_'+to_user_id).emojioneArea({
                        pickerPosition: "top",
                        toneStyle:"bullet"
                    });
                    //var oldscrllHeight = $('#chat_history_'+to_user_id).prop("scrollHeight");

                    $('#chat_history_'+to_user_id).animate({
                        scrollTop: 20000000000
                    }, 'normal');
                    
                });
                //send chat message
                $(document).on('click','.send_chat',function(){
                    var to_user_id = $(this).attr('id');
                    var chat_message = $('#chat_message_'+to_user_id).val();
                    var oldscrllHeight = $('#chat_history_'+to_user_id).prop("scrollHeight");
                    $('#chat_history_'+to_user_id).animate({
                        scrollTop: oldscrllHeight
                    }, 'normal');
                    //alert(chat_message);
                    $.ajax({
                        url:'insert_chat.php',
                        type:'POST',
                        data:{'to_user_id':to_user_id,'chat_message':chat_message},
                        success:function(data,status){
                            //alert(status);
                            //$('#chat_message_'+to_user_id).val('');
                            //alert(data);
                            var element = $('#chat_message_'+to_user_id).emojioneArea();
                            element[0].emojioneArea.setText('');
                            $('#chat_history_'+to_user_id).html(data);
                            var newscrllHeight = $('#chat_history_'+to_user_id).prop("scrollHeight");
                            if(newscrllHeight > oldscrllHeight){
                                $('#chat_history_'+to_user_id).animate({
                                    scrollTop: newscrllHeight
                                }, 'slow');
                            }

                        }
                    });
                });
                //fetch_user_chat_history
                function fetch_user_chat_history(to_user_id)
                {
                    var oldscrllHeight = $('#chat_history_'+to_user_id).prop("scrollHeight");
                    //console.log(oldscrllHeight);
                    $.ajax({
                        url:"fetch_user_chat_history.php",
                        type:"POST",
                        data:{'to_user_id':to_user_id},
                        success:function(data){
                            $('#chat_history_'+to_user_id).html(data);
                            var newscrllHeight = $('#chat_history_'+to_user_id).prop("scrollHeight");
                            if(newscrllHeight > oldscrllHeight){
                                $('#chat_history_'+to_user_id).animate({
                                    scrollTop: newscrllHeight
                                }, 'normal');
                            }
                            // $('#chat_history_'+to_user_id).scrollDown(message[0].scrollHeight);
                        }
                    });
                }
                //update chat history date
                function update_chat_history_date()
                {
                    $('.chat_history').each(function(){
                        var to_user_id = $(this).data('touserid');
                        fetch_user_chat_history(to_user_id);
                    })
                }
                //is_typing set
                $(document).on('focus','.chat_messaage',function(){
                    var is_type = 'yes';
                    $.ajax({
                        url:'update_is_type_status.php',
                        type:'POST',
                        data:{'is_type':is_type},
                        success:function(){

                        }
                    });
                });
                $(document).on('blur','.chat_messaage',function(){
                    var is_type = 'no';
                    $.ajax({
                        url:'update_is_type_status.php',
                        type:'POST',
                        data:{'is_type':is_type},
                        success:function(){

                        }
                    });
                });
                //crope image
                $image_crop = $('#image_demo').croppie({
                    enableExif:true,
                    viewport:{
                        width:200,
                        height:200,
                        type:'square'
                    },
                    boundary:{
                        width:300,
                        height:300
                    }
                });
                $('#insert_image').on('change',function(){
                    var reader = new FileReader();
                    reader.onload = function(event){
                        $image_crop.croppie('bind',{
                            url:event.target.result
                        }).then(function(){
                            console.log('jquery bind compleate');
                        });
                    }
                    reader.readAsDataURL(this.files[0]);
                    $('#insertimageModal').modal('show');
                });
                //update image
                $('.crop_image').click(function(event){
                    $image_crop.croppie('result',{
                        type:'canvas',
                        size:'viewport'
                    }).then(function(response){
                        $.ajax({
                           url:'image_upload.php',
                           type:'POST',
                           data:{'image':response},
                           success:function(data,status){
                            $('#insertimageModal').modal('hide');
                            fetch_profile();
                            $('#insert_image').val('');
                           } 
                        })
                    });
                });
            });
        </script>
    </body>
</html>