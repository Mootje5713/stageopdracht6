<a href="index.php">Terug</a>
<form method="POST" action="">
    <label for="verslag">Wat heb je allemaal gedaan vandaag?</label>
    <br>
    <textarea id="verslag" name="verslag"rows="4" cols="50" maxlength="3000" required><?php echo $data['verslag']; ?>
    </textarea>
    <br>
    <input type="submit" class="btn" name="submit">
</form>