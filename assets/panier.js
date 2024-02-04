const data = JSON.parse(localStorage.getItem('panier'));

document.addEventListener('DOMContentLoaded', () => {
  const panier = document.getElementById('panier');
  const tbody = document.createElement('tbody');
  panier?.appendChild(tbody);
  let totalPanier = 0;

  data.products.forEach(product => {
    const tr = document.createElement('tr');
    tr.innerHTML = `<th scope="row">${product.name}</th>
                    <td class="align-middle text-end">${formatPrice(product.price)}</td>
                    <td class="align-middle text-center">
                      <div class="input-group mb-3">
                        <button class="btn btn-outline-secondary btn-panier-remove" data-id="${product.id}" data-price="${product.price}" type="button">-</button>
                        <input type="number" class="form-control" value="${product.quantity}">
                        <button class="btn btn-outline-secondary btn-panier-add" data-id="${product.id}" data-price="${product.price}" type="button">+</button>
                      </div>
                    </td>
                    <td class="align-middle text-end">${formatPrice(product.quantity * product.price)}</td>
                    <td class="align-middle">
                      <button class="btn btn-danger btn-delete">X</button>
                    </td>`;

    totalPanier += product.quantity * product.price;
    tbody.appendChild(tr);
  });

  calculPrixPanier(totalPanier);

  const btnadd = document.querySelectorAll('.btn-panier-add');
  btnadd.forEach(btn => {
    btn.addEventListener('click', (e) => {
    });
  });

  const btnremove = document.querySelectorAll('.btn-panier-remove');
  btnremove.forEach(btn => {
    btn.addEventListener('click', (e) => {
    });
  });

  const btnDelete = document.querySelectorAll('.btn-delete');
  btnDelete.forEach(btn => {
    btn.addEventListener('click', (e) => {
    });
  });
});

const calculPrixPanier = (totalPanier) => {
  localStorage.setItem('panier', JSON.stringify(data));
  let fraisLivraison = 0;
  let reduction = 0;

  if (totalPanier <= 600) {
    fraisLivraison = 0;
  }

  const prixTotalElement = document.getElementById('prixTotal');
  const montantTva = document.getElementById('montantTva');
  const fraisLivraisonTotal = document.getElementById('fraisLivraison');
  const reductionTotal = document.getElementById('reduction');
  const totalPayer = document.getElementById('totalPayer');

  if (prixTotalElement != null) {
    prixTotalElement.innerHTML = formatPrice(totalPanier);
  }

};

const formatPrice = (price) => {
  return price.toFixed(2).replace('.', ',') + ' F';
};
