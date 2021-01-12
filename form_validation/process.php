<?php
    include 'connect.php';
    global $db;
    global $first_name;
    global $last_name;
    global $email;
    global $password;

    if(isset($_GET['a'])){
        $action = $_GET['a'];
        if($action === 'register'){
            if (isset($_POST['email']) && isset($_POST['first_name']) && isset($_POST['last_name'])&& isset($_POST['password']) && isset($_POST['level'])) {
                $first_name = strip_tags($_POST['first_name']);
                $last_name =  htmlspecialchars($_POST['last_name']);
                $email  =  strip_tags($_POST['email']);
                $password =  strip_tags($_POST['password']);
                $level = strip_tags(strtolower($_POST['level']));
                $form_field = "&email_value=$email&first_name=$first_name&last_name=$last_name&level=$level";

            }
            if (empty($_POST['email']) || 
            empty($_POST['first_name']) || 
            empty($_POST['last_name']) ||
            empty($_POST['password']) ||
            empty($_POST['level'])) {
        
                header("location:form.php?error=email_kosong". $form_field);
            }else {
                if (is_numeric($_POST['first_name']) || is_numeric($_POST['last_name']) || is_numeric($_POST['level'])) {
                    header("location:form.php?error=nama_harus_huruf". $form_field);
                }else {
                    $db = new Database();
                    $db->register_admin($email, $password, $first_name, $level);
                }
            }
        }else if($action === "login"){
            if(isset($_POST['email']) && isset($_POST['password'])){
                $email  =  strip_tags($_POST['email']);
                $password =  strip_tags($_POST['password']);
                $form_field = "&email_value=$email";
            }
            if(empty($_POST['email']) || empty($_POST['password'])){
                header("location:login.php?error=empty_field".$form_field);
            }else {
                $db = new Database();
                $db->login_admin($email, $password);
            }
         }else if($action === "logout"){
             session_start();

             session_destroy();

             header("location:login.php");
         }else if($action === "delete"){
             if(isset($_GET['id'])){
                 $user_id = $_GET['id'];
                 $db = new Database();
                 $db->delete_account($user_id);
                 
                 session_destroy();
             }
         }
    }
?>