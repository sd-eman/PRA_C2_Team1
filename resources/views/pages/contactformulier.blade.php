<x-layouts.app>
    <div class="contactformulier">
        <h1>Contactformulier</h1>
        <div class="form">
            <div class="form-group">
                <label for="title">Onderwerp</label>
                <input type="text" name="title" id="title" class="form-input">
            </div>

            <div class="form-group">
                <label for="melder">Naam melder</label>
                <input type="text" name="melder" id="melder" class="form-input">
            </div>
            <div class="form-group">
                <label for="overig">Context</label>
                <textarea name="overig" id="overig" class="form-input" rows="4"></textarea>
            </div>
            <div class="button-group">
                <div class="button">
                    <input type="submit" value="Verstuur melding">
                </div>
                <div class="button">
                    <input type="submit" value="Verwijder melding">
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
