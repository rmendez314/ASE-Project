<?php

    session_start();

    function nav_bar() {

        $user_name = '';
        // check if the user is logged in
        if (!empty($_SESSION['user_id'])) {
            $user_name = "Welcome, " . $_SESSION['user_name'];
            $str = "<li><a class=\"dropdown-item\" href='/user_auth/logout.php'>Sign Out</a></li>";
        }
        else {
            $str1 = "<li><a class=\"dropdown-item\" href='/user_auth/login.php'>Sign In</a></li>";
            $str2 = "<li><a class=\"dropdown-item\" href='/user_auth/register.php'>Sign Up</a></li>";
        }

        echo "		
            <nav class=\"navbar navbar-expand-sm navbar-dark\" aria-label=\"navbar\">
                <div class=\"container-fluid\">
                    <a class=\"navbar-brand\" href=\"/\">
                        <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-house\" viewBox=\"0 0 16 16\">
                            <path fill-rule=\"evenodd\" d=\"M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 
                            .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 
                            .5-.5h1a.5.5 0 0 1 .5.5z\"
                            />
                            <path fill-rule=\"evenodd\" d=\"M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 
                            1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z\"
                            />
                        </svg>
                    </a>
                    <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarsExample05\"
                        aria-controls=\"navbarsExample05\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                        <span class=\"navbar-toggler-icon\"></span>
                    </button>
                    <div class=\"collapse navbar-collapse\" id=\"navbarsExample05\">
                        <ul class=\"navbar-nav me-auto mb-2 mb-lg-0\">
                            <li class=\"nav-item\">
                                <a class=\"nav-link active\" aria-current=\"page\" href=\"/\">Home</a>
                            </li>
                            <li class=\"nav-item dropdown\">
                                <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"dropdown\" data-bs-toggle=\"dropdown\"
                                aria-expanded=\"false\">Options</a>
                                <ul class=\"dropdown-menu\" aria-labelledby=\"dropdown\">";

                                if(!empty($_SESSION['user_id'])){
                                    echo "$str";
                                }
                                else{
                                    echo "$str1 $str2";
                                }    
                                echo "
                                </ul>
                            </li>
                        </ul>
                        <div>
                            $user_name
                        </div>
                    </div> 
                </div>
            </nav>
               ";
    }


//  <nav class=\"navbar navbar-expand-sm navbar-dark\" aria-label=\"navbar\">
//                 <div class=\"container-fluid\">
//                     <a class=\"navbar-brand\" href=\"index.php\">
//                         <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-stars\" viewBox=\"0 0 16 16\"> 
//                             <path d=\"M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0
//                             .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0
//                             0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794
//                             1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0
//                             .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31
//                             4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145
//                             0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0
//                             0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1
//                             0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z\" />
//                         </svg>
//                     </a>
//                     <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarsExample05\"
//                         aria-controls=\"navbarsExample05\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
//                         <span class=\"navbar-toggler-icon\"></span>
//                     </button>
//                     <div class=\"collapse navbar-collapse\" id=\"navbarsExample05\">
//                         <ul class=\"navbar-nav me-auto mb-2 mb-lg-0\">
//                             <li class=\"nav-item\">
//                                 <a class=\"nav-link active\" aria-current=\"page\" href=\"index.php\">Home</a>
//                             </li>
//                             <li class=\"nav-item dropdown\">
//                                 <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"dropdown\" data-bs-toggle=\"dropdown\"
//                                 aria-expanded=\"false\">Options</a>
//                                 <ul class=\"dropdown-menu\" aria-labelledby=\"dropdown\">";

//                                 if(!empty($_SESSION['user_id'])){
//                                     echo "$str";
//                                 }
//                                 else{
//                                     echo "$str1 $str2";
//                                 }    
//                                 echo "
//                                 </ul>
//                             </li>
//                         </ul>
//                         <div>
//                             $user_name
//                         </div>
//                     </div>
//                 </div>
//             </nav>



//  <!-- Navbar -->
//                 <nav id=\"main-navbar\" class=\"navbar navbar-expand-sm fixed-top\" >
//                     <!-- Container wrapper -->
//                     <div class=\"container-fluid\">
//                     <!-- Toggle button -->
//                     <button
//                             class=\"navbar-toggler\"
//                             type=\"button\"
//                             data-mdb-toggle=\"collapse\"
//                             data-mdb-target=\"#sidebarMenu\"
//                             aria-controls=\"sidebarMenu\"
//                             aria-expanded=\"false\"
//                             aria-label=\"Toggle navigation\"
//                             >
//                     </button>

//                     <!-- Brand -->
//                     <a class=\"navbar-brand\" href=\"../index.php\">
//                             <svg id=\"stars_login\" xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\"
// 							fill=\"currentColor\" class=\"bi bi-stars\" viewBox=\"0 0 16 16\">
// 							<path d=\"M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829
// 								1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361
// 								0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1
// 								0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387
// 								1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0
// 								4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31
// 								4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407
// 								2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274
// 								0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0
// 								0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1
// 								2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z\" />
// 						</svg>
//                     </a>
                    
//                     <!-- Right links -->
//                     <ul class=\"navbar-nav ms-auto d-flex flex-row\">
                        
//                         <!-- Icon -->
//                         <li class=\"nav-item\">
//                             <a class=\"nav-link me-3 me-lg-0\" href=\"https://d3h0nnty80ji1q.cloudfront.net\" target=\"_blank\">
//                                 <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-controller\" viewBox=\"0 0 16 16\">
//                                     <path d=\"M11.5 6.027a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm-6.5-3h1v1h1v1h-1v1h-1v-1h-1v-1h1v-1z\"/>
//                                     <path d=\"M3.051 3.26a.5.5 0 0 1 .354-.613l1.932-.518a.5.5 0 0 1 .62.39c.655-.079 1.35-.117 2.043-.117.72 0 1.443.041 2.12.126a.5.5 0 0 1 .622-.399l1.932.518a.5.5 0 0 1 .306.729c.14.09.266.19.373.297.408.408.78 1.05 1.095 1.772.32.733.599 1.591.805 2.466.206.875.34 1.78.364 2.606.024.816-.059 1.602-.328 2.21a1.42 1.42 0 0 1-1.445.83c-.636-.067-1.115-.394-1.513-.773-.245-.232-.496-.526-.739-.808-.126-.148-.25-.292-.368-.423-.728-.804-1.597-1.527-3.224-1.527-1.627 0-2.496.723-3.224 1.527-.119.131-.242.275-.368.423-.243.282-.494.575-.739.808-.398.38-.877.706-1.513.773a1.42 1.42 0 0 1-1.445-.83c-.27-.608-.352-1.395-.329-2.21.024-.826.16-1.73.365-2.606.206-.875.486-1.733.805-2.466.315-.722.687-1.364 1.094-1.772a2.34 2.34 0 0 1 .433-.335.504.504 0 0 1-.028-.079zm2.036.412c-.877.185-1.469.443-1.733.708-.276.276-.587.783-.885 1.465a13.748 13.748 0 0 0-.748 2.295 12.351 12.351 0 0 0-.339 2.406c-.022.755.062 1.368.243 1.776a.42.42 0 0 0 .426.24c.327-.034.61-.199.929-.502.212-.202.4-.423.615-.674.133-.156.276-.323.44-.504C4.861 9.969 5.978 9.027 8 9.027s3.139.942 3.965 1.855c.164.181.307.348.44.504.214.251.403.472.615.674.318.303.601.468.929.503a.42.42 0 0 0 .426-.241c.18-.408.265-1.02.243-1.776a12.354 12.354 0 0 0-.339-2.406 13.753 13.753 0 0 0-.748-2.295c-.298-.682-.61-1.19-.885-1.465-.264-.265-.856-.523-1.733-.708-.85-.179-1.877-.27-2.913-.27-1.036 0-2.063.091-2.913.27z\"/>
//                                 </svg>
//                             </a>
//                         </li>
    
//                         <!-- Icon -->
//                         <li class=\"nav-item \">
//                             <a class=\"nav-link\"  href=\"https://github.com/aguerrero232\" target=\"_blank\">
//                                 <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-github\" viewBox=\"0 0 16 16\">
//                                     <path d=\"M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38
//                                         0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01
//                                         1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95
//                                         0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27
//                                         1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65
//                                         3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16
//                                         8c0-4.42-3.58-8-8-8z\" />
//                                 </svg>
//                             </a>
//                         </li>
//                     </ul>
//                     </div>
//                     <!-- Container wrapper -->
//                 </nav>
//                 <!-- Navbar -->