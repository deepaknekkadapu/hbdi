
<?php

if (isset($_POST['submit'])){
    $test=$_POST['test'];
    echo $test;
}

?>



<form action="" method="post">

    <input type="text" name="test" placeholder="test">
    <button>
        <input type="submit" name="submit" value="Submit">
    </button>
</form>