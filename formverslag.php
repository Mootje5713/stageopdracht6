<a href="user.php?id=<?php echo $user_id ?>">Terug</a>
<form method="POST" action="">
    <label for="verslag">Wat heb je allemaal gedaan?</label>
    <br>
    <textarea id="verslag" name="verslag"rows="4" cols="50" maxlength="3000" required><?php echo $verslag; ?></textarea>
    <br>
    <input type="submit" class="btn" name="submit" value="Wijzig">
</form>