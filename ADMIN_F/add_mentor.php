<php
    require "connect.php";

?>
<!DOCTYPE html>
<body>
    <form action='#' method='POST' enctype='multipart/form-data'>
        <input type="file" name="excel">
        <input type="submit" name="submit">

    </form>
    <?php
    if(isset($_FILES['excel']['name'])){
        include "xlsx.php";
        //$temp="../student_document/student_unverified_document"
        $exc=SimpleXLSX::parse($_FILES['excel']['tmp_name']);
        $i=1;
        foreach($exc->rows() as $key =>$row){
            $q='';
            foreach($row as $key => $cell){
                $q.=$cell. "," ;
            }
            $query = "Insert into minfo (".rtrim($q,",").")";
            echo $query;
            $i++;
        }




    }
    ?>
</body>
</html>