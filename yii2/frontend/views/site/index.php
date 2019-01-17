<?$this->title = 'Главная страница';

use yii\widgets\LinkPager; ?>
<!-- s-content
================================================== -->
<section class="s-content">

    <div class="row masonry-wrap">
        <div class="masonry">

            <div class="grid-sizer"></div>
            <?foreach ($posts as $key => $post):?>
            <article class="masonry__brick entry format-standard" data-aos="fade-up">

                <div class="entry__thumb">
                    <a href="single-standard.html" class="entry__thumb-link">
                        <img src="<?=\yii\helpers\Url::home(true).'/uploads/icon/'.$post['icon']?>"
                             srcset="<?=\yii\helpers\Url::home(true).'/uploads/icon/'.$post['icon']?> 1x" alt="">
                    </a>
                </div>

                <div class="entry__text">
                    <div class="entry__header">

                        <div class="entry__date">
                            <a href="single-standard.html"><?=date('F d, Y',$post['updated_at'])?></a>
                        </div>
                        <h1 class="entry__title"><a href="single-standard.html"><?=$post['title']?></a></h1>

                    </div>
                    <div class="entry__excerpt">
                        <p>
                            <?=mb_strimwidth($post['description'], 0, 150, "...");?>
                        </p>
                    </div>
                    <div class="entry__meta">
                            <span class="entry__meta-links">
                                <a href="category.html">Health</a>
                            </span>
                    </div>
                </div>
            </article>
            <?endforeach;?>
        </div>
    </div>

<!--    Пагинация-->
    <div class="row">
        <div class="col-full">
            <nav class="pgn">
                <?= LinkPager::widget([
                    'pagination' => $pages,
                     //Css option for container
                    'options' => ['class' => ''],
                    //First option value
                    //Previous option value
                    'prevPageLabel' => '&nbsp;',
                    //Next option value
                    'nextPageLabel' => '&nbsp;',
                    //Current Active option value
                    'activePageCssClass' => 'current',
                    //Max count of allowed options
                    'maxButtonCount' => 8,
                    'linkContainerOptions'=>['class'=>''],
                    // Css for each options. Links
                    'linkOptions' => ['class' => 'pgn__num'],
                    'disabledPageCssClass' => 'disabled',
                    // Customzing CSS class for navigating link
                    'prevPageCssClass' => 'pgn__prev',
                    'nextPageCssClass' => 'pgn__next',
                ]);
                ?>
            </nav>
        </div>
    </div>
<!--    Конец пагинации-->
</section>
