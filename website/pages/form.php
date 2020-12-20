<!-- Main -->
<div id="main-wrapper">
	<div class="container">
		<div class="row">
			<div class="12u">
				<!-- Inschrijven -->
				<header class="major">
					<h2>Inschrijven</h2>
				</header>
				<div class="row">
					<div class="12u 12u(mobile) box">
						<p>Tijdens deze trainingsdag kun je twee trainingen volgen. E&eacute;n 's morgens van 09:30 tot 12:30 uur en &eacute;&eacute;n 's middags van 14:00 tot 17:00 uur.<br />Voor beide dagdelen kun je &eacute;&eacute;n training kiezen uit de volgende lijst.</p>

						<form method="post" id="inscription">
              <h3>Persoonlijke gegevens</h3>
              <table>
                <tr>
                  <td width="30%">
                    <label for="firstname">Voornaam: </label>
                  </td>
                  <td>
                    <input type="text" id="firstname" name="firstname">
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="lastname">Achternaam: </label>
                  </td>
                  <td>
                    <input type="text" id="lastname" name="lastname">
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="email">E-mail adres: </label>
                  </td>
                  <td>
                    <input type="text" id="email" name="email">
                  </td>
                </tr>
                <tr>
                  <td>
                    <label for="telnr">Telefoonnummer (optioneel): </label>
                  </td>
                  <td>
                    <input type="text" id="telnr" name="telnr">
                  </td>
                </tr>
                  <td>
                    <label>Ik ben lid bij StuD: </label>
                  </td>
                  <td>
                    <input type="radio" value="1" id="m1" name="member" checked /><label for="m1">Ja</label><br />
										<input type="radio" value="2" id="m2" name="member" /><label for="m2">Nee, maar wel van plan me in te schrijven op <a href="http://www.stud.nl/">Stud.nl</a></label><br />
                    <input type="radio" value="0" id="m0" name="member" /><label for="m0">Nee, en niet van plan me in te schrijven</label>
                  </td>
                </tr>
              </table>
							<h3>Ochtendtraining (09:30 - 12:30)</h3>
							<?php
							$sql = "SELECT Name, id, Places, Filled FROM Events WHERE Time=0";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {
											if(strtolower($row["Name"])=="geen"){ continue; }
											if(intval($row["Places"]) - intval($row["Filled"]) < 1){ continue; }
							?>
		                          <input type="radio" name="morningcourse" value="<?=$row["id"]?>" id="<?=$row["id"]?>" /><label for="<?=$row["id"]?>"> <?=htmlspecialchars($row["Name"]);?></label><br />
		                    <?php    }
		                    } else {
		                        echo "Geen ochtendtrainingen over";
		                    }
		                    ?>
		                    <input type="radio" name="morningcourse" value="8" id="8" checked><label for="8">Geen</label>
							<br />
							<br />
							<h3>Middagtraining (14:00 - 17:00)</h3>
		                    <?php
		                    $sql = "SELECT Name, id, Places, Filled FROM Events WHERE Time=1";
		                    $result = $conn->query($sql);

		                    if ($result->num_rows > 0) {
		                        // output data of each row
		                        while($row = $result->fetch_assoc()) {
															if(strtolower($row["Name"])=="geen"){ continue; }
															if(intval($row["Places"]) - intval($row["Filled"]) < 1){ continue; }
												?>
		                          <input type="radio" name="middaycourse" value="<?=$row["id"]?>" id="<?=$row["id"]?>" /><label for="<?=$row["id"]?>"> <?=htmlspecialchars($row["Name"]);?></label><br />
		                    <?php    }
		                    } else {
		                        echo "Geen middagtrainingen over";
		                    }
		                    ?>
		                    <input type="radio" name="middaycourse" value="7" id="7" checked><label for="7">Geen</label>
		                    <br />
							<br />
		                    <h3>Deelname aan lunch</h3>
		                    <input type="checkbox" id="lunch" value="1" name="lunch" /><label for="lunch">Ik neem deel aan de lunch!</label>
							<br />
							<input type="checkbox" id="vega" value="1" name="vega" /><label for="vega">Vegetarisch</label>
		                    <table>
		                      <tr>
		                        <td width="30%">
		                          <label for="allergy">Allergie&euml;n: </label>
		                        </td>
		                        <td>
		                          <input type="text" id="allergy" name="allergy">
		                        </td>
		                      </tr>
		                    </table>
		                    <h3>Overige opmerkingen</h3>
		                    Als je nog verdere op- of aanmerkingen hebt, zet ze dan hieronder.<br />
		                    <textarea id="remarks" name="remarks"></textarea>
		                    <br />
							<br />
							<h3>Betaling</h3>
							<p>
								Voor voltooiing van de inschrijving dient er &euro;5,- inschrijfgeld betaald te worden aan StuD via iDeal.
								<br />
								Selecteer hiervoor jouw bank:<br />
								<?php echo getMerchants() ?>
							</p>
							<input type="submit" name="inschrijven" value="Versturen" />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
