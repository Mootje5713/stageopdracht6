<form method="POST" action="">
    <label for="uren">Hoeveel uren heb je vandaag gelopen?</label>
    <br>
    <input type="number" name="uren" value="<?php echo $_POST['uren'] ?>" required>
    <br>
    <input type="submit" class="btn" name="submit">
</form>
<?php include "footer.php" ?>