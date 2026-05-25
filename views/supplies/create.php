<?php
$title = $title ?? 'Add Supply';
$error = $error ?? null;
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
        <h1>Add New Supply</h1>
        <p>This form submits to <code>POST /supplies</code>.</p>

        <?php if ($error): ?>
            <div class="alert danger">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form class="form-card" method="POST" action="/supplies">
            <div class="form-group">
                <label>Supply Code</label>
                <input type="text" name="code" placeholder="MED-006">
            </div>

            <div class="form-group">
                <label>Supply Name</label>
                <input type="text" name="name" placeholder="Oxygen Mask">
            </div>

            <div class="form-group">
                <label>Category</label>
                <input type="text" name="category" placeholder="Respiratory">
            </div>

            <div class="form-group">
                <label>Supplier</label>
                <input type="text" name="supplier" placeholder="HealthTech">
            </div>

            <div class="form-group">
                <label>Unit Price</label>
                <input type="number" name="price" placeholder="45000">
            </div>

            <div class="form-group">
                <label>Quantity</label>
                <input type="number" name="quantity" placeholder="100">
            </div>

            <button class="button" type="submit">Save Record</button>
            <a class="button secondary" href="/supplies">Back to List</a>
        </form>
    </main>
</body>
</html>
