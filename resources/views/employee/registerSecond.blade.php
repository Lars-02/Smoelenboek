<x-layout>
    <div>
        <h1 class="text-5xl pl-10 pt-3 pb-2">Gegevens invullen</h1>
        <div class="bg-red-600 w-3/12 h-3 rounded-2xl"></div>
    </div>
    <div>
        <form>
            <label>Afdeling</label>
            <select name="Afdelingen" id="departments">
                <option value="default">Afdeling selecteren...</option>
                <option value="AB&I">AB&I</option>
                <option value="AII">AII</option>
                <option value="AKD">AKD</option>
            </select>
            <label>Functie</label>
            <select name="Functie" id="Job">
                <option value="default">Functie selecteren...</option>
                <option value="teacher">Docent</option>
                <option value="principal">Directeur</option>
                <option value="janitor">Conciërge</option>
            </select>
            <label>Expertise</label>
            <select name="Expertise" id="expertise">
                <option value="default">Expertise selecteren...</option>
                <option value="bigDataManagement">Big Data Management</option>
                <option value="dataAnalyst">Data Analyst</option>
                <option value="consultancy">Consultancy</option>
            </select>
            <button id="colored" type="submit">Terug</button>
            <button id="colored" type="submit">Volgende</button>

        </form>
    </div>
</x-layout>
