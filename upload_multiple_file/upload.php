<?php 
    include 'connect.php';
    global $db;
    

    $limit_size = 10 * 1024 * 1024;
    $extention = array('png', 'jpg', 'jpeg', 'gif', 'svg');
    $total_file = count($_FILES['foto']['name']) ;

    for($x = 0; $x < $total_file; $x++){
        $file_name = $_FILES['foto']['name'][$x];
        $tmp = $_FILES['foto']['tmp_name'][$x];
        $file_type = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_size = $_FILES['foto']['size'][$x];
        if($file_size > $limit_size){
            header("location:index.php?alert=max_size");
        }else {
            if(!in_array($file_type, $extention)){
                header("location:index.php?alert=error_type");
            }else {
                $db = new database();
                move_uploaded_file($tmp, 'image/'.date("d-m-y")."-" . $file_name);
                $image_format = date("d-m-y") . "-" . $file_name;
                $db->upload_image($file_name);
            }
        }
    }

    if(isset($_POST['id'])){
        $db= new database();
        $image_id = $_POST['id'];
        $db->delete_image($image_id);
    }

?>