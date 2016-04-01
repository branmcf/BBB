<?php
    
    $sleeves = array(
                     "15"=>"Long Sleeve",
                     "20"=>"Short Sleeve",
                     );
    
    if (!isset($_POST['submit'])) {
        
    ?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<select name="shirt" id="shirt">
<option value="" selected="selected">--- Select Sleeve Type ---</option>
<?php
    foreach($sleeves as $key => $value){
        echo '<option value="'.$key.'">'.$value.'</option>';
    }
    ?>
</select>
<input type="submit" name="submit">
</form>


<?php
    } else {
        
        $shType = $_POST["shirt"];
        echo "This should work ".$sleeves[$shType];
        
    }
    ?>