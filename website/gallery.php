<?php 
include('config.php'); 
include('includes/header.php');
?>

<div id="wrapper">

    <main>

        <h1><?php echo $mainHeadline; ?></h1>

          
        <table class="base">
            
<!--            !!!!!!something wrong with the arguments here line 17!!!----------->
            
            <?php foreach($carbs as $carbsName => $image): ?>
            <tr>
                <td>
                    <img src="images/<?php echo substr($image, 0, 5); ?>.png" alt="<?php echo $carbsName; ?>">
                </td>
                <td>
                    <?php echo str_replace('_', ' ',$carbsName); ?>
                </td>
                <td>
                    <?php echo substr($image, 6); ?>
                </td>
            </tr>
            <?php endforeach ; ?>
        </table>    

    </main>

    <aside>
        <h3>This is myheadline 3 on the gallery page</h3>

        <!--        HOMEWORK!!!! make the random function-->

        <?php echo '<img src="'.$randImages2.'">';?>
        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos</p>


    </aside>

    <?php 
    include('includes/footer.php');
    ?>