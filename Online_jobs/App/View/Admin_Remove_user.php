<?php
//session_start();
if (@$_SESSION['username'] == 'admin@g.com') {
    include '../model/getjob.php';
    $users = new getjob();
    $user_array = $users->GetAllDataOrderd("users", "user_id", "DESC");
    $id = @$_GET['id'];
    if ($users->Deleteuser("users", "user_id", $id)) {
        header("maintain.php?page=Admin_Remove_user");
    }
} else {
    echo '<script type="text/javascript">notifyMe("You Dont have Permission!","Not!!");</script>';
    echo '<script type="text/javascript">Redirect("../View/Home.php?page=Profile");</script>';
}
?>
<table class="table table-hover table-bordered sectionTable">
    <tr class="danger">
        <th>user_id</th>
        <th>email</th>
        <th>first_name</th>
        <th>Last_name</th>
        <th>password</th>
        <th>country</th>
        <th>town</th>
        <th>Gender</th>
        <th>Phone_num</th>
        <th>phone_Code</th>
        <th>answer</th>
        <th>profile_pic</th>
        <th>CV</th>
        <th>User_type</th>
        <th>Action</th>
    </tr>
    <?php
    for ($i = 0; $i < @count($user_array); $i++) {
        echo "            
                <tr>
                    <td>{$user_array[$i]['user_id']}</td>
                    <td>{$user_array[$i]['email']}</td>
                    <td>{$user_array[$i]['first_name']}</td>
                    <td>{$user_array[$i]['last_name']}</td>
                    <td>{$user_array[$i]['password']}</td>
                    <td>{$user_array[$i]['country']}</td>
                    <td>{$user_array[$i]['town']}</td>
                    <td>{$user_array[$i]['gender']}</td>
                    <td>{$user_array[$i]['phone_num']}</td>
                    <td>{$user_array[$i]['phone_code']}</td>
                        <td>{$user_array[$i]['answer']}</td>
                    <td>{$user_array[$i]['profile_pic']}</td>
                    <td>{$user_array[$i]['cv']}</td>
                    <td>{$user_array[$i]['user_type']}</td>
                    <td>
                        <a href='?page=Admin_Remove_user&id={$user_array[$i]['user_id']}'><img src='../Resources/Images/delete.png' alt='Delete'></a>
                    </td>
                </tr>
            ";
    }
    ?>

</table>