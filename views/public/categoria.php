<section class="page-hero slim">
    <p class="eyebrow">Categoria</p>
    <h1>Productos seleccionados</h1>
    <p>Explora los equipos disponibles en esta seccion.</p>
</section>

<section class="product-grid">
    <?php foreach ($products as $product): ?>
        <?php include __DIR__ . '/partials/product-card.php'; ?>
    <?php endforeach; ?>
</section>

<?php if (empty($products)): ?>
    <p class="empty-state">Esta categoria aun no tiene productos disponibles.</p>
<?php endif; ?>
