<?php 
    class database {
        var $host = "127.0.0.1";
        var $db = "malasngoding";
        var $username = "root";
        var $pass = "daff";
        var $link;

        function __construct(){
            try{
                $this->link = new PDO(
                    "mysql:host=$this->host;dbname=$this->db", 
                    "$this->username", "$this->pass"
                );
                $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (PDOException $e) {
                print("Koneksi atau query bermasalah" . $e->getMessage(). "<br>");
            }
        }
        function upload_image($files){

            $query = "INSERT INTO upload VALUES(NULL, '$files')";
            $result = $this->link->query($query);
           
            header("location:index.php?alert=success");
        }

        function show_all_image(){
            $query = "SELECT * FROM upload";
            $stmt = $this->link->prepare($query);
            $stmt->execute();

            $images;

            while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
                $images[] = $data;
            }
            return !empty($images) ? $images : [];
        }

        function delete_image($id){
            $query = "DELETE FROM upload WHERE id=:id";
            $stmt = $this->link->prepare($query);
            $stmt->execute(array(
                ":id" => $id
            ));

            header("location:index.php?alert=success_delete");
        }
    }
?>