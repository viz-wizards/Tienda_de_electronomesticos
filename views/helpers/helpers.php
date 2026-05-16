<?php

function e(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function money(float|string $value): string
{
    return '$' . number_format((float) $value, 0, ',', '.');
}

function asset(string $path): string
{
    return BASE_URL . 'assets/' . ltrim($path, '/');
}

function url(string $path = ''): string
{
    return BASE_URL . ltrim($path, '/');
}
