<form method="POST" action="">
    <label for="verslag">Wat heb je allemaal gedaan vandaag?</label>
    <br>
    <textarea id="verslag" name="verslag" value="<?php echo $_SESSION['user_id']?>" rows="4" cols="50" maxlength="3000" required></textarea>
    <br>
    <input type="submit" class="btn" name="submit">
</form>