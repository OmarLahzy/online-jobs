<?php
$Data = new getjob();
$result = $Data->GetAllDataOrderd("about_us", "id", "ASC");
//echo '<pre>';print_r($result);echo '</pre>';
?>
<body>
    <div class="container0">
        <div class="about_us_row">
            <div class="me" >
                <div class="img" id="img1">
                    <img src="../Resources/Images/facebook-avatar.jpg">
                </div>
                <div class="words" id="words1">
                    <p>Name : <?php echo $result[0]['name']; ?></p>
                    <p>Phone : <?php echo $result[0]['phone_code'].$result[0]['phone_num']; ?></p>
                    <p>Accuont : <?php echo $result[0]['email']; ?></p>
                </div>
            </div>
            <div class="me" >
                <div class="img" id="img2">
                    <img src="../Resources/Images/facebook-avatar.jpg">
                </div>
                <div class="words" id="words2">
                    <p>Name : <?php echo $result[1]['name']; ?></p>
                    <p>Phone : <?php echo $result[1]['phone_code'].$result[1]['phone_num']; ?></p>
                    <p>Accuont : <?php echo $result[1]['email']; ?></p>
                </div>
            </div>
            <div class="me" >
                <div class="img" id="img3">
                    <img src="../Resources/Images/facebook-avatar.jpg">
                </div>
                <div class="words" id="words3">
                    <p>Name : <?php echo $result[2]['name']; ?></p>
                    <p>Phone : <?php echo $result[2]['phone_code'].$result[2]['phone_num']; ?></p>
                    <p>Accuont : <?php echo $result[2]['email']; ?></p>
                </div>
            </div>
        </div>
        <div class="about_us_row">
            <div class="me" >
                <div class="img" id="img4">
                    <img src="../Resources/Images/facebook-avatar.jpg">
                </div>
                <div class="words" id="words4">
                    <p>Name : <?php echo $result[3]['name']; ?></p>
                    <p>Phone : <?php echo $result[3]['phone_code'].$result[3]['phone_num']; ?></p>
                    <p>Accuont : <?php echo $result[3]['email']; ?></p>
                </div>
            </div>
            <div class="me" >
                <div class="img" id="img5">
                    <img src="../Resources/Images/facebook-avatar.jpg">
                </div>
                <div class="words" id="words5">
                    <p>Name : <?php echo $result[4]['name']; ?></p>
                    <p>Phone : <?php echo $result[4]['phone_code'].$result[4]['phone_num']; ?></p>
                    <p>Accuont : <?php echo $result[4]['email']; ?></p>
                </div>
            </div>
            
        </div>
    </div>
</body>