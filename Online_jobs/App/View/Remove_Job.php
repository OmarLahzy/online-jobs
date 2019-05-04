<?php
//session_start();
if(@$_SESSION['username'] == 'admin@g.com'){
 include '../model/getjob.php';
 $users = new getjob();
 $user_array = $users->GetAllDataOrderd("job_info", "job_id","DESC");
 $id = @$_GET['id'];
 if($users->Deleteuser("job_info", "job_id", $id)){
     header("maintain.php?page=Remove_Job");
     header("maintain.php?page=Remove_Job");
 }  
} else {
             echo '<script type="text/javascript">notifyMe("You Dont have Permission!","Not!!");</script>';
            echo '<script type="text/javascript">Redirect("../View/Home.php?page=Profile");</script>';
}
?>
 <table class="table table-hover table-bordered sectionTable">
    <tr class="danger">
        <th>Categorie ID</th>
        <th>Categorie Name</th>
        <th>Action</th>
    </tr>
    <?php
    for ($i = 0; $i < @count($user_array); $i++) {
        echo "            
                <tr>
                    <td>{$user_array[$i]['job_id']}</td>
                    <td>{$user_array[$i]['job_name']}</td>

                    <td>
                        <a href='?page=Remove_job&id={$user_array[$i]['job_id']}'><img src='../Resources/Images/delete.png' alt='Delete'></a>
                    </td>
                </tr>
            ";
        }
    ?>
    
</table>
