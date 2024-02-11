<?php

/** @var yii\web\View $this */
/** @var \frontend\models\ProfileForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?php     if (Yii::$app->user->isGuest) { ?>
    <p>Вы не авторизованы( Сделайте что-нибудь с этим</p>
                
    <?php } else { ?>
    

        <p>Please fill out the following fields to login:</p>

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'profile-form']); ?>
                
                    <?= $form->field($model, 'first_name')->textInput(['autofocus' => true]) ?>
                    
                    <?= $form->field($model, 'last_name')->textInput() ?>

                    <?= $form->field($model, 'email')->textInput(['readonly'=> true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'passwordRepeat')->passwordInput() ?>
                    
                    <button class="btn btn-lg btn-primary" type="submit">OK</button>
                <?php ActiveForm::end(); ?>

            </div>
        </div> 
    <?php } ?>

    </div>
</div>
