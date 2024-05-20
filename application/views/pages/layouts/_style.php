<!-- Basic Page Needs -->
<meta charset="utf-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<title><?= $title ?> - Zafira Garden Lounge</title>

<meta name="author" content="Zafira Garden Lounge">

<meta name="description" content="Zafira Garden Lounge - <?= (isset($article['headline'])) ? $article['headline'] : '' ?>">
<meta name="keywords" content="<?= (isset($article['keywords'])) ? $article['keywords'] : 'Zafira, Garden, Lounge' ?>">
<!-- Slug biasanya adalah bagian dari URL dan tidak perlu meta tag khusus -->

<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- Theme Style -->
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/front/css/style.css">

<!-- Reponsive -->
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/front/css/responsive.css">

<!-- Favicon and Touch Icons  -->
<link rel="shortcut icon" href="<?= base_url() ?>assets/front/images/logo/logo-bg-gelap.png">
<link rel="apple-touch-icon-precomposed" href="<?= base_url() ?>assets/front/images/logo/logo-bg-gelap.png">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    .icon-whatsapp:before {
        content: "\ea93";
    }
</style>