<?php
include '../model/Advice.php';
include 'HTML_B.php';
include 'Header.php';
include 'nav_bar.php';

$info = new advice();
$count = $info->GetAllDataOrderd('advice', 'advice_id', 'DESC');
//echo '<pre>';   print_r($count);   echo '</pre>';
$x = count($count)/20;
if(gettype($x) == 'double')
    $x = $x+1;
$next = 1;
$n = 1;
if(isset($_GET['next']))
    $n = $_GET['next'];
if($n < $x)
    $next = $n;
$advice = $info->GetDataByLIMIT('advice', $next);
?>
<div class = "container">
    <?php
    if(isset($_SESSION['username']))
    {
        echo 
        '<div class="post">
            <form action="../Controller/adviceController.php?id='.$_SESSION['ID'].'" method="POST">
                <textarea id="textarea" name="advice_cont"placeholder="Add Advice"></textarea>
                <input class="com" type="submit" name="add_advice" value="Add Advice" style="cursor: pointer" />
            </form>
        </div>';    
    }
    ?>
    <?php
    for($i=0;$i<count($advice);$i++) 
    {    $adv;
        $advior = $info->advisor_info($advice[$i]['advisor']);
        echo '<div class="post">';
            echo '<div class="pic_name">';
                echo '<img id="picture" src="' . $advior[0]['profile_pic'] . '" />';
                echo '<p id="name">'. $advior[0]['first_name'] . ' ' .$advior[0]['last_name'] .'</p>';
                echo '<p id="time">'.$advice[$i]['advice_time'].'</p>';
            echo '</div>';
            echo '<div class="advice">';
                echo '<textarea id="textarea" readonly>'.$advice[$i]['advice_cont'].'</textarea>';
            echo '</div>';
            echo '<div class="clear"></div>';
            if(isset($_SESSION['username']))
            {
                echo '<div style="margin-top: 15px;margin-bottom: 15px;overflow: hidden;">';
                    echo '<form action="../Controller/adviceController.php?id='.$_SESSION['ID'].'&advice_id='.$advice[$i]['advice_id'].'" method="POST">';
                        echo '<textarea name="comment" id="textarea" placeholder="Add Comment" style="margin-bottom: 15px;" ></textarea>';
                        echo '<input class="com" type="submit" name="add_comment" value="Add Comment"  style="cursor: pointer" >';
                    echo '</form>';
                echo '</div>';
            }
            echo '<div class="comments">';
            $comments = $info->show_comment($advice[$i]['advice_id']);
            if(count($comments)>0)
            {
                foreach ($comments as $key => $comm) 
                {
                    $commenter = $info->advisor_info($comm['commenter']);
                    echo '<div>';
                        echo '<div class="pic_name2">';
                            echo '<img id="picture2" src="'.$commenter[0]['profile_pic'].'"/>';
                            echo '<div class="clear"></div>';
                        echo '</div>';
                        echo '<div class="advice2">';
                            echo '<div style="margin-top: 10px;"><a style="text-decoration: none;color: black;" href="#">' .$commenter[0]['first_name'] . ' ' .$commenter[0]['last_name'] . '</a></div>';
                            echo '<textarea id="textarea2" readonly>' . $comm['comment_cont'] . '</textarea>';
                        echo '</div>';
                        echo '<div class="clear"></div>';
                    echo '</div>';
                }
            }
            echo '</div>';
        echo '</div>';
    }
    ?>
</div>
<div class="container">
    <div class="nexts">
        <?php
            for($i=1;$i<=$x;$i++)
                echo '<a href="Advicepage.php?next='.$i.'" >'.$i.'</a>';
        ?>
    </div>
</div>
<?php
/*
echo '<div class="paginate paginate-dark wrapper">';
echo '<ul>';
echo '<li><a href="TurnPages.php?pageid='.($_GET['pageid']-1).'">Previous Page</a></li>';
for($i=1;$i<6;$i++){
    echo '<li><a href="Advicepage.php?pageid='.$i.'">Page'.$i.'</li>';
}
echo '<li><a href="Advicepage.php?pageid='.($_GET['pageid']+1).'">Next Page</a></li>';
echo '</ul>';
echo '<div class="Clear"></div>';
echo '</div>';
 */
include 'Footer.php';
?>