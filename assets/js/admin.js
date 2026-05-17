document.querySelectorAll('form.admin-form').forEach(form => {
    const quantity = form.querySelector('[name="cantidad"]');
    const price = form.querySelector('[name="precio_unitario"]');
    const total = form.querySelector('[name="total"]');

    if (!quantity || !price || !total) {
        return;
    }

    const calculate = () => {
        const q = Number(quantity.value || 0);
        const p = Number(price.value || 0);
        if (q > 0 && p >= 0) {
            total.value = (q * p).toFixed(2);
        }
    };

    quantity.addEventListener('input', calculate);
    price.addEventListener('input', calculate);
});

document.querySelectorAll('.admin-alert').forEach(alert => {
    window.setTimeout(() => {
        alert.style.opacity = '0';
        alert.style.transform = 'translateY(-6px)';
    }, 3500);
});
