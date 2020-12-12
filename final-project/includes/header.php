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
                        <br>
                        

                        <?php 
                        if(isset($_SESSION['UserName'])) : ?>
                            
                            <div class="successful">
                            <p class="log">Welcome, <strong><?php echo $_SESSION['UserName']; ?></strong>!</p> 
                        <p class="log"> You're now logged in.<a href="index.php?logout='1'"> Log out!</a></p>
            
                    </div>
                    <?php endif ?>
                        
                    </ul>

                </nav>
    
                
            </div> <!---end inner header-->
            
        </header>

        <div id="wrapper">

            <!--    close the wrapper in the footer-->