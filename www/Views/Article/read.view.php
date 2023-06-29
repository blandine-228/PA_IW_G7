<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
</head>
<body>
    <h1>Articles</h1>
    <table>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Author</th>
            <th>Created at</th>

        </tr>
        <?php foreach ($articles as $article): ?>
            <tr>
                <td><?= $article->getTitle(); ?></td>
                <td><?= $article->getContent(); ?></td>
                <td><?= $article->getUser_id(); ?></td>
                <td><?= $article->getCreated_at(); ?></td>
                
            </tr>
        <?php endforeach; ?>
    </table>
    
</body>
</html>