<?php
$title = $title ?? 'Supplies';
$supplies = $supplies ?? [];
$created = $created ?? false;

function stockStatus(int $quantity): string
{
    if ($quantity <= 0) return 'Out of stock';
    if ($quantity <= 5) return 'Low stock';
    return 'Available';
}

function stockClass(int $quantity): string
{
    if ($quantity <= 0) return 'danger';
    if ($quantity <= 5) return 'warning';
    return 'success';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?></title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <header class="topbar">
        <strong>Medical Supplies Routing App</strong>
        <nav>
            <a href="/">Home</a>
            <a href="/supplies">Supplies</a>
            <a href="/supplies/create">Add Supply</a>
            <a href="/health">Health</a>
            <a href="/login">Login</a>
            <a href="/logout">Logout</a>
        </nav>
    </header>

    <main class="container">
        <?php if ($created): ?>
            <div class="alert success">
                Supply record added successfully. Redirect response worked.
            </div>
        <?php endif; ?>

        <div class="page-header">
            <div>
                <h1>Medical Supplies</h1>
                <p>This page is handled by SupplyController@index.</p>
            </div>
            <a class="button" href="/supplies/create">Add New Supply</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Supplier</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($supplies as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['code']) ?></td>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                        <td><?= htmlspecialchars($item['category']) ?></td>
                        <td><?= htmlspecialchars($item['supplier']) ?></td>
                        <td><?= number_format($item['price']) ?> VND</td>
                        <td><?= htmlspecialchars((string) $item['quantity']) ?></td>
                        <td>
                            <span class="badge <?= stockClass((int) $item['quantity']) ?>">
                                <?= stockStatus((int) $item['quantity']) ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
