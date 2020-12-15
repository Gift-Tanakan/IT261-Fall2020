<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>

        <link href="css/styles.css" type="text/css" rel="stylesheet">
    </head>

    <body class="<?php echo $body; ?>">

        <header>
            <div class="inner-header">
                <a href="index.php"><img id="logo" src="images/IT261_logo_edited.png" alt="logo"></a>
                <nav>
                    <ul>

                        <?php echo makeLinks($nav); ?>
                        
                        
<!--  Where the orginal isset for UserName is used to be (code is in the textEdit)-->
                        
                        <?php
                                
                        if(isset($_SESSION['UserName'])) { ?>
<!--                            <div class="successful">-->
                            <li class="log successful">Welcome, <strong><?php echo $_SESSION['UserName']; ?></strong>! 
                         You're now logged in.<a href="index.php?logout='1'"> Log out!</a></li>
<!--                                </div>-->
                       <?php
                        
                        } else { ?>
                            
                            <li class="error successful"><strong>Sorry! You must log in first.</strong></li> 
        
                      <?php } ?>
                                
                   
                        
                    </ul>

                </nav>
    
                
            </div> <!---end inner header-->
            
        </header>

        <div id="wrapper">

            <!--    close the wrapper in the footer-->
