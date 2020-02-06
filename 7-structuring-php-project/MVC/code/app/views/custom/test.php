<h1>Test</h1>
<?php
    foreach ($params['qr_codes'] as $key => $value) {
        echo $value['id']." ".$value['lecturer_id']." ".$value['class_id']."</br>";
    }
?>

<form method="post">
    <input type="text" name="lecturer_id" /> <br>
    <input type="text" name="class_id" /><br>
    <button>Submit</button>
</form>