<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Dashboard</h1>
        <div class="dashboard">
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $item): ?>
                    <div class="widget">
                        <h2><?php echo $item['title']; ?></h2>
                        <p><?php echo $item['content']; ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucune donnée disponible pour le tableau de bord.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>