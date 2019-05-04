<div class="nav">
                    <div class="container">
                        <h2>Online<span>Jobs</span></h2>
                        <ul>
                          <li>
                              <form class="Serch" method="get" action="Searchresult.php">
                                  <input required="required" name="search" type="search" placeholder="Search" minlength="3">
                                      <input name="submit" type="submit" value="Search">
                                  </form>
                                </li>
                                <li><a href="Home.php">Home</a></li>
                            <li><a href="TurnPages.php?page=1">Browes Job</a></li>
                            <li><a href="Advicepage.php?pageid=1">Career Advice</a></li>
                            <li><a href="Site_page.php?page=About_us">About us</a></li>
                            <?php
                            if(!isset($_SESSION['username']))
                            echo '<li><a href="Login.php">Login</a></li>';
                            else if ($_SESSION['user_type'] == 2 || $_SESSION['user_type']==3){
                            echo'<li><a href="Site_page.php?page=Profile">Profile</a></li>';
                            echo ' <li><a href="logout.php">Logout</a></li>';
                            }
                            if(@$_SESSION['username']=='admin@g.com'){
                                echo ' <li><a href="maintain.php">maintain</a></li>';
                                echo ' <li><a href="logout.php">Logout</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            


