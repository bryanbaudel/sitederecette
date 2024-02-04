<main>
    <h1>Panier</h1>
    <table class="table" id="panier">
        <thead style="background-color:white">
            <tr>
                <th scope="col">Produit</th>
                <th scope="col">Prix U.</th>
                <th scope="col">Quantité</th>
                <th scope="col">Prix T.</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="2"></td>
                <th scope="row" class="text-end">Total Panier TTC</th>
                <td class="text-end" id="prixTotal">20.00 F</td>
                <td></td>
            </tr>

            <tr>
                <td colspan="2"></td>
                <th scope="row" class="text-end">Frais livraison</th>
                <td class="text-end" id="fraisLivraison">xxx F</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <th scope="row" class="text-end">Montant TVA</th>
                <td class="text-end" id="montantTva">xxx F</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <th scope="row" class="text-end">Réduction</th>
                <td class="text-end" id="reduction">xxx F</td>
                <td></td>
            </tr>

            <tr>
                <td colspan="2"></td>
                <th scope="row" class="text-end">Total à payer</th>
                <td class="text-end" id="totalPayer">xxx F</td>
                <td></td>
            </tr>
        </tfoot>
    </table>

    <div class="d-flex justify-content-end" >
        <a href="/recettes" class="btn btn-success" style="background-color:black">Revenir en arrière</a>
        <a href="/panier/formulaire" class="btn btn-success" style="background-color:black">Paiement</a>
    </div>     
</main>
