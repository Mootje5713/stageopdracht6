<section class="authenticator--wrapper">
    <div class="popover defaultPopoverWidth is-open" id="id1d">
        <form method="POST" action="">
            <label for="verslag">Wat heb je allemaal gedaan?</label>
            <br>
            <textarea id="verslag" name="verslag" rows="4" cols="50" maxlength="3000" required><?php echo $verslag; ?></textarea>
            <br>
            <label for="uren">Hoeveel uren heb je vandaag gemaakt?</label>
            <br>
            <input type="number" name="uren" value="<?php echo $uur; ?>" required>
            <br>
            <div class="s5-btn-row">
                <a class="btn btn-pri" href="user.php?id=<?php echo $user_id ?>">Annuleren</a> <input type="submit" style="background: #0bca6a; border: 0;" class="btn btn-pri" name="submit" value="corrigeren">
            </div>
        </form>
    </div>
</section>