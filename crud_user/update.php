<?php 
    include 'connection.php';

    if(isset($_POST['id']) && 
    isset($_POST['name']) && 
    isset($_POST['address']) && 
    isset($_POST['job'])){

        $user_id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $job = $_POST['job'];
        $age = $_POST['age'];
        $form_field = "&id=$user_id&name=$name&address=$address&job=$job&age=$age";

        if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['job']) || empty($_POST['age'])){
            header('location:edit.php?error=empty_field'. $form_field);
        }else {
            $edit_query = "UPDATE user SET name=:name, address=:address, job=:job, age=:age WHERE id=:id";
            $stmt = $host->prepare($edit_query);
            $stmt->execute(array(
                ":id" => $user_id,
                ":name" => $name,
                ":address" => $address,
                ":job" => $job,
                ":age" => $age
            ));

            header('location:index.php?message=edit');
        }
    }
?>