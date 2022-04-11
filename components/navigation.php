<?php
    include_once "nav_bar.php";
    session_start();


    function navigation(){

        $user_name = '';
        // check if the user is logged in
        if (!empty($_SESSION['user_id'])) {
            $user_name = "Welcome, " . $_SESSION['user_name'];
            $str = "<li><a class=\"dropdown-item\" href='../user_auth/logout.php'>Sign Out</a></li>";
        }
        else {
            $str1 = "<li><a class=\"dropdown-item\" href='../user_auth/login.php'>Sign In</a></li>";
            $str2 = "<li><a class=\"dropdown-item\" href='../user_auth/register.php'>Sign Up</a></li>";
        }
        
        echo "<header>";
        nav_bar();
        echo"       
                <!-- Sidebar -->
                <nav id=\"sidebarMenu\" class=\"collapse d-lg-block sidebar collapse\" >
                    <div class=\"position-sticky\">
                        <div class=\"list-group list-group-flush mx-3 mt-4\">

                            <!--- Collapse -->
                        
                            <a  class=\"list-group-item list-group-item-action py-2\" data-bs-toggle=\"collapse\" href=\"#collapseExample\" aria-expanded=\"false\" aria-controls=\"collapseExample\">
                                Equipment
                            </a>
                    
                            <div class=\"collapse\" id=\"collapseExample\">
                                <ul>
                                    <li>
                                        <a href=\"#\">Link</a>
                                    </li>
                                    <li>
                                        <a href=\"#\">Link</a>
                                    </li>
                                    <li>
                                        <a href=\"#\">Link</a>
                                    </li>
                                    <li>
                                        <a href=\"#\">Link</a>
                                    </li>
                                </ul>
                            </div>
                            <!--- Collapse -->
                        
                            <!-- Collapse 1 -->
                            <a  class=\"list-group-item list-group-item-action py-2\" data-bs-toggle=\"collapse\" href=\"#collapseExample1\" aria-expanded=\"false\" aria-controls=\"collapseExample1\">
                                Devices
                            </a>
                            <div class=\"collapse\" id=\"collapseExample1\">
                                <ul>
                                    <li>
                                        <a href=\"#\">Link</a>
                                    </li>
                                    <li>
                                        <a href=\"#\">Link</a>
                                    </li>
                                    <li>
                                        <a href=\"#\">Link</a>
                                    </li>
                                    <li>
                                        <a href=\"#\">Link</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Collapse 1 -->
                            
                            <!-- Collapse 2 -->
                            <a  class=\"list-group-item list-group-item-action py-2\" data-bs-toggle=\"collapse\" href=\"#collapseExample2\" aria-expanded=\"false\" aria-controls=\"collapseExample2\">
                                Manufacturers
                            </a>
                            <div class=\"collapse\" id=\"collapseExample2\">
                                <ul>
                                    <li>
                                        <a href=\"#\">Link</a>
                                    </li>
                                    <li>
                                        <a href=\"#\">Link</a>
                                    </li>
                                    <li>
                                        <a href=\"#\">Link</a>
                                    </li>
                                    <li>
                                        <a href=\"#\">Link</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Collapse 2 -->


                            
                            
                            <!-- Profile -->
                    
                            <a  class=\"list-group-item list-group-item-action py-2\" data-bs-toggle=\"collapse\" href=\"#collapseExample3\" aria-expanded=\"false\" aria-controls=\"collapseExample3\" style='margin-top: 50px;'>
                                Profile
                            </a>
                    
                            <div class=\"collapse\" id=\"collapseExample3\">
                                <ul>";

                                if(!empty($_SESSION['user_id'])){
                                    echo "$str";
                                }
                                else{
                                    echo "$str1 $str2";
                                }    
                                echo "
                                </ul>
                            </div>

                            <!-- Profile -->
                        
                           
                            
                        </div>
                    </div>
                </nav>
                <!-- Sidebar -->
                </header>
                <!--Main Navigation-->";
    }