<?php
include '../model/Advice.php';
//print_r($_POST);
if($_POST)
{
    
    $advice = new advice();
    if(isset($_POST['add_advice']))
    {
        $advice_cont = filter_var($_POST['advice_cont'],FILTER_SANITIZE_STRING);
        if($advice_cont != '')
        {
            $advice->add_advice($advice_cont, $_GET['id']);
        }
        header('Location:../View/Advicepage.php');
    }
    
    $advice_comment = filter_var($_POST['add_comment'],FILTER_SANITIZE_STRING);
    if(isset($advice_comment))
    {
        if($_POST['comment']!= '')
        {
            $advice->add_comment($advice_comment, $_GET['advice_id'], $_GET['id']);
        }
        header('Location:../View/Advicepage.php');
    }
}