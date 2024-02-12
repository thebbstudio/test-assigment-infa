<?php

/** @var yii\web\View $this */
/** @var \frontend\models\ProfileForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Главная страница';
?>
<div class="site-index">

    <?php     if (Yii::$app->user->isGuest) { ?>
    <p>Вы не авторизованы( Сделайте что-нибудь с этим</p>
                
    <?php } else { ?>
    
        <p>Заполните поля для обновления своих данных:</p>

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'profile-form']); ?>

                    <?= $form->field($model, 'first_name')->textInput(['autofocus' => true])->label('Имя'); ?>
                    
                    <?= $form->field($model, 'last_name')->textInput()->label('Фамилия'); ?>

                    <?= $form->field($model, 'email')->textInput(['readonly'=> true])->label('Электронная почта'); ?>

                    <?= $form->field($model, 'password')->passwordInput()->label('Пароль'); ?>

                    <?= $form->field($model, 'passwordRepeat')->passwordInput()->label('Повторите пароль'); ?>
                    
                    <button class="btn btn-lg btn-primary" type="submit">Сохранить</button>
                <?php ActiveForm::end(); ?>

            </div>
        </div> 
    <?php
    $options = [
		'title' => Yii::t('yii', 'Удалить'),											
		//'target' => '_blank',
		'alt' => 'Link to Super Website',
		 'aria-label'=> 'Удалить' ,
		 'data-confirm'=> 'Вы уверены, что хотите удалить аккаунт?' ,
		 'data-method'=> 'post' ,
		 'data-pjax'=> '0',
	];

    echo Html::a('<span class="glyphicon glyphicon-trash">Удалить аккаунт</span>', ['site/delete'], $options); ?>
    <?php } ?>

    </div>
</div>
