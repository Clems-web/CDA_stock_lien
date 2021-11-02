<div id="formRegister">
    <form action="?controller=userRegistration" method="POST">
        <div>
            <label for="name">Nom</label>
            <input type="text" name="user-name" id="name">
        </div>
        <div>
            <label for="surname">Prénom</label>
            <input type="text" name="user-surname" id="surname">
        </div>
        <div>
            <label for="mail">Mail</label>
            <input type="email" name="user-mail" id="mail">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="user-pass" id="password">
        </div>
        <div>
            <button type="submit">S'inscrire</button>
        </div>
    </form>
</div>