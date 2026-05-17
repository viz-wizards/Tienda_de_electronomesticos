<?php
$crudTitle = 'Pagos';
$primaryKey = 'id_pago';
$ventaOptions = [];
foreach (($ventas ?? []) as $venta) {
    $ventaOptions[$venta['id_venta']] = '#' . $venta['id_venta'] . ' - ' . $venta['nombres'] . ' ' . $venta['apellidos'];
}
$formFields = [
    ['name' => 'id_venta', 'label' => 'Venta', 'type' => 'select', 'options' => $ventaOptions],
    ['name' => 'monto', 'label' => 'Monto', 'type' => 'number', 'step' => '0.01', 'min' => '0'],
    ['name' => 'metodo_pago', 'label' => 'Metodo', 'type' => 'select', 'options' => ['Efectivo' => 'Efectivo', 'Tarjeta' => 'Tarjeta', 'Yape' => 'Yape', 'Plin' => 'Plin', 'Transferencia' => 'Transferencia']],
    ['name' => 'fecha_pago', 'label' => 'Fecha', 'type' => 'date', 'default' => date('Y-m-d')],
    ['name' => 'estado', 'label' => 'Estado', 'type' => 'select', 'options' => ['Pagado' => 'Pagado', 'Pendiente' => 'Pendiente', 'Anulado' => 'Anulado'], 'default' => 'Pagado'],
    ['name' => 'observacion', 'label' => 'Observacion', 'type' => 'textarea'],
];
$columns = [
    ['key' => 'id_pago', 'label' => 'ID'],
    ['key' => 'id_venta', 'label' => 'Venta'],
    ['key' => 'nombres', 'label' => 'Cliente'],
    ['key' => 'monto', 'label' => 'Monto', 'format' => 'money'],
    ['key' => 'metodo_pago', 'label' => 'Metodo'],
    ['key' => 'fecha_pago', 'label' => 'Fecha'],
    ['key' => 'estado', 'label' => 'Estado', 'format' => 'status'],
];
include __DIR__ . '/_crud.php';
