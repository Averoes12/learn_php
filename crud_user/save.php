<?php 
    include 'connection.php';

    global $userId;
    $sorter = "SELECT MAX(id) as lastData FROM user";
    $result = $host->query($sorter);
    while($data = $result->fetch(PDO::FETCH_ASSOC)){
        $userId = $data['lastData'];
    }
    
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
            header('location:input.php?error=empty_field'.$form_field);
        }else {
            $userId++;
            $save_query = "INSERT INTO user VALUES(:id, :name, :address, :job, :age)";
            $stmt = $host->prepare($save_query);
            $stmt->execute(array(
                ':id' => $userId,
                ':name' => $name,
                ':address' => $address,
                ':job' => $job,
                ':age' => $age
            ));
            
            header('location:index.php?message=input');
        }
?>