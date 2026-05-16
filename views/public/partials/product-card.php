<article class="product-card">
    <a class="product-media" href="<?= url('?page=producto&id=' . (int) $product['id_producto']) ?>">
        <span><?= e(substr($product['categoria'] ?? 'Producto', 0, 2)) ?></span>
    </a>
    <div class="product-body">
        <p class="category-name"><?= e($product['categoria'] ?? 'General') ?></p>
        <h3><a href="<?= url('?page=producto&id=' . (int) $product['id_producto']) ?>"><?= e($product['nombre']) ?></a></h3>
        <p><?= e($product['descripcion']) ?></p>
        <div class="product-meta">
            <strong><?= money($product['precio']) ?></strong>
            <span class="<?= $product['stock'] > 0 ? 'stock-ok' : 'stock-out' ?>">
                <?= $product['stock'] > 0 ? (int) $product['stock'] . ' disponibles' : 'Agotado' ?>
            </span>
        </div>
        <button
            type="button"
            class="add-cart"
            data-add-cart
            data-id="<?= (int) $product['id_producto'] ?>"
            data-name="<?= e($product['nombre']) ?>"
            data-price="<?= (float) $product['precio'] ?>"
            <?= $product['stock'] <= 0 ? 'disabled' : '' ?>
        >
            Agregar
        </button>
    </div>
</article>
