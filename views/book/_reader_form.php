<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>

<?= Html::label('Имя', 'name');?>
<?= Html::textInput('Readers[add]['.$k.'][name]', $oReader->name, [
	'class' => 'form-control',
	'id' => 'Readers_name_'.$k,
	'maxlength' => 250,
	'style' => ''
]);?>
<br/>

<?= Html::hiddenInput('Readers[add]['.$k.'][reader_id]', $oReader->id, [
	'id' => 'Readers_reader_id_'.$k,
]);?>

<?= Html::button('x', [
	'class' => 'btn btn-danger delete_author', 
	'data-id' => $oReader->id, 
	'style' => 'position: absolute; top: 10px; right: 10px;'
]); ?>

<script type="text/javascript">
	$('<?= '#Readers_name_'.$k; ?>').autocomplete({		
		source: "<?= Url::toRoute(['book/ajaxreaderlist']); ?>",
		select: function( event, ui ) {
			$('<?= '#Readers_reader_id_'.$k; ?>').val(ui.item.id);
		}
	});
</script>