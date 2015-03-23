<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $oReader app\models\Reader */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reader-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($oReader, 'name')->textInput(['maxlength' => 250]) ?>

    <h3>Книги</h3>
	
	<div id="deleted_book"></div>
	
	<div id="book">
		<?php $n = 0;?>
		<?php if ($oReader->books): ?>
			<?php foreach ($oReader->books as $oBook): ?>
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
        <?= Html::submitButton($oReader->isNewRecord ? 'Добавить' : 'Сохранить', [
        	'class' => $oReader->isNewRecord ? 'btn btn-success' : 'btn btn-primary'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
	n = <?php echo $n;?>;
	
	$('#add_book').click(function(){
		n++;

		$.post("<?= Url::toRoute(['reader/ajaxaddbook']); ?>", {
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
