<?php 
    class Database{

        var $host = "127.0.0.1";
        var $db = "malasngoding";
        var $user = "root";
        var $pass = "daff";
        var $link;        


        function __construct(){
            try{
                $this->link = new PDO("mysql:host=$this->host;dbname=$this->db", "$this->user", "$this->pass");
                $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (PDOException $e) {
                print("Koneksi atau query bermasalah" . $e->getMessage() . "<br>");
            }
        }

        function register_admin($username, $password, $first_name, $level){
            $query = "INSERT INTO admin VALUES(NULL,:username, :password, :first_name, :level)";
            $email_check = "SELECT * FROM admin WHERE username=:username";
            $stmt_email = $this->link->prepare($email_check);
            $stmt_register  = $this->link->prepare($query);
            $stmt_email->execute(array(
                ":username" => $username,
            ));
            $check = ($stmt_email->rowCount() > 0) ? TRUE : FALSE;
            if(!$check){
                $stmt_register->execute(array(
                    ":username" => $username,
                    ":password" => $password,
                    ":first_name" => $first_name,
                    ":level" => $level
                ));
    
                header("location:form.php?m=success");
            }else {
                header("location:form.php?m=email_used");
            }
        }

        function login_admin($username, $password){
            $query = "SELECT * FROM admin WHERE username=:username AND password=:password";
            $stmt = $this->link->prepare($query);
            $stmt->execute(array(
                ":username" => $username,
                ":password" => $password,
            ));

            $check = ($stmt->rowCount() > 0) ? true : false;
            print($check);
            if($check){
                session_start();

                while($data = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $first_name = $data['first_name'];
                    $email = $data['username'];
                    $level = $data['level'];
                    $user_id = $data['id'];
                }
                $_SESSION['first_name'] = $first_name;
                $_SESSION['email'] = $email;
                $_SESSION['status'] = 'login';
                $_SESSION['level'] = $level;
                $_SESSION['id'] = $user_id;
                header("location:index.php");
                
            }else{
                header("location:login.php?m=failed");
            }
        }

        function delete_account($id){
            $query = "DELETE FROM admin WHERE id=:id";
            $stmt = $this->link->prepare($query);
            $stmt->execute(array(
                ":id" => $id,
            ));
            
            header("location:login.php");
        }

    }
?>