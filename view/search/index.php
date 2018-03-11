<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\helpers\HighlightHelper;
?>




<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'keyword'); ?>

<?= Html::submitButton('Search',['class'=>'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>



<div class="row">
    <div class="col-md-12">
        <?php if ($results): ?>
            <?php foreach ($results as $item): ?>
                <?php echo $item['name_ru']; ?>
                <br>
                <?php echo HighlightHelper::process($model->keyword, $item['description_ru']); ?>
                <hr>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>