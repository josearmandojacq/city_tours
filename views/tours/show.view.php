<?php include __DIR__ . "/../partials/_header.php" ?>

    <section class="container mx-auto mt-12 p-4 bg-white shadow-md border border-gray-200 rounded">
        <div class="container-e">
            <div class="image-container-e">
                <img src="https://dummyimage.com/800x500/a1c9e6/000000&text=Bus" alt="Stadtbild München"/>
            </div>
            <div class="info-container-e">
                <h1>Berlin → München</h1>
                <table class="times text-big">
                    <tr>
                        <th>Abfahrtszeit</th>
                        <th>Ankunftszeit</th>
                        <th>Haltestellen</th>
                    </tr>
                    <tr>
                        <td>08:00</td>
                        <td>16:00</td>
                        <td>Halle-Nürnberg</td>
                    </tr>
                    <tr>
                        <td>10:00</td>
                        <td>18:00</td>
                        <td>Halle-Nürnberg</td>
                    </tr>
                    <tr>
                        <td>13:00</td>
                        <td>21:00</td>
                        <td>Dresden-Nürnberg</td>
                    </tr>
                </table>
                <h2>Die bayerische Landeshauptstadt München</h2>
                <p>Das Stadtbild Münchens wird von jahrhundertealte Bauwerken und zahlreichen Museen geprägt.
                    Die bayerische Landeshauptstadt ist für das alljährliche Oktoberfest und ihre Bierhallen bekannt,
                    darunter vor allem das 1589 eröffnete Hofbräuhaus.
                    In der Altstadt am zentralen Marienplatz stehen Wahrzeichen wie das neugotische Neue Rathaus, dessen
                    beliebtes Glockenspiel Melodien und Geschichten aus dem 16. Jahrhundert spielt.
                </p>
            </div>
        </div>
        <form class="equipment-form">
            <h3>Unsere busse bringen sie sicher und schnell ans Ziel</h3>
            <p>Wählen sie die Gewünschte Ausstattung</p>
            <div class="checkbox-group text-big">
                <label for="comfort"><input type="checkbox" id="comfort" name="equipment"> Sitzkomfort</label>
                <label for="wifi"><input type="checkbox" id="wifi" name="equipment"> WLAN</label>
                <label for="toilet"><input type="checkbox" id="toilet" name="equipment"> Toilette</label>
                <label for="power_socket"><input type="checkbox" id="power_socket" name="equipment"> Steckdose</label>
                <label for="air_conditioning"><input type="checkbox" id="air_conditioning" name="equipment">
                    Klimaanlage</label>
                <label for="entertainment_system"><input type="checkbox" id="entertainment_system" name="equipment">
                    Unterhaltungssystem</label>
                <label for="accessibility"><input type="checkbox" id="accessibility" name="equipment">
                    Barrierefreiheit</label>
                <label for="board_service"><input type="checkbox" id="board_service" name="equipment">
                    Bordservice</label>
            </div>
        </form>
        <section class="buses">
            <div class="center-div">
                <div class="bus text-big" id="bus1"><img src="https://dummyimage.com/300x200/a1c9e6/000000&text=Bus"
                                                         alt="Stadtbild München"/><br><span>Bus 1</span><br><span>Frei Plätze: 2</span>
                </div>
                <div class="bus text-big" id="bus2"><img src="https://dummyimage.com/300x200/a1c9e6/000000&text=Bus"
                                                         alt="Stadtbild München"/><br><span>Bus 2</span><br><span>Frei Plätze: 6</span>
                </div>
                <div class="bus text-big" id="bus3"><img src="https://dummyimage.com/300x200/a1c9e6/000000&text=Bus"
                                                         alt="Stadtbild München"/><br><span>Bus 3</span><br><span>Frei Plätze: 6</span>
                </div>
                <div class="bus text-big" id="bus5"><img src="https://dummyimage.com/300x200/a1c9e6/000000&text=Bus"
                                                         alt="Stadtbild München"/><br><span>Bus 5</span><br><span>Frei Plätze: 10</span>
                </div>
                <div class="bus text-big" id="bus4"><img src="https://dummyimage.com/300x200/a1c9e6/000000&text=Bus"
                                                         alt="Stadtbild München"/><br><span>Bus 4</span><br><span>Frei Plätze: 10</span>
                </div>
            </div>
        </section>
        <section class="accommodations">
            <h3>Unterkünfte in München</h3>
            <div class="center-div">
                <div class="accommodation text-big" id="accommodation1"><img
                            src="https://dummyimage.com/300x200/a1c9e6/000000&text=Bus" alt="Stadtbild München"/><br>Unterkunft
                    1
                </div>
                <div class="accommodation text-big" id="accommodation2"><img
                            src="https://dummyimage.com/300x200/a1c9e6/000000&text=Bus" alt="Stadtbild München"/><br>Unterkunft
                    2
                </div>
                <div class="accommodation text-big" id="accommodation3"><img
                            src="https://dummyimage.com/300x200/a1c9e6/000000&text=Bus" alt="Stadtbild München"/><br>Unterkunft
                    3
                </div>
                <div class="accommodation text-big" id="accommodation5"><img
                            src="https://dummyimage.com/300x200/a1c9e6/000000&text=Bus" alt="Stadtbild München"/><br>Unterkunft
                    5
                </div>
                <div class="accommodation text-big" id="accommodation4"><img
                            src="https://dummyimage.com/300x200/a1c9e6/000000&text=Bus" alt="Stadtbild München"/><br>Unterkunft
                    4
                </div>
                <br>
            </div>
        </section>
        <div class="center-div">
            <p></p>
            <button type="button" class="book-button">Für nur <b>500,00$</b> inkl. Mwst <br> <b>Jetzt Buchen <b>
            </button>
        </div>
    </section>


<?php include __DIR__ . "/../partials/_footer.php" ?>
