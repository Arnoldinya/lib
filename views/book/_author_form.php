<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>

<?= Html::label('Имя', 'name');?>
<?= Html::textInput('Authors[add]['.$n.'][name]', $oAuthor->name, [
	'class' => 'form-control',
	'id' => 'Authors_name_'.$n,
	'maxlength' => 250,
	'style' => ''
]);?>
<br/>

<?= Html::hiddenInput('Authors[add]['.$n.'][author_id]', $oAuthor->id, [
	'id' => 'Authors_author_id_'.$n,
]);?>

<?= Html::button('x', [
	'class' => 'btn btn-danger delete_author', 
	'data-id' => $oAuthor->id, 
	'style' => 'position: absolute; top: 10px; right: 10px;'
]); ?>

<script type="text/javascript">
	$('<?= '#Authors_name_'.$n; ?>').autocomplete({		
		source: "<?= Url::toRoute(['book/ajaxauthorslist']); ?>",
		select: function( event, ui ) {
			$('<?= '#Authors_author_id_'.$n; ?>').val(ui.item.id);
		}
	});
</script>