<?php
if($_GET){
    if(isset($_GET['submit']) and $_GET['submit'] == 'Search'){
        $keyword = filter_var($_GET['search'] , FILTER_SANITIZE_STRING);        
        try {
            include '../model/Search.php';
            
            $Search = new Search();
            $Search->SetData($keyword);
            $result = $Search->Select();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
?>

