<h1><?= $title ?></h1>

<a href="/newthread/">スレッドをたてる</a>

<?php foreach($threads as $thread): ?>
    <div>
        <h2><?= $thread->title ?></h2>
        <p><?= $thread->discription ?></p>
        <a href="<?= $thread->getUrl() ?>">スレッドへ移動</a>
    </div>
<?php endforeach ?>

<h2>APIについて</h2>
<a href="/api/" ?>スレッドへ移動</a>