<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Balatbat') ?> | Balatbat</title>
    <link rel="stylesheet" href="<?= base_url('css/site.css') ?>">
</head>
<body>
<header class="site-header">
    <a class="brand" href="<?= site_url('/') ?>">Balatbat</a>
    <nav aria-label="Main navigation">
        <a href="<?= site_url('/') ?>">Home</a>
        <a href="<?= site_url('about') ?>">About</a>
        <a href="<?= site_url('customers') ?>">Customers</a>
        <a href="<?= site_url('users') ?>">Users</a>
    </nav>
</header>
<main>
