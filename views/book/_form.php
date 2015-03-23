<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $oBook app\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($oBook, 'title')->textInput(['maxlength' => 250]) ?>

    <h3>Авторы</h3>
	
	<div id="deleted_author"></div>
	
	<div id="author">
		<?php $n = 0;?>
		<?php if ($oBook->authors): ?>
			<?php foreach ($oBook->authors as $oAuthor): ?>
				<?php $n++;?>
				<div class="well" id="<?php echo $n;?>" style="position: relative;">
					<?= $this->render('_author_form', [
				            'oAuthor' => $oAuthor,
				            'n' => $n,
				        ]); 
					?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>

	<?php echo Html::button('Добавить автора', [
		'class' => 'btn btn-success', 
		'style' => '', 
		'id' => 'add_author',
	]);?>	

    <h3>Читатели</h3>
	
	<div id="deleted_reader"></div>
	
	<div id="reader">
		<?php $k = 0;?>
		<?php if ($oBook->readers): ?>
			<?php foreach ($oBook->readers as $oReader): ?>
				<?php $k++;?>
				<div class="well" style="position: relative;">
					<?= $this->render('_reader_form', [
				            'oReader' => $oReader,
				            'k' => $k,
				        ]); 
					?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>

	<?php echo Html::button('Добавить читателя', [
		'class' => 'btn btn-success', 
		'style' => '', 
		'id' => 'add_reader',
	]);?>	

    <div class="form-group" style="margin-top: 20px;">
        <?= Html::submitButton($oBook->isNewRecord ? 'Добавить' : 'Сохранить', [
        	'class' => $oBook->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
	n = <?php echo $n;?>;
	
	$('#add_author').click(function(){
		n++;

		$.post("<?= Url::toRoute(['book/ajaxaddauthor']); ?>", {
				'n' : n, 
			}, function(data){
				div = '<div id = "' + n +'" class="well" style="position: relative;">' + data + '</div>';
				$(div).appendTo('#author');
		});
	});
	
	$(document).on('click', '.delete_author', function(){
		input = "<input type='hidden' \
		name='Authors[del][" + $(this).attr('data-id') + "]' \
		value='" + $(this).attr('data-id') + "' />";
		
		$(input).appendTo('#deleted_author');
		$(this).parent('div').remove();
	});

	k = <?php echo $k;?>;
	$('#add_reader').click(function(){
		k++;

		$.post("<?= Url::toRoute(['book/ajaxaddreader']); ?>", {
				'k' : k, 
			}, function(data){
				div = '<div class="well" style="position: relative;">' + data + '</div>';
				$(div).appendTo('#reader');
		});
	});
	
	$(document).on('click', '.delete_reader', function(){
		input = "<input type='hidden' \
		name='Readers[del][" + $(this).attr('data-id') + "]' \
		value='" + $(this).attr('data-id') + "' />";
		
		$(input).appendTo('#deleted_reader');
		$(this).parent('div').remove();
	});
</script>
