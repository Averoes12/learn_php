<?php 
    class Database {
        var $host = "127.0.0.1";
        var $db = "malasngoding";
        var $user = "root";
        var $pass = "daff";
        var $link;

        function __construct(){
            try{
               $this-> link = new PDO("mysql:host=$this->host;dbname=$this->db", "$this->user", "$this->pass");
               $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (PDOException $e) {
                print("Koneksi atau query bermasalah " . $e->getMessage() . "<br>");
            }
        }

        function show_all_student()
        {
            $query = "SELECT * FROM mahasiswa";
            $stmt = $this->link->prepare($query);
            $stmt->execute();
            
            while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
                $result[] = $data;
            }
            return $result;
        }

        function show_student_by_faculty($faculty){
            $query = "SELECT * FROM mahasiswa WHERE faculty=:faculty";
            $stmt = $this->link->prepare($query);
            $stmt->execute(array(
                ":faculty" => $faculty,
            ));
            $total = $stmt->rowCount();
            return print($total);
        }

        function show_student_by_gender($gender){
            $query = "SELECT * FROM mahasiswa WHERE gender=:gender";
            $stmt = $this->link->prepare($query);
            $stmt->execute(array(
                ":gender" => $gender,
            ));
            $total = $stmt->rowCount();
            return print($total);
        }

        function insert_student_data($name, $nim, $gender, $faculty){
            $query = "INSERT INTO mahasiswa VALUES(:name, :nim, :gender, :faculty)";
            $stmt = $this->link->prepare($query);
            $stmt->execute(array(
                ":name" => $name,
                ":nim" => $nim,
                ":gender" => $gender,
                ":faculty" => $faculty
            ));
            
        }
    }
 ?>