<script src="../Resources/js/Notifiecation.js"></script>
<?php
session_start();
if (isset($_SESSION['username'])) {
    if ($_POST) {
        if (isset($_POST['submit']) AND $_POST['submit'] == 'Apply') {
            $name = array(
                0 => 'Firstname',
                1 => 'Lastname',
                2 => 'Email',
                3 => 'BirthDay',
                4 => 'Phone',
                5 => 'Country',
                6 => 'EXP',
                7 => 'Skills',
                8 => 'Previous_Job'
            );
            $info = array(
                0 => $_POST['Firstname'],
                1 => $_POST['Lastname'],
                2 => $_POST['Email'],
                3 => $_POST['BirthDay'],
                4 => $_POST['Phone'],
                5 => $_POST['Country'],
                6 => $_POST['EXP'],
                7 => $_POST['Skills'],
                8 => $_POST['Previous_Job']
            );
            try {
                include '../model/PDFCLASS.php';
                include '../model/getjob.php';
                $update = new getjob();
                $data = $update->GetDatabyID("users", "user_id",$_SESSION['ID']);
                
                $pdf = new PDFCLASS();
                $pdf->setdata($info[0], $info[1]);
                $pdf->Cont($data);
                $pdf->info($info, $name);
                $rand = rand(0, 99999);
                @$path = '../Resources/Images/uploads/PDFS/' . $rand . $array[2] . '.pdf';
                $pdf->Output('F', $path);
                $update->UpdateByID("users", "cv", $path, "user_id", $_SESSION['ID']);
                echo '<script type="text/javascript">notifyMe("CV uploaded!","You Have Succsfuly Uploaded your CV");</script>';
                echo '<script type="text/javascript">Redirect("../View/Site_page.php?page=Profile");</script>';
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        }
    }
} else {
    header("Location:../View/Login.php");
}
?>
