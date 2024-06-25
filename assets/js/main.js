document.addEventListener('DOMContentLoaded', (event) => {
    const currentPage = document.body.getAttribute('data-page');

    if (currentPage === 'catalog') {
        updateBasketCount();

        window.addToBasket = function(name, price, description, image) {
            let basket = JSON.parse(localStorage.getItem('basket')) || [];
            const existingItemIndex = basket.findIndex(item => item.name === name);

            if (existingItemIndex !== -1) {
                alert(`${name} is already in the basket. You can adjust the quantity at checkout.`);
                return;
            }

            const newItem = { name, price, description, image, quantity: 1 };
            basket.push(newItem);
            localStorage.setItem('basket', JSON.stringify(basket));
            updateBasketCount();
            alert(`${name} has been added to the basket.`);
        };

        function updateBasketCount() {
            const basket = JSON.parse(localStorage.getItem('basket')) || [];
            document.getElementById('basketCount').innerText = basket.length;
        }
    }

    if (currentPage === 'checkout') {
        const basket = JSON.parse(localStorage.getItem('basket')) || [];
        const basketItemsContainer = document.getElementById('basketItems');
        let totalPrice = 0;

        basket.forEach((item, index) => {
            const itemElement = document.createElement('div');
            itemElement.className = 'card mb-3';
            itemElement.innerHTML = `
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="assets/images/${item.image}" class="card-img" alt="${item.name}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">${item.name}</h5>
                            <p class="card-text">${item.description}</p>
                            <p class="card-text">Price: Rp. ${item.price}</p>
                            <div class="form-group">
                                <label for="quantity-${index}">Quantity:</label>
                                <input type="number" class="form-control quantity-input" id="quantity-${index}" value="${item.quantity}" min="1" data-index="${index}" data-price="${item.price}">
                            </div>
                        </div>
                    </div>
                </div>
            `;
            basketItemsContainer.appendChild(itemElement);
            totalPrice += item.price * item.quantity;
        });

        document.getElementById('totalPrice').value = totalPrice;

        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('input', function() {
                const index = this.getAttribute('data-index');
                const price = this.getAttribute('data-price');
                basket[index].quantity = parseInt(this.value);
                localStorage.setItem('basket', JSON.stringify(basket));
                updateTotalPrice();
            });
        });

        function updateTotalPrice() {
            let newTotalPrice = 0;
            basket.forEach(item => {
                newTotalPrice += item.price * item.quantity;
            });
            document.getElementById('totalPrice').value = newTotalPrice;
        }

        document.getElementById('checkoutForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const paymentMethod = document.getElementById('paymentMethod').value;
            alert(`Pembayaran Akan Dialihkan Ke ${paymentMethod}`);
            // Clear the basket after successful submission
            localStorage.removeItem('basket');
        });
    }
});
