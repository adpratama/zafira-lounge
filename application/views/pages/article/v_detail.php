<!-- banner-page -->
<div class="banner-page has-links" style="background-image: url('https://picsum.photos/id/1/1920/710')">
    <div class="content">
        <div class="banner-text"><?= $article['judul'] ?></div>
        <!-- <p>Stay up to date with the latest news about our restaurant and upcoming and <br> upcoming events</p> -->
        <ul class="breadcrumbs">
            <li class="">
                <a href="<?= base_url() ?>">Beranda</a>
            </li>
            <li class="">
                <a href="<?= base_url('article') ?>">Article</a>
            </li>
        </ul>
    </div>
</div>
<!-- /banner-page -->
<?php
$array = explode(",", $article['tags']);

// Gabungkan kembali array menjadi string dengan koma dan spasi sebagai delimiter
$new_tags = implode(", ", $array); ?>
<!-- blog -->
<div class="blog-single">
    <div class="themesflat-container">
        <div class="row">
            <div class="col-md-8">
                <div class="wg-blog">
                    <div class="image">
                        <img class="w-full" src="<?= base_url('assets/front/images/articles/' . $article['photo']) ?>" alt="">
                    </div>
                    <div class="content">
                        <div class="meta">
                            <div class="meta-item">Written by <a href="#"><?= $article['author'] ?></a> - <?= date('D, M d, Y H:i', strtotime($article['created_at'])) ?></div>
                            <div class="meta-item">Tags: <?= $new_tags ?></div>
                        </div>
                        <div class="title"><a href="#"><?= $article['judul'] ?></a></div>
                        <?= $article['content'] ?>
                    </div>
                </div>
                <div class="bottom">
                    <div class="tags">
                        <div class="text">TAGS:
                            <?php
                            foreach ($array as $tag) {
                                // Buat tautan dengan base URL yang tepat dan tag sebagai bagian dari URL
                                echo '<a href="' . base_url('article/tags/' . strtolower($tag)) . '">' . $tag . '</a>';

                                // Tambahkan koma setelah setiap tautan kecuali untuk tag terakhir
                                if ($tag !== end($array)) {
                                    echo ', ';
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="widget-social">
                        <div class="text">SHARE:</div>
                        <ul class="">
                            <li><a href="#" class="icon-fb"></a></li>
                            <li><a href="#" class="icon-trip"></a></li>
                            <li><a href="#" class="icon-youtube-play"></a></li>
                            <li><a href="#" class="icon-instagram2"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="main-sidebar">
                    <div class="avt">
                        <div class="image">
                            <img src="<?= base_url() ?>assets/front/images/blog/sidebar-avt.jpg" alt="">
                        </div>
                        <div class="info">
                            <div class="unit">Editor</div>
                            <a href="#" class="name"><?= $article['author'] ?></a>
                            <p><?= $article['email_author'] ?></p>
                        </div>
                    </div>
                    <div class="sidebar-item category">
                        <div class="heading-top">categories</div>
                        <div class="content">
                            <ul>
                                <?php
                                foreach ($categories as $c) :
                                ?>
                                    <li><a href="#"><?= $c->category_name ?></a></li>
                                <?php
                                endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-item recent">
                        <div class="heading-top">RECENT POSTS</div>
                        <div class="content">
                            <?php
                            foreach ($articles as $a) :
                            ?>
                                <div class="recent-item">
                                    <div class="image">
                                        <img src="<?= base_url('assets/front/images/articles/' . $a->photo) ?>" alt="">
                                    </div>
                                    <div class="infor">
                                        <div class="name"><a href="<?= base_url('article/read/' . $a->slug) ?>"><?= $a->judul ?></a></div>
                                        <p><?= $a->name ?> - <?= date('M d, Y', strtotime($a->created_at)) ?></p>
                                    </div>
                                </div>
                            <?php
                            endforeach; ?>
                        </div>
                    </div>
                    <div class="sidebar-item tag">
                        <div class="heading-top">tags</div>
                        <div class="content">
                            <ul>
                                <?php
                                foreach ($tags as $t) :
                                ?>
                                    <li><a href="<?= base_url('article/tags/' . $t->slug) ?>"><?= $t->name ?></a></li>
                                <?php
                                endforeach; ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /blog -->