<form method="POST" action="">
    <label for="verslag">Wat heb je vandaag allemaal gedaan?</label>
    <br>
    <textarea id="verslag" name="verslag" rows="4" cols="50" maxlength="3000" required></textarea>
    <br>
    <label for="uren">Hoeveel uren heb je vandaag gelopen?</label>
    <br>
    <input type="number" name="uren" required>
    <br>
    <button class="btn" name="submit" onclick="if(confirm('Weet je het zeker? na het versturen kan nog alleen de praktijkbegeleieder de verslagen en uren wijzigen'))">Verstuur</button>

</form>