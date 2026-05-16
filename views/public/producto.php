<?php if (!$currentProduct): ?>
    <section class="page-hero slim">
        <h1>Producto no encontrado</h1>
        <p>Revisa el catalogo para elegir otro electrodomestico.</p>
        <a class="primary-link" href="<?= url() ?>">Volver al inicio</a>
    </section>
<?php else: ?>
    <section class="product-detail">
        <div class="detail-media">
            <span><?= e(substr($currentProduct['categoria'] ?? 'Producto', 0, 2)) ?></span>
        </div>
        <div class="detail-copy">
            <p class="eyebrow"><?= e($currentProduct['categoria'] ?? 'Producto') ?></p>
            <h1><?= e($currentProduct['nombre']) ?></h1>
            <p><?= e($currentProduct['descripcion']) ?></p>
            <div class="detail-price"><?= money($currentProduct['precio']) ?></div>
            <p class="<?= $currentProduct['stock'] > 0 ? 'stock-ok' : 'stock-out' ?>">
                <?= $currentProduct['stock'] > 0 ? (int) $currentProduct['stock'] . ' unidades disponibles' : 'Producto agotado' ?>
            </p>
            <button
                type="button"
                class="add-cart wide"
                data-add-cart
                data-id="<?= (int) $currentProduct['id_producto'] ?>"
                data-name="<?= e($currentProduct['nombre']) ?>"
                data-price="<?= (float) $currentProduct['precio'] ?>"
                <?= $currentProduct['stock'] <= 0 ? 'disabled' : '' ?>
            >
                Agregar al carrito
            </button>
        </div>
    </section>
<?php endif; ?>
