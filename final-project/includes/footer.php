<footer>
    
    <ul>
            <li>Copyright &copy; <?php  
                $startDate = 2020;
                $currentDate = date('Y');
                if($startDate == $currentDate) {
                    echo $currentDate;
                } else {
                    echo ''.$startDate.' - '.$currentDate.'';
                }
                ?></li>
            <li>All Rights Reserved</li>
            <li><a href="index.php">Web Design by Gift</a></li>
        
            <li><a href="https://validator.w3.org/check?url=referer">HTML VALID</a></li>
            <li><a href="https://jigsaw.w3.org/css-validator/check?uri=referer">CSS VALID</a></li>
        </ul>
    </footer>
    
</div> <!--end wrapper-->
</body>
</html>