<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Tableau de bord</h1>
        <div class="dashboard">
            <?php foreach ($data as $item): ?>
                <div class="widget">
                    <h2><?php echo $item['title']; ?></h2>
                    <p><?php echo $item['content']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>