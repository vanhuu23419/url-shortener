
<?php 
    if (!empty($message)) {
        echo '<p style="background-color:green;color:white;">';
        echo $message;
        echo '</p>';
    }
?>

<form action="/url-shortener" method="get">
    <input type="text" name="url">
    <button type="submit"> Create </button>
</form>