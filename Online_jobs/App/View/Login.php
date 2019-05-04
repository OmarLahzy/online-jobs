<script src="../Resources/js/Notifiecation.js" type="text/javascript"></script>
<?php
session_start();
if (isset($_SESSION['username'])) {
    echo '<script type="text/javascript">notifyMe("You are already login!", " ");</script>';
    echo '<script type="text/javascript">Redirect("Home.php");</script>';
}
?>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../Resources/css/Style.css" type="text/css">
        <script type="text/javascript">
            function show() {

                document.getElementById('log').style.display = 'none';
                document.getElementById('re').style.display = 'block';
            }
            ;
            function heid() {
                document.getElementById('log').style.display = 'block';
                document.getElementById('re').style.display = 'none';
            }
            ;
            function Restore() {
                document.getElementById('log').style.display = 'none';
                document.getElementById('Restore').style.display = 'block';
            }
            ;
            function Restore2() {
                document.getElementById('Restore').style.display = 'none';
                document.getElementById('log').style.display = 'block';
            }
            ;
        </script>  
        <script type= "text/javascript" src = "../Resources/js/countries.js"></script> 
    </head>
    <body>
        <div class="login-page">
            <div class="form">
                <form  action="../Controller/Registercontroller.php" method="post" class="register-form"  id="re" enctype="multipart/form-data">
                    <h2>Register</h2>
                    <input name="user_email" required="required" type="Email" placeholder="E-mail" maxlength="255">
                    <input name="user_Fname" required="required" type="text" placeholder="First Name" minlength="3" maxlength="16">
                    <input name="user_Lname" required="required" type="text" placeholder="Last Name" minlength="3" maxlength="16">
                    <input name="user_pass" required="required" type="password" placeholder="password" minlength="10" maxlength="18">
                    <select id="country" name="contry"></select>
                    <select id="state" name="town"></select>
                    <script language="javascript">
                        populateCountries("country", "state");
                    </script>
                    <input name="user_birthday" required="required" type="date">
                    <select name="user_gender">
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                        <option >Other</option>
                    </select>
                    <input name="user_phone" required="required" type="number" placeholder="Phone number" minlength="8" maxlength="25">  
                    <select name="user_code">
                        <?php
                        $countryCallingCodes = array
                            (
                            93 => "Afghanistan",
                            355 => "Albania",
                            213 => "Algeria",
                            1 => "American Samoa",
                            376 => "Andorra",
                            244 => "Angola",
                            1 => "Anguilla",
                            1 => "Antigua and Barbuda",
                            54 => "Argentina",
                            374 => "Armenia",
                            297 => "Aruba",
                            247 => "Ascension",
                            61 => "Australia",
                            43 => "Austria",
                            994 => "Azerbaijan",
                            1 => "Bahamas",
                            973 => "Bahrain",
                            880 => "Bangladesh",
                            1 => "Barbados",
                            375 => "Belarus",
                            32 => "Belgium",
                            501 => "Belize",
                            229 => "Benin",
                            1 => "Bermuda",
                            975 => "Bhutan",
                            591 => "Bolivia",
                            387 => "Bosnia and Herzegovina",
                            267 => "Botswana",
                            55 => "Brazil",
                            1 => "British Virgin Islands",
                            673 => "Brunei",
                            359 => "Bulgaria",
                            226 => "Burkina Faso",
                            257 => "Burundi",
                            855 => "Cambodia",
                            237 => "Cameroon",
                            1 => "Canada",
                            238 => "Cape Verde",
                            1 => "Cayman Islands",
                            236 => "Central African Republic",
                            235 => "Chad",
                            56 => "Chile",
                            86 => "China",
                            57 => "Colombia",
                            269 => "Comoros",
                            242 => "Congo",
                            682 => "Cook Islands",
                            506 => "Costa Rica",
                            385 => "Croatia",
                            53 => "Cuba",
                            357 => "Cyprus",
                            420 => "Czech Republic",
                            243 => "Democratic Republic of Congo",
                            45 => "Denmark",
                            246 => "Diego Garcia",
                            253 => "Djibouti",
                            1 => "Dominica",
                            1 => "Dominican Republic",
                            670 => "East Timor",
                            593 => "Ecuador",
                            20 => "Egypt",
                            503 => "El Salvador",
                            240 => "Equatorial Guinea",
                            291 => "Eritrea",
                            372 => "Estonia",
                            251 => "Ethiopia",
                            500 => "Falkland (Malvinas) Islands",
                            298 => "Faroe Islands",
                            679 => "Fiji",
                            358 => "Finland",
                            33 => "France",
                            594 => "French Guiana",
                            689 => "French Polynesia",
                            241 => "Gabon",
                            220 => "Gambia",
                            995 => "Georgia",
                            49 => "Germany",
                            233 => "Ghana",
                            350 => "Gibraltar",
                            30 => "Greece",
                            299 => "Greenland",
                            1 => "Grenada",
                            590 => "Guadeloupe",
                            1 => "Guam",
                            502 => "Guatemala",
                            224 => "Guinea",
                            245 => "Guinea-Bissau",
                            592 => "Guyana",
                            509 => "Haiti",
                            504 => "Honduras",
                            852 => "Hong Kong",
                            36 => "Hungary",
                            354 => "Iceland",
                            91 => "India",
                            62 => "Indonesia",
                            870 => "Inmarsat Satellite",
                            98 => "Iran",
                            964 => "Iraq",
                            353 => "Ireland",
                            972 => "Israel",
                            39 => "Italy",
                            225 => "Ivory Coast",
                            1 => "Jamaica",
                            81 => "Japan",
                            962 => "Jordan",
                            7 => "Kazakhstan",
                            254 => "Kenya",
                            686 => "Kiribati",
                            965 => "Kuwait",
                            996 => "Kyrgyzstan",
                            856 => "Laos",
                            371 => "Latvia",
                            961 => "Lebanon",
                            266 => "Lesotho",
                            231 => "Liberia",
                            218 => "Libya",
                            423 => "Liechtenstein",
                            370 => "Lithuania",
                            352 => "Luxembourg",
                            853 => "Macau",
                            389 => "Macedonia",
                            261 => "Madagascar",
                            265 => "Malawi",
                            60 => "Malaysia",
                            960 => "Maldives",
                            223 => "Mali",
                            356 => "Malta",
                            692 => "Marshall Islands",
                            596 => "Martinique",
                            222 => "Mauritania",
                            230 => "Mauritius",
                            262 => "Mayotte",
                            52 => "Mexico",
                            691 => "Micronesia",
                            373 => "Moldova",
                            377 => "Monaco",
                            976 => "Mongolia",
                            382 => "Montenegro",
                            1 => "Montserrat",
                            212 => "Morocco",
                            258 => "Mozambique",
                            95 => "Myanmar",
                            264 => "Namibia",
                            674 => "Nauru",
                            977 => "Nepal",
                            31 => "Netherlands",
                            599 => "Netherlands Antilles",
                            687 => "New Caledonia",
                            64 => "New Zealand",
                            505 => "Nicaragua",
                            227 => "Niger",
                            234 => "Nigeria",
                            683 => "Niue Island",
                            850 => "North Korea",
                            1 => "Northern Marianas",
                            47 => "Norway",
                            968 => "Oman",
                            92 => "Pakistan",
                            680 => "Palau",
                            507 => "Panama",
                            675 => "Papua New Guinea",
                            595 => "Paraguay",
                            51 => "Peru",
                            63 => "Philippines",
                            48 => "Poland",
                            351 => "Portugal",
                            1 => "Puerto Rico",
                            974 => "Qatar",
                            262 => "Reunion",
                            40 => "Romania",
                            7 => "Russian Federation",
                            250 => "Rwanda",
                            290 => "Saint Helena",
                            1 => "Saint Kitts and Nevis",
                            1 => "Saint Lucia",
                            508 => "Saint Pierre and Miquelon",
                            1 => "Saint Vincent and the Grenadines",
                            685 => "Samoa",
                            378 => "San Marino",
                            239 => "Sao Tome and Principe",
                            966 => "Saudi Arabia",
                            221 => "Senegal",
                            381 => "Serbia",
                            248 => "Seychelles",
                            232 => "Sierra Leone",
                            65 => "Singapore",
                            421 => "Slovakia",
                            386 => "Slovenia",
                            677 => "Solomon Islands",
                            252 => "Somalia",
                            27 => "South Africa",
                            82 => "South Korea",
                            34 => "Spain",
                            94 => "Sri Lanka",
                            249 => "Sudan",
                            597 => "Suriname",
                            268 => "Swaziland",
                            46 => "Sweden",
                            41 => "Switzerland",
                            963 => "Syria",
                            886 => "Taiwan",
                            992 => "Tajikistan",
                            255 => "Tanzania",
                            66 => "Thailand",
                            228 => "Togo",
                            690 => "Tokelau",
                            1 => "Trinidad and Tobago",
                            216 => "Tunisia",
                            90 => "Turkey",
                            993 => "Turkmenistan",
                            1 => "Turks and Caicos Islands",
                            688 => "Tuvalu",
                            256 => "Uganda",
                            380 => "Ukraine",
                            971 => "United Arab Emirates",
                            44 => "United Kingdom",
                            1 => "United States of America",
                            1 => "U.S. Virgin Islands",
                            598 => "Uruguay",
                            998 => "Uzbekistan",
                            678 => "Vanuatu",
                            379 => "Vatican City",
                            58 => "Venezuela",
                            84 => "Vietnam",
                            681 => "Wallis and Futuna",
                            967 => "Yemen",
                            260 => "Zambia",
                            263 => "Zimbabwe"
                        );
                        foreach ($countryCallingCodes as $key => $value) {
                            echo '<option value = "' . $key . '">' . $value . ' - ' . $key . '</option>';
                        }
                        ?>
                    </select>
                    <h3>What is Your Favouirt Food : </h3>
                    <input required="rquired"name="user_answer" type="text" placeholder="Enter your Answer" minlength="3" maxlength="100">
                    <select name="user_type">
                        <option value="3">Company</option>
                        <option value="2">Employee</option>
                    </select>
                    <input style="background-color: #4CAF50" name="submit" type="submit" value="Register">
                    <p class="message">Already registered? <a href="#" onclick="heid();" >Sign In</a></p>
                </form>
                <form action="../Controller/LoginController.php" method="post" class="login-form" id="log">
                    <h2>Login</h2>
                    <input name="user_email" required="required" type="Email" placeholder="E-mail" maxlength="255">
                    <input name="user_pass" required="required" type="password" placeholder="password" maxlength="18">
                    <input style="background-color: #4CAF50" name="submit" type="submit" value="Login">
                    <p class="message">Not registered? <a href="#" onclick="show();">Create an account</a></p>
                    <p class="message">Forget Password? <a href="#" onclick="Restore();">Restore password</a></p>
                </form>
                <form action="../Controller/CheckuserController.php" method="post" id="Restore" class="Restor-form" style="display: none;">
                    <h2>Restore Password</h2>
                    <input name="user_email" required="required" type="Email" placeholder="E-mail" maxlength="255">
                    <h3>What is Your Favouirt Food : </h3>
                    <input required="rquired" name="user_answer" type="text" placeholder="Enter your Answer">
                    <h3>NewPassword</h3>
                    <input name="user_pass" required="required" type="password" placeholder="NewPassword" minlength="10" maxlength="18">
                    <input style="background-color: #4CAF50" name="submit" type="submit" value="Restore">
                    <p class="message">Already have an Account? <a href="#" onclick="Restore2();">Login</a></p>
                </form>
            </div>
        </div> 
    </body>
</html>
