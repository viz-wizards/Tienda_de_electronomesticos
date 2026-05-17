<main class="admin-main">
    <header class="admin-topbar">
        <div>
            <p class="eyebrow">Gestion administrativa</p>
            <h1><?= e($crudTitle) ?></h1>
        </div>
        <a class="topbar-button" href="admin.php">Dashboard</a>
    </header>

    <?php if (($_GET['msg'] ?? '') === 'saved'): ?>
        <p class="admin-alert success">Registro guardado correctamente.</p>
    <?php elseif (($_GET['msg'] ?? '') === 'deleted'): ?>
        <p class="admin-alert success">Registro actualizado correctamente.</p>
    <?php elseif (($_GET['msg'] ?? '') === 'error'): ?>
        <p class="admin-alert error">No se pudo completar la operacion.</p>
    <?php endif; ?>

    <section class="admin-grid">
        <article class="admin-card">
            <h2><?= empty($edit) ? 'Nuevo registro' : 'Editar registro' ?></h2>
            <form class="admin-form" method="post" action="process/admin_save.php">
                <input type="hidden" name="entity" value="<?= e($section) ?>">
                <input type="hidden" name="<?= e($primaryKey) ?>" value="<?= e($edit[$primaryKey] ?? '') ?>">

                <?php foreach ($formFields as $field): ?>
                    <?php $value = (($field['type'] ?? '') === 'password') ? '' : ($edit[$field['name']] ?? ($field['default'] ?? '')); ?>
                    <label>
                        <?= e($field['label']) ?>
                        <?php if (($field['type'] ?? 'text') === 'textarea'): ?>
                            <textarea name="<?= e($field['name']) ?>" rows="4"><?= e($value) ?></textarea>
                        <?php elseif (($field['type'] ?? 'text') === 'select'): ?>
                            <select name="<?= e($field['name']) ?>">
                                <?php foreach (($field['options'] ?? []) as $optionValue => $optionLabel): ?>
                                    <option value="<?= e((string) $optionValue) ?>" <?= (string) $value === (string) $optionValue ? 'selected' : '' ?>>
                                        <?= e((string) $optionLabel) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        <?php else: ?>
                            <input
                                type="<?= e($field['type'] ?? 'text') ?>"
                                name="<?= e($field['name']) ?>"
                                value="<?= e((string) $value) ?>"
                                <?= isset($field['step']) ? 'step="' . e($field['step']) . '"' : '' ?>
                                <?= isset($field['min']) ? 'min="' . e($field['min']) . '"' : '' ?>
                            >
                        <?php endif; ?>
                    </label>
                <?php endforeach; ?>

                <button class="form-button" type="submit">Guardar</button>
                <?php if (!empty($edit)): ?>
                    <a class="secondary-link" href="admin.php?section=<?= e($section) ?>">Cancelar edicion</a>
                <?php endif; ?>
            </form>
        </article>

        <article class="admin-card">
            <div class="card-head">
                <div>
                    <p class="eyebrow">Listado</p>
                    <h2><?= e($crudTitle) ?></h2>
                </div>
            </div>
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <?php foreach ($columns as $column): ?>
                                <th><?= e($column['label']) ?></th>
                            <?php endforeach; ?>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($rows)): ?>
                            <?php foreach ($rows as $row): ?>
                                <tr>
                                    <?php foreach ($columns as $column): ?>
                                        <?php $cell = $row[$column['key']] ?? ''; ?>
                                        <td>
                                            <?php if (($column['format'] ?? '') === 'money'): ?>
                                                <?= money($cell) ?>
                                            <?php elseif (($column['format'] ?? '') === 'status'): ?>
                                                <span class="status"><?= e((string) $cell) ?></span>
                                            <?php else: ?>
                                                <?= e((string) $cell) ?>
                                            <?php endif; ?>
                                        </td>
                                    <?php endforeach; ?>
                                    <td class="table-actions">
                                        <a href="admin.php?section=<?= e($section) ?>&edit=<?= (int) $row[$primaryKey] ?>">Editar</a>
                                        <a href="process/admin_delete.php?entity=<?= e($section) ?>&id=<?= (int) $row[$primaryKey] ?>" onclick="return confirm('Deseas eliminar o desactivar este registro?')">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="<?= count($columns) + 1 ?>">No hay registros para mostrar.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </article>
    </section>
</main>
