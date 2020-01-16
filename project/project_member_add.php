<?php
include('../includes/topnav.php');
?>

<div class="container">

    <div>
        <label>Type HBDI username or email to select: </label> <br>

    </div>
    <form action="<?php echo $p ?>/project/member_add.php" method="POST">
        <div>
            <input name="" placeholder="Start typing... "
                   value=""
                   style=" padding: 0 10px; font-size: 14px; height: 40px; border-radius: 4px; width: 280px; border: solid 1px grey">
        </div>


        <div style=" margin-top: 12px">
            <!--                        <input type="hidden" name="_eventId" value="submit">-->
            <input type="submit" name="submit"
                   style="padding: 0 5px; height: 40px; border-radius: 4px; border: solid 1px grey"
                   value="Add">

        </div>

    </form>

</div>