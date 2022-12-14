<footer>
    <script>
        function updateText() {
            let button = document.querySelector('.switch-mode');
            let mode = getMode(localStorage.getItem('mode'));

            switch(mode) {
                case 'LIGHT':
                    button.textContent = "Dark";
                    break;

                case 'DARK':
                    button.textContent = "Light";
                    break;
            }
        }

        function press() {
            let mode = getMode(localStorage.getItem('mode'));

            let nextMode = null;

            switch(mode.toLowerCase()) {
                case 'light':
                    nextMode = Modes.DARK;
                    break;

                case 'dark':
                    nextMode = Modes.LIGHT;
                    break;

                default:
                    nextMode = Modes.LIGHT;
                    break;
            }

            localStorage.setItem('mode', nextMode);
            updateText();
            updateMode();
        }

        $(function() {
            updateText();

            document.querySelector('.switch-mode').addEventListener('click', () => {
                press();
            });
        });
    </script>
    <div class="footer-links">
        <div>
            <h4>Links</h4>
            <ul>
                <li><a href="verkaeufer-preise.php">Verkäufer</a></li>
            </ul>
        </div>

        <a class="switch-mode button"></a>
    </div>

    <div>
        <div>
            <img id="footer-logo" loading="lazy" src="./images/mrv.svg" alt="Logo">
        </div>

        <div>
            <p class="maintext">
                <strong>Achtung:</strong> Dieser Webshop ("Brrrrrr-Shop") dient lediglich als Übung, keine der ausgeschilderten Artikel stehen tatsächlich zum Verkauf.
                Außerdem werden keine der ggf. angegebenen Zahlungsinformationen belastet oder überprüft. Sämtliche Angaben sind freiwillig.
            </p>

            <p><strong>UI/UX:</strong> Marvin Roßkothen</p>
            <p><strong>Umsetzung:</strong> Marvin Roßkothen & Steven Lenz</p>

            <ul>
                <li><a href="https://github.com/mrvinrsk/Weebshop/" target="_blank" class="button-tertiary">GitHub Repository</a></li>
            </ul>
        </div>
    </div>
</footer>