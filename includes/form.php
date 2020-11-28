<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <fieldset>
        <label>First Name</label>
        <input type="text" name="firstName" value="<?php 
                                                   if(isset($_POST['firstName'])) echo htmlspecialchars($_POST['firstName']); ?>">
        <span><?php echo $firstNameErr; ?></span>

        <label>Last Name</label>
        <input type="text" name="lastName" value="<?php 
                                                  if(isset($_POST['lastName'])) echo htmlspecialchars($_POST['lastName']); ?>">
        <span><?php echo $lastNameErr; ?></span>

        <label>Email</label>
        <input type="email" name="email" value="<?php 
                                                if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>">
        <span><?php echo $emailErr; ?></span>


        <label>Telephone</label>
        <input type="tel" name="tel" placeholder="xxx-xxx-xxxx" value="<?php 
                                                                       if(isset($_POST['tel'])) echo htmlspecialchars($_POST['tel']); ?>">
        <span><?php echo $telErr; ?></span>



        <label>How often you want to hear from us?</label>

        <ul>

            <li><input type="radio" name="frequency" value="weekly"
                       <?php if(isset($_POST['frequency']) && $_POST['frequency'] == 'weekly') echo 'checked = "checked"';?>
                       >Weekly</li>
            <li><input type="radio" name="frequency" value="bi-weekly"
                       <?php if(isset($_POST['frequency']) && $_POST['frequency'] == 'bi-weekly') echo 'checked = "checked"';?>
                       >Bi-Weekly</li>
        </ul>
        
        
        <span><?php echo $frequencyErr; ?></span>

        <label>Your Favorite Carbs You Wanna Make (choose all that apply)</label>
        <ul>
            <!--                    Radio butt and checkboxes are very similar-->
            <li><input type="checkbox" name="carbs[]" value="Whole Wheat Bread"
                       <?php if(isset($_POST['carbs']) && $_POST['carbs'] == 'Whole Wheat Bread') echo 'checked = "checked"';?>
                       >Whole Wheat Bread</li>
            <li><input type="checkbox" name="carbs[]" value="Homemade Noodle"
                       <?php if(isset($_POST['carbs']) && $_POST['carbs'] == 'Homemade Noodle') echo 'checked = "checked"';?>
                       >Homemade Noodle</li>
            <li><input type="checkbox" name="carbs[]" value="Homemade Pasta"
                       <?php if(isset($_POST['carbs']) && $_POST['carbs'] == 'Homemade Pasta') echo 'checked = "checked"';?>
                       >Homemade Pasta</li>
            <li><input type="checkbox" name="carbs[]" value="English Muffin"
                       <?php if(isset($_POST['carbs']) && $_POST['carbs'] == 'English Muffin') echo 'checked = "checked"';?>
                       >English Muffin</li>
            <li><input type="checkbox" name="carbs[]" value="Fried Rice"
                       <?php if(isset($_POST['carbs']) && $_POST['carbs'] == 'Fried Rice') echo 'checked = "checked"';?>
                       >Fried Rice</li>
            

            
        </ul>

        <span><?php echo $carbsErr; ?></span>

        <label>Comments</label>


        <textarea name="comments">
            <?php 
            if(isset($_POST['comments'])) echo htmlspecialchars($_POST['comments']); ?>
        </textarea>

        <span><?php echo $commentsErr; ?></span>


        <input type="radio" name="privacy" value="<?php if (isset($_POST['privacy'])) echo htmlspecialchars($_POST['privacy']); ?>">

        I agree to your Privacy Policy

        <span><?php echo $privacyErr; ?></span>

        <input type="submit" value="Send it!">
        <p><a href="">Reset Me</a></p>
    </fieldset>

</form>