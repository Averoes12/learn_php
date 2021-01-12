<?php 
    include 'connect.php';
    global $db;

    global $user_id;
    global $name;
    global $address;
    global $job;
    global $form_field;

    if(isset($_POST['name']) && 
        isset($_POST['address']) && 
        isset($_POST['job']) && isset($_POST['age'])){

         $name = $_POST['name'];
         $address = $_POST['address'];
         $job = $_POST['job'];
         $age = $_POST['age'];
         $form_field = "&name=$name&address=$address&job=$job&age=$age";
        }

    if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['job']) || empty($_POST['age'])){
        if(!empty($_GET['id']) && !empty($_GET['a'])){
            $db = new database();
            $action = $_GET['a'];
            if($action === "delete"){
                $id = $_GET['id'];
                $db->delete_data($id);
            }
        }else {
            header('location:input.php?error=empty_field'.$form_field);
        }
    }else {
        $db = new database();
        $action = $_GET['a'];
        if($action === 'input'){
            generate_user_id();
            $db->input_data($user_id, $name, $address,$job, $age);
        }else if($action === "edit"){
            if(isset($_POST['id'])){
                $id = $_POST['id'];
                $db->edit_data($id, $name, $address,$job, $age);
            }
        }
    }

    // $user_id = 1;
    function generate_user_id(){
        $db = new database();
        $query = "SELECT MAX(id) as lastId FROM user";
        $stmt = $db->link->prepare($query);
        $stmt->execute();
        while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
            $user_id = $data['lastId'];
        }
        return $user_id;
    }
?>