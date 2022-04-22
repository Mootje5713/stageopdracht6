<a href="user.php?id=<?php echo $user_id ?>">Terug</a>
<form method="POST" action="">
    <label for="uren">Hoeveel uren heb je vandaag gemaakt?</label>
    <br>
    <input type="number" name="uren" value="<?php echo $uur; ?>" required>
    <br>
    <input type="submit" class="btn" name="submit">
</form>

