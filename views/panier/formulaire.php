<nav class="navbar navbar-expand-lg navbar-light" style="background-color:whitesmoke";>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>

<section>
    <h1>Vos informations</h1>
    <form>
        <div>
            <label for="nom">Nom</label>
            <input type="text" class="form-control validation" id="nom" name="nom" 
            data-required="true" 
            data-type="text"
            data-min="2" data-max="50">
            <span class="invalid-feedback"></span>
        </div><br/>
        <div>
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control validation" id="prenom" name="prenom" 
            data-required="true" 
            data-type="text"
            data-min="2" data-max="50">
            <span class="invalid-feedback"></span>
        </div><br/>

        <div>
            <label for="adresse">Adresse</label>
            <input type="adresse" class="form-control validation" id="adresse" name="adresse" 
            data-required="true" 
            data-type="adresse"
            data-min="10" data-max="70">
            <span class="invalid-feedback"></span>
        </div><br/>

        <div>
            <label for="codepostal">Code postal</label>
            <input type="codepostal" class="form-control validation" id="codepostal" name="codepostal" 
            data-required="true" 
            data-type="codepostal"
            data-min="5" data-max="5">
            <span class="invalid-feedback"></span>
        </div><br/>

        <div>
            <label for="email">Email</label>
            <input type="email" class="form-control validation" id="email" name="email" 
            data-required="true" 
            data-type="email"
            data-min="2" data-max="50">
            <span class="invalid-feedback"></span>
        </div><br/>

        <div>
            <label for="phoneNumber">Numéro de téléphone</label>
            <input type="phoneNumber" class="form-control validation" id="phoneNumber" name="phoneNumber" 
            data-required="true" 
            data-type="phoneNumber"
            data-min="6" data-max="6">
            <span class="invalid-feedback"></span>
        </div><br/>
    </form>
</section><br/>

<section>
    <form>
        <h2>Paiement</h2>
        <div>
            <label for="cartNumber">Numéro de carte</label>
            <input type="cartNumber" class="form-control validation" id="cartNumber" name="cartNumber" 
            data-required="true" 
            data-type="cartNumber"
            data-min="16" data-max="16">
            <span class="invalid-feedback"></span>
        </div><br/>

        <label for="date">Date d'expiration</label><br/>
        <select name="date" id="date">
        <option value="">Mois</option>
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="06">06</option>
        <option value="07">07</option>
        <option value="08">08</option>
        <option value="09">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
    </select>
    <select name="date" id="date">
        <option value="">Année</option>
        <option value="2023">2023</option>
        <option value="2024">2024</option>
        <option value="2025">2025</option>
        <option value="2026">2026</option>
        <option value="2027">2027</option>
        <option value="2028">2028</option>
        <option value="2029">2029</option>
        <option value="2030">2030</option>
        <option value="2031">2031</option>
        <option value="2032">2032</option>
        <option value="2033">2033</option>
        <option value="2033">2034</option>
        <option value="2033">2035</option>
        </select>
        <br/>
        <br/><div>
            <label for="codeSecu">Code de sécurité</label>
            <input type="codeSecu" class="form-control validation" id="codeSecu" name="codeSecu" 
            data-required="true" 
            data-type="codeSecu"
            data-min="3" data-max="3">
            <span class="invalid-feedback"></span>
        </div><br/>
    </form><br/>
</section>
<div class="d-flex justify-content-end">
    <a href="/panier" class="btn btn-success" style="background-color:black">Revenir en arrière</a>
    <a href="/recettes" class="btn btn-success" style="background-color:black">Enregistrer et continuer</a>
</div>