(function () {
    const storageKey = 'electrohogar_cart';
    const drawer = document.querySelector('[data-cart-drawer]');
    const itemsNode = document.querySelector('[data-cart-items]');
    const totalNode = document.querySelector('[data-cart-total]');
    const countNode = document.querySelector('[data-cart-count]');

    const currency = new Intl.NumberFormat('es-CO', {
        style: 'currency',
        currency: 'COP',
        maximumFractionDigits: 0
    });

    function loadCart() {
        try {
            return JSON.parse(localStorage.getItem(storageKey)) || [];
        } catch (error) {
            return [];
        }
    }

    function saveCart(cart) {
        localStorage.setItem(storageKey, JSON.stringify(cart));
    }

    function renderCart() {
        const cart = loadCart();
        const count = cart.reduce((sum, item) => sum + item.quantity, 0);
        const total = cart.reduce((sum, item) => sum + item.quantity * item.price, 0);

        if (countNode) countNode.textContent = count;
        if (totalNode) totalNode.textContent = currency.format(total);
        if (!itemsNode) return;

        if (cart.length === 0) {
            itemsNode.innerHTML = '<p class="empty-cart">Tu carrito esta vacio.</p>';
            return;
        }

        itemsNode.innerHTML = cart.map(item => `
            <article class="cart-item">
                <div>
                    <strong>${escapeHtml(item.name)}</strong>
                    <p>${item.quantity} x ${currency.format(item.price)}</p>
                </div>
                <button type="button" data-remove-cart="${item.id}">Quitar</button>
            </article>
        `).join('');
    }

    function escapeHtml(value) {
        return String(value).replace(/[&<>"']/g, char => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        }[char]));
    }

    document.addEventListener('click', event => {
        const addButton = event.target.closest('[data-add-cart]');
        const removeButton = event.target.closest('[data-remove-cart]');

        if (addButton) {
            const cart = loadCart();
            const id = addButton.dataset.id;
            const found = cart.find(item => item.id === id);

            if (found) {
                found.quantity += 1;
            } else {
                cart.push({
                    id,
                    name: addButton.dataset.name,
                    price: Number(addButton.dataset.price),
                    quantity: 1
                });
            }

            saveCart(cart);
            renderCart();
            drawer?.classList.add('open');
            drawer?.setAttribute('aria-hidden', 'false');
        }

        if (removeButton) {
            const cart = loadCart().filter(item => item.id !== removeButton.dataset.removeCart);
            saveCart(cart);
            renderCart();
        }

        if (event.target.closest('[data-cart-open]')) {
            drawer?.classList.add('open');
            drawer?.setAttribute('aria-hidden', 'false');
        }

        if (event.target.closest('[data-cart-close]') || event.target === drawer) {
            drawer?.classList.remove('open');
            drawer?.setAttribute('aria-hidden', 'true');
        }
    });

    renderCart();
})();
