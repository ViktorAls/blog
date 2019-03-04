<?php $this->title='О себе.';

/**
 * @var array $about;
 */
use kartik\editable\Editable;

?>
<section class="s-content s-content--narrow">

    <div class="row">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                О себе.
            </h1>
        </div> <!-- end s-content__header -->

        <div class="s-content__media col-full">
            <div class="s-content__post-thumb">
                <img src="/images/thumbs/about/about-1000.jpg"
                     srcset="/images/thumbs/about/about-2000.jpg 2000w,
                                 /images/thumbs/about/about-1000.jpg 1000w,
                                 /images/thumbs/about/about-500.jpg 500w"
                     sizes="(max-width: 2000px) 100vw, 2000px" alt="">
            </div>
        </div> <!-- end s-content__media -->

        <div class="col-full s-content__main">

            <p class="lead">О себе.</p>

            <p>
                <?php if (Yii::$app->user->identity->success === 1):?>
                <?= Editable::widget([
                    'name'=>'information',
                    'value'=>$about['aboutMe']['value'],
                    'bsColCssPrefixes'=>Editable::SIZE_X_LARGE,
                    'pjaxContainerId'=>'p0',
                    'inputType' => Editable::INPUT_TEXTAREA,
                    'formOptions'=>[
                        'action' => [\yii\helpers\Url::to(['site/information','type'=>'ajax','id'=>$about['aboutMe']['id']])]
                    ],
                    'asPopover' => true,
                    'editableButtonOptions'=>['label'=>'<i class="fas fa-pen"></i>'],// значек редактирования
                    'format' => Editable::FORMAT_BUTTON,// редактирвоание по стоке или кнопки
                    'preHeader'=>' ',// иконка когда редактируем
                    'header' => 'Изменить: '.$about['aboutMe']['name'],
                    'size'=>'2',
                    'options' => ['class'=>'form-control', 'placeholder'=>'Enter person name...']]);
                ?>
                <?else:?>
                <?=$about['aboutMe']['value']?>
                <?endif;?>
            </p>


            <div class="row block-1-2 block-tab-full">
                <div class="col-block">
                    <h3 class="quarter-top-margin">Кто я.</h3>
                    <p>
                        <?php if (Yii::$app->user->identity->success === 1):?>
                            <?= Editable::widget([
                                'name'=>'information',
                                'value'=>$about['whoAmI']['value'],
                                'bsColCssPrefixes'=>Editable::SIZE_X_LARGE,
                                'pjaxContainerId'=>'p0',
                                'inputType' => Editable::INPUT_TEXTAREA,
                                'formOptions'=>[
                                    'action' => [\yii\helpers\Url::to(['site/information','type'=>'ajax','id'=>$about['whoAmI']['id']])]
                                ],
                                'asPopover' => true,
                                'editableButtonOptions'=>['label'=>'<i class="fas fa-pen"></i>'],// значек редактирования
                                'format' => Editable::FORMAT_BUTTON,// редактирвоание по стоке или кнопки
                                'preHeader'=>' ',// иконка когда редактируем
                                'header' => 'Изменить: '.$about['whoAmI']['name'],
                                'size'=>'2',
                                'options' => ['class'=>'form-control', 'placeholder'=>'Enter person name...']]);
                            ?>
                        <?else:?>
                            <?=$about['whoAmI']['value']?>
                        <?endif;?>
                    </p>
                </div>

                <div class="col-block">
                    <h3 class="quarter-top-margin">Моя миссия.</h3>
                    <p>
                        <?php if (Yii::$app->user->identity->success === 1):?>
                            <?= Editable::widget([
                                'name'=>'information',
                                'value'=>$about['myMission']['value'],
                                'bsColCssPrefixes'=>Editable::SIZE_X_LARGE,
                                'pjaxContainerId'=>'p0',
                                'inputType' => Editable::INPUT_TEXTAREA,
                                'formOptions'=>[
                                    'action' => [\yii\helpers\Url::to(['site/information','type'=>'ajax','id'=>$about['myMission']['id']])]
                                ],
                                'asPopover' => true,
                                'editableButtonOptions'=>['label'=>'<i class="fas fa-pen"></i>'],// значек редактирования
                                'format' => Editable::FORMAT_BUTTON,// редактирвоание по стоке или кнопки
                                'preHeader'=>' ',// иконка когда редактируем
                                'header' => 'Изменить: '.$about['myMission']['name'],
                                'size'=>'2',
                                'options' => ['class'=>'form-control', 'placeholder'=>'Enter person name...']]);
                            ?>
                        <?else:?>
                            <?=$about['whoAmI']['value']?>
                        <?endif;?>
                    </p>
                </div>

                <div class="col-block">
                    <h3 class="quarter-top-margin">Мой взгляд.</h3>
                    <p>
                        <?php if (Yii::$app->user->identity->success === 1):?>
                            <?= Editable::widget([
                                'name'=>'information',
                                'value'=>$about['myOpinion']['value'],
                                'bsColCssPrefixes'=>Editable::SIZE_X_LARGE,
                                'pjaxContainerId'=>'p0',
                                'inputType' => Editable::INPUT_TEXTAREA,
                                'formOptions'=>[
                                    'action' => [\yii\helpers\Url::to(['site/information','type'=>'ajax','id'=>$about['myOpinion']['id']])]
                                ],
                                'asPopover' => true,
                                'editableButtonOptions'=>['label'=>'<i class="fas fa-pen"></i>'],// значек редактирования
                                'format' => Editable::FORMAT_BUTTON,// редактирвоание по стоке или кнопки
                                'preHeader'=>' ',// иконка когда редактируем
                                'header' => 'Изменить: '.$about['myOpinion']['name'],
                                'size'=>'2',
                                'options' => ['class'=>'form-control', 'placeholder'=>'Enter person name...']]);
                            ?>
                        <?else:?>
                            <?=$about['myOpinion']['value']?>
                        <?endif;?>
                    </p>
                </div>

                <div class="col-block">
                    <h3 class="quarter-top-margin">Мои ценности.</h3>

                    <p>
                        <?php if (Yii::$app->user->identity->success === 1):?>
                            <?= Editable::widget([
                                'name'=>'information',
                                'value'=>$about['myValues']['value'],
                                'bsColCssPrefixes'=>Editable::SIZE_X_LARGE,
                                'pjaxContainerId'=>'p0',
                                'inputType' => Editable::INPUT_TEXTAREA,
                                'formOptions'=>[
                                    'action' => [\yii\helpers\Url::to(['site/information','type'=>'ajax','id'=>$about['myValues']['id']])]
                                ],
                                'asPopover' => true,
                                'editableButtonOptions'=>['label'=>'<i class="fas fa-pen"></i>'],// значек редактирования
                                'format' => Editable::FORMAT_BUTTON,// редактирвоание по стоке или кнопки
                                'preHeader'=>' ',// иконка когда редактируем
                                'header' => 'Изменить: '.$about['myValues']['name'],
                                'size'=>'2',
                                'options' => ['class'=>'form-control', 'placeholder'=>'Enter person name...']]);
                            ?>
                        <?else:?>
                            <?=$about['myValues']['value']?>
                        <?endif;?>
                    </p>
                </div>

            </div>


        </div> <!-- end s-content__main -->

    </div> <!-- end row -->

</section> <!-- s-content -->