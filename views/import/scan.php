
<table>

	<?php
	foreach ($files AS $file):
	?>
	<?php
		Yii::app()->clientScript->registerScript(
			'p3media-check:' . $file->id,
			CHtml::ajax(array(
				'url' => array('import/check', 'fileName' => $file->name),
				'dataType' => 'json',
				'beforeSend' => 'function(html){
					$("#status-' . $file->id . '").html("checking");
				}',
				'success' => 'function(result){
					$("#md5-' . $file->id . '").html(result.md5);
					$("#status-' . $file->id . '").html(result.message);
					if (result.warnings == null) $("#button-' . $file->id . ' INPUT").attr("disabled", "");
				}',
				'error' => 'function(jqXHR, textStatus, errorThrown){
					$("#status-' . $file->id . '").html(textStatus);
					$("#status-' . $file->id . '").addClass("error");
						alert("err");
				}',
				)
			)
		);
	?>
		<tr>
			<td><?php echo $file->name ?></td>
			<td id="md5-<?php echo $file->id ?>"></td>
			<td id="button-<?php echo $file->id ?>"><?php
		echo CHtml::ajaxButton(
			'import',
			array(
				'import/file',
				'fileName' => $file->name,
			),
			array(
				'success' => 'function(data){
					$("#status-' . $file->id . '").html("Imported as \'"+data+"\'");
				}',
				'error' => 'function(data){
					$("#status-' . $file->id . '").html("Error");
				}'
			),
			array(
				'disabled' => 'disabled'
			)
		);
	?></td>
		<td id="status-<?php echo $file->id ?>">-</td>
	</tr>
<?php
			endforeach;
?>
</table>