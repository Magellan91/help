<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

$this->title='Austec'.' - '.Yii::$app->params['siteName'];

?>

<div class="col-md-2"></div>
<div class="col-md-8">
	<div class="heads"><h4>Документо генерация для Austec</h4>
		<img class="logo" src="https://nisa8020.com/wa-data/public/site/themes/default/img/logo-brand-inverse.svg">
	</div>
	<div class="content"><h3 class="text-center">Бланк замера по кондиционированию:</h3>
		<?php Pjax::begin(); ?>
		<?php $form=ActiveForm::begin([
			'options'=>['class'=>''],
			'action'=>'/austec/save',
			'fieldConfig'=>[
				'template'=>'<div class="col-md-4"> {label}{input} </div>'
			]

		]) ?>

		<div class="col-md-12 ">
			<h4 class="text-righet content-name">Информация о клиенте:</h4>
			<?=$form->field($model,'company')->textInput()->label(Yii::t('app','Организация:'))?>
			<?=$form->field($model,'fio')->textInput()->label(Yii::t('app','ФИО:'))?>
			<?=$form->field($model,'adres')->textInput()->label(Yii::t('app','Адрес:'))?>
			<?=$form->field($model,'phone')->textInput()->label(Yii::t('app','Телефон:'))?>
			<?=$form->field($model,'email')->textInput()->label(Yii::t('app','E-mail:'))?>
		</div>

		<div class="col-md-12">
			<h4 class="text-righet content-name">Характеристики помещения:</h4>
			<?=$form->field($model,'area')->textInput()->label(Yii::t('app','Площадь:'))?>
			<?=$form->field($model,'type')->textInput()->label(Yii::t('app','Тип помещения:'))?>
			<?=$form->field($model,'height')->textInput()->label(Yii::t('app','Высота потолка:'))?>
			<?=$form->field($model,'windows[amount]')->textInput()->label(Yii::t('app','Кол-во окон:'))?>
			<?=$form->field($model,'windows[type]')->dropDownList([
				'Солничная',
				'Не солничная'
			],['prompt'=>'Выбери сторону ...'])->label(Yii::t('app','Сторона:'))?>
			<?=$form->field($model,'heat')->textInput()->label(Yii::t('app','Дополнительные теплопритоки:'))?>
			<?=$form->field($model,'watt')->textInput()->label(Yii::t('app','Мощность кондиционера:'))?>
			<?=$form->field($model,'type_cond')->textInput()->label(Yii::t('app','Тип:'))?>
			<?=$form->field($model,'make')->textInput()->label(Yii::t('app','Марка:'))?>
		</div>
		<div class="col-md-12">
			<h4 class="text-righet content-name">Расходные материалы:</h4>

			<div class="col-md-12 check">
				<section class="ac-container">
					<div>
						<input id="ac-1" name="accordion-1" type="checkbox"/>
						<label for="ac-1">Труба с изоляцией</label>
						<article class="ac-small">
							<div style="margin-bottom:1em">
								<?=$form->field($model,'custom[trumpet][0]')->textInput()->label(Yii::t('app','Труба медная 1/2":'))?>
								<?=$form->field($model,'custom[trumpet][1]')->textInput()->label(Yii::t('app','Труба медная 1/4":'))?>
								<?=$form->field($model,'custom[trumpet][2]')->textInput()->label(Yii::t('app','Труба медная 3/4":'))?>
								<?=$form->field($model,'custom[trumpet][3]')->textInput()->label(Yii::t('app','Труба медная 3/8"(9,52мм):'))?>
								<?=$form->field($model,'custom[trumpet][4]')->textInput()->label(Yii::t('app','Труба медная 5/8"(15,87мм):'))?>
							</div>

						</article>
					</div>
					<div>
						<input id="ac-2" name="accordion-1" type="checkbox"/>
						<label for="ac-2">Дренажная труба</label>
						<article class="ac-medium">
							<?=$form->field($model,'custom[drainage][0]')->textInput()->label(Yii::t('app','Дренажная труба Ф16мм (25м):'))?>
							<?=$form->field($model,'custom[drainage][1]')->textInput()->label(Yii::t('app','Трубка капиллярная 6*9мм (25м):'))?>
							<?=$form->field($model,'custom[drainage][2]')->textInput()->label(Yii::t('app',' Помпа дренажная:'))?>
						</article>
					</div>
					<div>
						<input id="ac-3" name="accordion-1" type="checkbox"/>
						<label for="ac-3">Кронштейны</label>
						<article class="ac-large">
							<?=$form->field($model,'custom[bracket][0]')->textInput()->label(Yii::t('app','Кронштейны 1000мм (усиленные):'))?>
							<?=$form->field($model,'custom[bracket][1]')->textInput()->label(Yii::t('app','Кронштейны 450мм (модели 07-12):'))?>
							<?=$form->field($model,'custom[bracket][2]')->textInput()->label(Yii::t('app','Кронштейны 500мм (модели 12-18):'))?>
							<?=$form->field($model,'custom[bracket][3]')->textInput()->label(Yii::t('app','Кронштейны 600мм (модели 18-24):'))?>
							<?=$form->field($model,'custom[bracket][4]')->textInput()->label(Yii::t('app','Подставка наружная 930*520*320:'))?>
						</article>
					</div>
					<div>
						<input id="ac-4" name="accordion-1" type="checkbox"/>
						<label for="ac-4">Гайки, Шайбы, Дюбель, Саморезы, Шурупы</label>
						<article class="ac-large">
							<?=$form->field($model,'custom[nuts][0]')->textInput()->label(Yii::t('app','Набор крепежа стандарт:'))?>
						</article>
					</div>
					<div>
						<input id="ac-5" name="accordion-1" type="checkbox"/>
						<label for="ac-5">АРКТИКА</label>
						<article class="ac-large">
							<?=$form->field($model,'custom[arctic][0]')->textInput()->label(Yii::t('app','Ввод в строение АРКТИКА для 74*55:'))?>
							<?=$form->field($model,'custom[arctic][1]')->textInput()->label(Yii::t('app','Прямой ввод в стену  АРКТИКА 74*55:'))?>
							<?=$form->field($model,'custom[arctic][2]')->textInput()->label(Yii::t('app','Кабель-канал АРКТИКА 74*55*2000:'))?>
							<?=$form->field($model,'custom[arctic][3]')->textInput()->label(Yii::t('app','Поворот 90 град. АРКТИКА 74*55 :'))?>
							<?=$form->field($model,'custom[arctic][4]')->textInput()->label(Yii::t('app','Угол внешний АРКТИКА 74*55:'))?>
							<?=$form->field($model,'custom[arctic][5]')->textInput()->label(Yii::t('app','Угол внутренний АРКТИКА 74*55:'))?>
						</article>
					</div>
					<div>
						<input id="ac-6" name="accordion-1" type="checkbox"/>
						<label for="ac-6">Электрика</label>
						<article class="ac-large">
							<?=$form->field($model,'custom[electrician][0]')->textInput()->label(Yii::t('app','Авт. выкл. ВА47-29 1Р С40 16А ИЭК:'))?>
							<?=$form->field($model,'custom[electrician][1]')->textInput()->label(Yii::t('app','Авт. выкл. ВА47-29 1Р С40 25А ИЭК:'))?>
							<?=$form->field($model,'custom[electrician][2]')->textInput()->label(Yii::t('app','Вилка евро Макел белая:'))?>
						</article>
					</div>
					<div>
						<input id="ac-7" name="accordion-1" type="checkbox"/>
						<label for="ac-7">ЭЛ.ПРОВОД (провод ПВС, углы для провода,кабель-канала)</label>
						<article class="ac-large">
							<?=$form->field($model,'custom[wiring][0]')->textInput()->label(Yii::t('app','Кабель ПВС 2*1:'))?>
							<?=$form->field($model,'custom[wiring][1]')->textInput()->label(Yii::t('app','Кабель ПВС 3*1.5:'))?>
							<?=$form->field($model,'custom[wiring][2]')->textInput()->label(Yii::t('app','Кабель ПВС 4*1.5:'))?>
						</article>
					</div>
					<div>
						<input id="ac-8" name="accordion-1" type="checkbox"/>
						<label for="ac-8">Кабель-канал под провод</label>
						<article class="ac-large">
							<?=$form->field($model,'custom[cable][0]')->textInput()->label(Yii::t('app','Кабель-канал 16*16 под эл.провод:'))?>
							<?=$form->field($model,'custom[cable][1]')->textInput()->label(Yii::t('app','Кабель-канал 25*25 под дренаж:'))?>
						</article>
					</div>
				</section>
			</div>

				<?=Html::submitButton('Получить',['class'=>'btn btn-default'])?>


		</div>


		<?php ActiveForm::end() ?>
		<?php Pjax::end(); ?>


	</div>
</div>
<div class="col-md-2"></div>