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


        <label>Telephone (please follow the format)</label>
        <input type="tel" name="tel" placeholder="xxx-xxx-xxxx" value="<?php 
                                                                       if(isset($_POST['tel'])) echo htmlspecialchars($_POST['tel']); ?>">
        <span><?php echo $telErr; ?></span>

        <label>How did you hear about us?</label>
                
            <select name="medium">
                    <option value=""
                <?php if(isset($_POST['medium']) && $_POST == 'NULL') {
                echo 'selected = "unselected"';}?>>Select one</option>
                    
                    <option value="Facebook"
                <?php if(isset($_POST['medium']) && $_POST['medium'] == 'Facebook') {
                echo 'selected = "selected"';}?>>Facebook</option> 
                
                <option value="Instagram"
                <?php if(isset($_POST['medium']) && $_POST['medium'] == 'Instagram') {
                echo 'selected = "selected"';}?>>Instagram</option> 
                
                <option value="Pinterest"
                <?php if(isset($_POST['medium']) && $_POST['medium'] == 'Pinterest') {
                echo 'selected = "selected"';}?>>Pinterest</option> 
                
                <option value="Search engines"
                <?php if(isset($_POST['medium']) && $_POST['medium'] == 'Search engines') {
                echo 'selected = "selected"';}?>>Search engines</option> 
                
            </select>
        
        <span><?php echo $medErr; ?></span>
        
        <label>How often do you want to hear from us?</label>

        <ul class="contact">

            <li><input type="radio" name="frequency" value="weekly"
                       <?php if(isset($_POST['frequency']) && $_POST['frequency'] == 'weekly') echo 'checked = "checked"';?>
                       >Weekly</li>
            <li><input type="radio" name="frequency" value="bi-weekly"
                       <?php if(isset($_POST['frequency']) && $_POST['frequency'] == 'bi-weekly') echo 'checked = "checked"';?>
                       >Bi-Weekly</li>
        </ul>
        
        
        <span><?php echo $frequencyErr; ?></span>

        <label>Tips about sustainable gift giving you wanna hear more about (choose all that apply)</label>
        <ul class="options">
            <!--                    Radio butt and checkboxes are very similar-->
            <li><input type="checkbox" name="gifttips[]" value="Small businesses with cool gifts in Seattle"
                        <?php if(isset($_POST['gifttips']) && in_array('Small businesses with cool gifts in Seattle', $_POST['gifttips'])) echo 'checked = "checked"';?>
                       >Small businesses with cool gifts in Seattle</li>            
            
            <li><input type="checkbox" name="gifttips[]" value="Conversations about 'NO GIFT' agreement"
            
                        <?php if(isset($_POST['gifttips']) && in_array('Conversations about \'NO GIFT\' agreement', $_POST['gifttips'])) echo 'checked = "checked"';?>
                       >Conversations about 'NO GIFT' agreement</li>
        
            <li><input type="checkbox" name="gifttips[]" value="Ways to wrap gifts with lowest cost and least impact"
                       
                        <?php if(isset($_POST['gifttips']) && in_array('Ways to wrap gifts with lowest cost and least impact', $_POST['gifttips'])) echo 'checked = "checked"';?>
                       >Ways to wrap gifts with lowest cost and least impact</li>
            
            <li><input type="checkbox" name="gifttips[]" value="Should we continue the gift giving tradition?"
            
                        <?php if(isset($_POST['gifttips']) && in_array('Should we continue the gift giving tradition?', $_POST['gifttips'])) echo 'checked = "checked"';?>
                       >Should we continue the gift giving tradition?</li>   
            
            <li><input type="checkbox" name="gifttips[]" value="Activities ideas worth doing than gifting items"
                       <?php if(isset($_POST['gifttips']) && in_array('Activities ideas worth doing than gifting items', $_POST['gifttips'])) echo 'checked = "checked"';?>
                       >Activities ideas worth doing than gifting items</li>   

        </ul>

        <span><?php echo $gifttipsErr; ?></span>

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
        <p><a href="">Reset</a></p>
    </fieldset>

</form>