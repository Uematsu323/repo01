<!DOCTYPE html>

<?= $this->Html->css('threads'); ?>

<div class="title">
    <h1><?= $thread->title ?></h1>
</div>
<div class="discription">
    <p><?= $thread->discription ?></p>
</div>

<div class="contents">
    <div class="form">
        <?= $this->Form->create(null,['url' => $thread->getCreateUrl()]); ?>
        <?= $this->Form->control('text',['type' => 'textarea','label' => '本文','error' => false]); ?>

        <?php if ($this->Form->isFieldError('text')) : ?>
            <?= $treads->Form->error('text') ?>
        <?php endif ?>

        <?php /* <?= $this->Form->error('text'); ?> */ ?>
        <?php /* if($entity): ?>
            <?= $error('text') ?>
        <?php endif; */ ?>

        <?= $this->Form->submit('送信'); ?>
        <?= $this->Form->end(); ?>
    </div>

    <div class="comments">
        <?php foreach($comments as $key => $comment): ?>
            <div>
                <p>ID:<?= $key+1 ?> 更新日:<?= $comment->getModified() ?></p>
                <p><?= $comment->text ?></p>

                <div class="like-area">
                    <div>いいね!</div>
                    <a href="#" id="like-btn<?= h($comment['id']); ?>" data-id="<?= h($comment['id']); ?>">&#9825;</a>
                    <p><span id="goodCount<?= h($comment['id']); ?>"></span></p>
            

                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>



<script type="text/javascript">
    console.log($("[id ^= 'like-btn']"))
    $("[id ^= 'like-btn']").click(function(){
        console.log($(this))
        event.preventDefault();
        $.ajax({
            type:'GET',
            datatype:'json',
            url:"http://frameworkpractice.lo130/comment/<?= $comment->id ?>",

            type:'POST',
            datatype:'json',
            url:"/comments/like"




        }).done(function(data){
            var data_stringify = JSON.stringify(data);
            var data_json = JSON.parse(data_stringify);
            var data_id = data_json;

            <?php /*
            var json = file_get_contents(data);
            var arr = json_decode($json,true);
            */ ?>

            $("[id ^= 'goodCount']").text(data_id);

        }).fail(function(data){
            console.log('error');
        })
    });
</script>


"like-btn"がひとつしかないことになってる
データベースと連携してない