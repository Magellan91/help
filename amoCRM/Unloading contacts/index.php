<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

//use yii\widgets\Pjax;

$this->title='КПК - Совет';
?>

<?php //Pjax::begin(); ?>
<?php $form=ActiveForm::begin([
	'options'=>['class'=>''],
	'action'=>'/web/site/save',
	'fieldConfig'=>[
		'template'=>'<div class="col-4"> {label}{input} </div>'
	]

]) ?>

	<div class="col-xs-8 ">

	<div class="col-xs-12"><h3 class="text-righet content-name">Для выгрузки в базе осталось:</h3><br>
	</div>
<?php foreach($data

	as $value){ ?>
	<div class="col-3"><?=$value?>
	<div>
<?php } ?>
	<div class="col-12">


			<?=$form->field($model,'city')->dropDownList($cite)->label(Yii::t('app','Город:'))?>
			<?=$form->field($model,'phone')->dropDownList($manager)->label(Yii::t('app','Ответственный:'))?>
		<h4 class="text-left" style="color:red;  position: absolute;
    right: 2em;">Не выгружать больше 200 за один раз!</h4><br>
			<?=$form->field($model,'name')->textInput()->label(Yii::t('app','Количество:'))?>

	</div>


		<div class="col-md-12 ">
			<br>
			<?=Html::submitButton('Загрузить',['class'=>'btn btn-default'])?>

		</div>
	</div>


<?php ActiveForm::end() ?>
<?php //Pjax::end(); ?>