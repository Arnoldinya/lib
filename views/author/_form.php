<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $oAuthor app\models\Author */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="author-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($oAuthor, 'name')->textInput(['maxlength' => 250]) ?>

    <h3>Книги</h3>
	
	<div id="deleted_book"></div>
	
	<div id="book">
		<?php $n = 0;?>
		<?php if ($oAuthor->books): ?>
			<?php foreach ($oAuthor->books as $oBook): ?>
				<?php $n++;?>
				<div class="well" id="<?php echo $n;?>" style="position: relative;">
					<?= $this->render('_book_form', [
				            'oBook' => $oBook,
				            'n' => $n,
				        ]); 
					?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>

	<?php echo Html::button('Добавить книгу', [
		'class' => 'btn btn-success', 
		'style' => '', 
		'id' => 'add_book',
	]);?>

    <div class="form-group" style="margin-top: 20px;">
        <?= Html::submitButton($oAuthor->isNewRecord ? 'Добавить' : 'Сохранить', [
        	'class' => $oAuthor->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
	n = <?php echo $n;?>;
	
	$('#add_book').click(function(){
		n++;

		$.post("<?= Url::toRoute(['author/ajaxaddbook']); ?>", {
				'n' : n, 
			}, function(data){
				div = '<div id = "' + n +'" class="well" style="position: relative;">' + data + '</div>';
				$(div).appendTo('#book');
		});
	});
	
	$(document).on('click', '.delete_book', function(){
		input = "<input type='hidden' \
		name='Books[del][" + $(this).attr('data-id') + "]' \
		value='" + $(this).attr('data-id') + "' />";
		
		$(input).appendTo('#deleted_book');
		$(this).parent('div').remove();
	});
</script>
