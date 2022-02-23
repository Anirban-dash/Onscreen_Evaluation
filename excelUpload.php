<?php


require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
require('conn.php');


if(isset($_POST['submit'])){
  echo $_FILES['file'];

  $mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  if(in_array($_FILES["file"]["type"],$mimes)){


    $uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);


    $Reader = new SpreadsheetReader($uploadFilePath);


    $totalSheet = count($Reader->sheets());


    echo "You have total ".$totalSheet." sheets".


    $html="<table border='1'>";
    $html.="<tr><th>Title</th><th>Description</th></tr>"; 


    /* For Loop for all sheets */
    for($i=0;$i<$totalSheet;$i++){


      $Reader->ChangeSheet($i);


      foreach ($Reader as $Row)
      {
        $name = isset($Row[0]) ? $Row[0] : 'null';
        $pass = isset($Row[1]) ? $Row[1] : 'null';
        $branch = isset($Row[2]) ? $Row[2] : 'null';
        $mail= isset($Row[3]) ? $Row[3] : 'null';
        $fac_list="INSERT INTO `student` (`name`, `mail`, `pass`,`branch`) VALUES ('$name', '$mail', '$pass','$branch')";
        $fac_res=mysqli_query($con,$fac_list) or die(mysqli_error($con));

        // $query = "insert into tbl_info(name,description) values('".$title."','".$description."')";


        // $mysqli->query($query);
       }


    }

    header("location:add_by_excel.php");


  }else { 
    die("<br/>Sorry, File type is not allowed. Only Excel file. ".$_FILES["file"]["type"]); 
  }


}else{
  echo "Ummm..";
}


?>