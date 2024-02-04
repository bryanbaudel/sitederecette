let panier = {};

document.addEventListener('DOMContentLoaded', () => {
    if (localStorage.getItem('panier') === null) {
        panier = { products: [] };
    } else {
        panier = JSON.parse(localStorage.getItem('panier'));
        console.log(panier);
        totalProduit();
    }
    
    const btns = document.querySelectorAll('.add-to-cart');
    btns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            console.log('Bouton cliqué');

            const produit = panier.products.find(product => product.id === e.target.dataset.id);

            if (produit !== undefined) {
                produit.quantity++;
            } else {
                const product = {
                    "id": e.target.dataset.id,
                    "name": e.target.parentElement.parentElement.querySelector('.card-title').innerText,
                    "price": parseFloat(e.target.parentElement.parentElement.querySelector('.price').innerText),
                    "quantity": 1,
                };
                panier.products.push(product);
            }

            console.log(panier);
            totalProduit();
            localStorage.setItem('panier', JSON.stringify(panier));
        });
    });
});

const totalProduit = () => {
    let nbProduits = 0;
    panier.products.forEach(product => {
        nbProduits += product.quantity;
    });
    document.getElementById('cart').innerText = nbProduits;
};
