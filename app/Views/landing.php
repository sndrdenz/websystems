<?php $title = 'Home' ?>
<?= $this->include('partials/header') ?>

<section class="hero">
    <p class="eyebrow">Welcome</p>
    <h1>Clear tools for everyday account work.</h1>
    <p class="lede">A small, focused account directory for keeping customer and user information easy to browse.</p>
    <div class="actions">
        <a class="button" href="<?= site_url('customers') ?>">View customers</a>
        <a class="button secondary" href="<?= site_url('users') ?>">View users</a>
    </div>
</section>

<?= $this->include('partials/footer') ?>
