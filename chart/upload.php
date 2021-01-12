<?php 
    include 'connect.php';
    include 'Excel/reader.php';

    global $db;


    $target = basename($_FILES['file_excel']['name']);
    move_uploaded_file($_FILES['file_excel']['tmp_name'], $target);

    chmod($_FILES['file_excel']['name'], 0777);

    $data = new Spreadsheet_Excel_Reader();
    $data->Spreadsheet_Excel_Reader($_FILES['file_excel']['name'], false);
    $total_row = $data->rowcount($sheet_index = 0);

    $done = 0;

    $db = new Database();
    for($i = 0; $i <= $total_row; $i++){
        $name = $data->val(i, 1);
        $nim = $data->val(i, 2);
        $gender = $data-> val(i,3);
        $faculty = $data-> val(i, 4);

        if($name !== "" && $nim !== "" && $gender !== "" && $faculty !== ""){
            $db->insert_student_data($name, $nim, $gender, $faculty);
            $done++;
        }
    }

    unlink($_FILES['file_excel']['name']);

    header("location:index.php?done=$done");
?>