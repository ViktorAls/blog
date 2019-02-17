<?$this->title='О себе.'?>
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

            <p><?=$about['aboutMe']['value']?>    </p>


            <div class="row block-1-2 block-tab-full">
                <div class="col-block">
                    <h3 class="quarter-top-margin">Кто я.</h3>
                    <p><?=$about['whoAmI']['value']?></p>
                </div>

                <div class="col-block">
                    <h3 class="quarter-top-margin">Моя миссия.</h3>
                    <p><?=$about['myMission']['value']?></p>
                </div>

                <div class="col-block">
                    <h3 class="quarter-top-margin">Мой взгляд.</h3>
                    <p><?=$about['myOpinion']['value']?></p>
                </div>

                <div class="col-block">
                    <h3 class="quarter-top-margin">Мои ценности.</h3>
                    <p><?=$about['myValues']['value']?></p>
                </div>

            </div>


        </div> <!-- end s-content__main -->

    </div> <!-- end row -->

</section> <!-- s-content -->