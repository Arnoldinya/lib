<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>

<?= Html::label('Имя', 'title');?>
<?= Html::textInput('Books[add]['.$n.'][title]', $oBook->title, [
	'class' => 'form-control',
	'id' => 'Books_title_'.$n,
	'maxlength' => 250,
	'style' => ''
]);?>
<br/>

<?= Html::hiddenInput('Books[add]['.$n.'][book_id]', $oBook->id, [
	'id' => 'Books_book_id_'.$n,
]);?>

<?= Html::button('x', [
	'class' => 'btn btn-danger delete_book', 
	'data-id' => $oBook->id, 
	'style' => 'position: absolute; top: 10px; right: 10px;'
]); ?>

<script type="text/javascript">
	$('<?= '#Books_title_'.$n; ?>').autocomplete({		
		source: "<?= Url::toRoute(['reader/ajaxbookslist']); ?>",
		select: function( event, ui ) {
			$('<?= '#Books_book_id_'.$n; ?>').val(ui.item.id);
		}
	});
</script>