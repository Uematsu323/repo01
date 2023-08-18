<?= $this->Form->create(null,['url' => ['controller' => 'Threads','action' => 'createnewthread']]); ?>
<?= $this->Form->control('title',['type' => 'text','label' => 'タイトル']); ?>
<?= $this->Form->control('discription',['type' => 'textarea','label' => '内容']); ?>


<?php if(!empty($errormessage)): ?>
	<ul class='errormessage'>
		<?php foreach($errormessage as $value): ?>
			<li><?php echo $value; ?></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>

<?= $this->Form->submit('送信'); ?>
<?= $this->Form->end(); ?>