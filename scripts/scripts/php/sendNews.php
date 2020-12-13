<?php
session_start();
if(!isset($_SESSION['id']) || $_SESSION['email'] != 'admin@admin.admin') header('Location: ../../permissionDenied.php');
?>
<form class="reg news" action="./scripts/php/newsletter.php" method="POST">
    <div class="form-group">
        <label for="subject">Subject</label>
        <input name="subject" type="text" class="form-control" id="subject" required>
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <textarea name="body" type="text" class="form-control" id="body" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Invio</button>
</form>
