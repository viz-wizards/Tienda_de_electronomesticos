<section class="hero">
    <div class="hero-copy">
        <p class="eyebrow">Tienda de electrodomesticos</p>
        <h1>Equipa tu hogar con tecnologia confiable.</h1>
        <p>Encuentra televisores, linea blanca, cocina, climatizacion y audio con disponibilidad clara y compra rapida.</p>
        <form class="search" method="get" action="<?= url() ?>">
            <input type="search" name="q" value="<?= e($query ?? '') ?>" placeholder="Buscar productos...">
            <button type="submit">Buscar</button>
        </form>
    </div>
    <div class="hero-visual" aria-hidden="true">
        <div class="appliance appliance-tv"></div>
        <div class="appliance appliance-washer"></div>
        <div class="appliance appliance-speaker"></div>
    </div>
</section>

<section class="category-strip" aria-label="Categorias">
    <?php foreach ($categories as $category): ?>
        <a href="<?= url('?page=categoria&id=' . (int) $category['id_categoria']) ?>">
            <strong><?= e($category['nombre']) ?></strong>
            <span><?= e($category['descripcion'] ?? '') ?></span>
        </a>
    <?php endforeach; ?>
</section>

<section class="section-head">
    <div>
        <p class="eyebrow"><?= $query ? 'Resultados' : 'Productos destacados' ?></p>
        <h2><?= $query ? 'Busqueda: ' . e($query) : 'Listos para llevar' ?></h2>
    </div>
</section>

<section class="product-grid">
    <?php foreach ($products as $product): ?>
        <?php include __DIR__ . '/partials/product-card.php'; ?>
    <?php endforeach; ?>
</section>

<?php if (empty($products)): ?>
    <p class="empty-state">No encontramos productos para esta busqueda.</p>
<?php endif; ?>
