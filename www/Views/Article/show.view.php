<h1> Show article</h1>


<h2><?= $article->getTitle(); ?></h2>

<p><?= $article->getContent(); ?></p>

<p>Author: <?= $article->getAuthor(); ?></p>

<p>Created at: <?= $article->getCreated_at(); ?></p>

<button>
<a href="/comment/create?article_id=<?= $article->getId() ?>">Ajouter un commentaire</a>
</button>


<button>

<a href="/comment/show?article_id=<?= $article->getId() ?>">Voir  les commentaires</a>


</button>





