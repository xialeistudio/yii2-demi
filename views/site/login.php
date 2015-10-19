<?php
/** @var LoginForm $model */
use app\forms\LoginForm;
use yii\captcha\Captcha;

?>
<?php $form = \yii\bootstrap\ActiveForm::begin() ?>
<?= $form->field($model, 'username') ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<?= $form->field($model, 'verifyCode', [
    'options' => ['class' => 'form-group form-group-lg'],
])->widget(Captcha::className(),[
    'template' => "{input}{image}",
    'imageOptions' => ['alt' => '验证码'],
    'captchaAction' => 'site/captcha',
]); ?>
<?=\yii\helpers\Html::submitButton('登录',['class'=>'btn btn-primary'])?>
<?php \yii\bootstrap\ActiveForm::end(); ?>
