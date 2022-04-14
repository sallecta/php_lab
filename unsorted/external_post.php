 
<?php
if ($_POST) {
    echo '<pre>';
    echo '$_POST: '.htmlspecialchars(print_r($_POST, true));
    echo '</pre>';    
	echo '<pre>';
    echo '$_REQUEST: '.htmlspecialchars(print_r($_REQUEST, true));
    echo '</pre>';
}
?>
<form action="" method="post">
    name:  <input type="text" name="personal[name]" /><br />
    email: <input type="text" name="personal[email]" /><br />
    variants: <br />
    <select multiple name="variants[]">
        <option value="variant1">variant1</option>
        <option value="variant2">variant2</option>
        <option value="variant3">variant3</option>
    </select><br />
    <input type="submit" value="submit" />
</form>