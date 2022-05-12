<div class="popover defaultPopoverWidth is-open" id="id14">
	<div class="popover-tittle">
		<h2>Log schrijven - </h2>
	</div>
	<div class="popover-content">
		<form method="post" action="">
			<div id="idd0">
				Selecteer een datum: <input type="date" name="timestamp" required>
				<fieldset class="popover--panel">
					<div class="popover--field" id="idd1">
						<textarea name="verslag" id="verslag" rows="3" placeholder="Wat heb je vandaag gedaan?" title="Wat heb je vandaag gedaan?" class="required" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 105px;" required></textarea>
						<i class="flaticon left-text-1"></i>
					</div>
				</fieldset>
			</div>
			<div id="idd6">
				<fieldset class="popover--panel">
					<div class="popover--field" id="idd7">
						<div id="idd8">
							<div class="popover--time">
								<input type="number" placeholder="uur" name="uren" required>
								<i class="flaticon time-1"></i>
							</div>
						</div>
					</div>
				</fieldset>
			</div>
			<div class="s5-btn-row">
				<a class="btn btn-pri" href="index.php">Annuleren</a>
				<button class="btn btn-pri" name="submit" onclick="if(confirm('Weet je het zeker'))window.location.href='index.php'">Opslaan</button>
			</div>
		</form>
	</div>