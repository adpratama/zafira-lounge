<!-- banner-page -->
<div class="banner-page" style="background-image: url('https://picsum.photos/id/1/1920/710')">
    <div class="content">
        <div class="banner-text">Article</div>
        <p>Stay up to date with the latest news about our lounge and upcoming and <br> upcoming events</p>
    </div>
</div>
<!-- /banner-page -->

<!-- blog -->
<div class="blog-full-width">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if ($article) {
                    foreach ($article as $a) :
                        $detail = $this->M_Article->get_article_by_slug($a->slug);
                        $array = explode(",", $detail['tags']);

                        // Gabungkan kembali array menjadi string dengan koma dan spasi sebagai delimiter
                        $new_tags = implode(", ", $array);
                ?>
                        <div class="wg-blog full-width">
                            <div class="image">
                                <img class="w-full" src="<?= base_url('assets/front/images/articles/' . $a->photo) ?>" alt="">
                                <div class="box-calender">
                                    <div class="calender-day"><?= date('d', strtotime($a->created_at)) ?></div>
                                    <div class="calender-month"><?= date('M y', strtotime($a->created_at)) ?></div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="left">
                                    <div class="title"><a href="<?= base_url('article/read/' . $a->slug) ?>"><?= $a->judul ?></a></div>
                                    <p><?= getFirstWordsWithEllipsis($a->content) ?></p>
                                    <a href="<?= base_url('article/read/' . $a->slug) ?>" class="button-arrow">READ MORE</a>
                                </div>
                                <div class="right">
                                    <div class="meta">
                                        <div class="meta-item">Written by <a href="#"><?= $a->name ?></a></div>
                                        <div class="meta-item">TAGS: <?= $new_tags ?></div>
                                        <div class="meta-item social">
                                            <span>SHARE POST:</span>
                                            <div class="widget-social">
                                                <ul class="">
                                                    <li><a href="#" class="icon-fb"></a></li>
                                                    <li><a href="#" class="icon-trip"></a></li>
                                                    <li><a href="#" class="icon-youtube-play"></a></li>
                                                    <li><a href="#" class="icon-instagram2"></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    echo $this->pagination->create_links();
                } else {
                    ?>
                    <h3 class="mb-5">Tidak ada artikel yang ditampilkan</h3>
                <?php
                } ?>

            </div>
        </div>
    </div>
</div>
<!-- /blog -->

<?php
function getFirstWordsWithEllipsis($text, $wordLimit = 50)
{
    $words = explode(' ', $text);
    if (count($words) > $wordLimit) {
        $firstWords = array_slice($words, 0, $wordLimit);
        return implode(' ', $firstWords) . ' ...';
    } else {
        return $text;
    }
}
?>