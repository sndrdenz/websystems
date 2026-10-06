<?php $title = 'Customer Accounts' ?>
<?= $this->include('partials/header') ?>

<section class="panel">
    <p class="eyebrow">Directory</p>
    <h1>Customer Accounts</h1>
    <p class="lede">Browse customer account information.</p>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date registered</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($customers)): ?>
                    <tr>
                        <td colspan="5">No customer accounts found.</td>
                    </tr>
                <?php endif; ?>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?= esc($customer['id']) ?></td>
                        <td><?= esc($customer['full_name']) ?></td>
                        <td><?= esc($customer['email']) ?></td>
                        <td><?= esc($customer['phone'] ?? 'Not provided') ?></td>
                        <td><?= esc($customer['created_at']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<?= $this->include('partials/footer') ?>
