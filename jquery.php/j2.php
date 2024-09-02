<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <body>
        <?php>
        $_SESSION["sname"]="Tiya";
        $_SESSION["srollno"]="1";
        echo 'The Name of the Student is:'.$_SESSION["sname"]
       ' <br>';
       echo 'The Roll number of the Student is:'.$_SESSION["srollno"]
       '<br>';
       echo "session variavle are set.";
       ?>

</body>
</html>