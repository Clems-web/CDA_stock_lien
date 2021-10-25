<div id="formLink">
    <form action="?controller=userAddLink" method="POST">
        <div>
            <label for="link">Lien</label>
            <input type="text" name="link-href" id="link">
        </div>
        <div>
            <label for="link-titre">Titre</label>
            <input type="text" name="link-title" id="link-titre">
        </div>
        <div>
            <label for="link-cible">Target</label>

            <select name="link-target" id="link-cible">
                <option value="_blank">_blank</option>
                <option value="parent">parent</option>
                <option value="self">self</option>
                <option value="top">top</option>
            </select>
        </div>
        <div>
            <label for="link-nom">Nom</label>
            <input type="text" name="link-name" id="link-nom">
        </div>
        <div>
            <button type="submit">Ajouter</button>
        </div>
    </form>
</div>
