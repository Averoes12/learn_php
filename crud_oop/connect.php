<?php 

class database {
    var $host = "127.0.0.1";
    var $db = "malasngoding";
    var $username = "root";
    var $pass = "daff";
    var $link;
    var $total_data;

    function __construct(){
        try{
            $this->link = new PDO("mysql:host=$this->host;dbname=$this->db", "$this->username", "$this->pass");
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e) {
            print("koneksi atau query bermsalah ".$e->getMessage()."<br>");
        }

    }

    function show_all_data(){
        $query = "SELECT * FROM user";
        $stmt = $this->link->prepare($query);
        return $total_data = $stmt->rowCount($stmt->execute());
    }

    function show_limit_data($limit_start, $limit_end){
        $query = "SELECT * FROM user LIMIT $limit_start, $limit_end";
        $stmt = $this->link->prepare($query);
        $stmt->execute();
        while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result[] = $data;
        }
        return $result;
    }

    function show_by_id($id){
        $query = "SELECT * FROM user WHERE id=:id";
        $stmt = $this->link->prepare($query);
        $stmt->execute(array(
            ":id" => $id
        ));
        while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result[] = $data;
        }
        return $result;
    }

    function input_data($id, $name, $address, $job, $age){
        $query = "INSERT INTO user VALUES(:id, :name, :address, :job, :age)";
        $stmt = $this->link->prepare($query);
        $stmt->execute(array(
            ":id" => $id,
            ":name" => $name,
            ":address" => $address,
            ":job" => $job,
            ":age" => $age
        ));
        header("location:index.php?message=added");
    }

    function edit_data($id, $name, $address, $job, $age){
        $query = "UPDATE user SET name=:name, address=:address, job=:job, age=:age WHERE id=:id";
        $stmt = $this->link->prepare($query);
        $stmt->execute(array(
            ":id" => $id,
            ":name" => $name,
            ":address" => $address,
            ":job" => $job,
            ":age" => $age

        ));

        header("location:index.php?message=edited");
    }

    function delete_data($id){
        $query = "DELETE FROM user WHERE id=:id";
        $stmt = $this->link->prepare($query);
        $stmt->execute(array(
            ":id" => $id
        ));

        header("location:index.php?message=deleted");
    }
}

?>