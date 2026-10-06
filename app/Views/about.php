<?php $title = 'About' ?>
<?= $this->include('partials/header') ?>

<section class="panel">
    <p class="eyebrow">About</p>
    <h1>Simple by design.</h1>
    <p class="lede">This starter application demonstrates a clean CodeIgniter structure with dedicated page, customer, and user controllers.</p>
    <div class="actions">
        <a class="button" href="<?= site_url('customers') ?>">Customer accounts</a>
        <a class="button secondary" href="<?= site_url('users') ?>">User accounts</a>
    </div>
</section>

<?= $this->include('partials/footer') ?>
