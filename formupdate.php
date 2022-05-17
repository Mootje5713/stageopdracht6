<section class="authenticator--wrapper" style="background-color: rgba(0, 0, 0, 0.25);" onclick="window.location.href='user.php?id=<?php echo $user_id ?>';">
    <div class="authenticator--body is-small">
        <div class="authenticator--panel">
            <div class="popover defaultPopoverWidth is-open" id="id1d" onclick="event.stopPropagation();">
                <form method="POST" action="" style="margin: 0;">
                    <div class="popover-title">
                    </div>
                    <div class="popover-content">
                        <fieldset class="popover--panel">
                            <label for="verslag">Stageverslag</label>
                            <div class="popover--field" id="id73">
                                <textarea id="verslag" name="verslag" rows="3" cols="50" required maxlength="1250" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 105px;"><?php echo $verslag; ?></textarea>
                                <i class="flaticon left-text-1"></i>
                            </div>
                        </fieldset>
                        <label for="uren">Stageuur</label>
                        <br>
                        <input type="number" name="uren" value="<?php echo $uur; ?>" required>
                    </div>
                    <div class="s5-btn-row">
                        <a class="btn btn-pri" href="user.php?id=<?php echo $user_id ?>">Annuleren</a> <input type="submit" style="background: #0bca6a; border: 0;" class="btn btn-pri" name="submit" value="corrigeren">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>