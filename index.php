<?php
session_start(); // Starting Session
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shopping Cart</title>

        <link rel="stylesheet" type="text/css" href="css/templatemo_style.css"  />
        <link rel="stylesheet" type="text/css" href="css/nivo-slider.css"  media="screen" />
        <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
        <link rel="stylesheet" href="css/form.css" />

        <script type="text/javascript" src="js/jquery.min.js"></script>
<!--        <script type="text/javascript" src="js/ddsmoothmenu.js">

            /***********************************************
             * Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
             * This notice MUST stay intact for legal use
             * Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
             ***********************************************/
        </script>
        <script type="text/javascript">

            ddsmoothmenu.init({
                mainmenuid: "top_nav", //menu DIV id
                orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
                classname: 'ddsmoothmenu', //class added to menu's outer DIV
                //customtheme: ["#1c5a80", "#18374a"],
                contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
            })
        </script>-->
        <script type="text/javascript" src="controller/controller_header.js"></script>


    </head>
    <body>
        <div id="templatemo_body_wrapper">
            <div id="templatemo_wrapper">
                <div><?php
                    include_once 'view/header.php';
                    ?>
                </div>
                <div>
                    <?php
                    include_once 'view/menu_bar.php';
                    ?>
                </div>
                <div id="templatemo_main">
                    <div>
                        <?php
                        include_once 'view/side_bar.php';
                        ?>
                    </div>
                    <div  id="content" class="float_r">
                        <?php
//                        echo $_SESSION['customer_id'];
                        $valid_pages = array('register', 'login');
                        if (isset($_GET['route'])) {
                            if (in_array($_GET['route'], $valid_pages)) {
                                include_once './view/' . $_GET['route'] . '.php';
                            } else {
                                echo 'Page Not Found - 404';
                            }
                        } else {
                            
                        }
                        ?>
                    </div>
                    <div class="cleaner"></div>
                </div> <!-- END of templatemo_main -->
                <div>
                    <?php
                    include_once 'view/footer.php';
                    ?>
                </div>
            </div> <!-- END of templatemo_wrapper -->
        </div> <!-- END of templatemo_body_wrapper -->
    </body>
</html>
