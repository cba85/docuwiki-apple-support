<?php
/**
 * DokuWiki Starter Template
 *
 * @link     http://dokuwiki.org/template:starter
 * @author   Anika Henke <anika@selfthinker.org>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

if (!defined('DOKU_INC')) die();
@require_once(dirname(__FILE__).'/tpl_functions.php');
header('X-UA-Compatible: IE=edge,chrome=1');
$showSidebar = page_findnearest($conf['sidebar']);
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang'] ?>"
  lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>" class="no-js">
<head>
    <meta charset="UTF-8" />
    <title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title']) ?>]</title>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <?php tpl_metaheaders() ?>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    <?php tpl_includeFile('meta.html') ?>
</head>

<body id="dokuwiki__top">
    <div id="dokuwiki__site" class="<?php echo tpl_classes(); ?> <?php echo ($showSidebar) ? 'hasSidebar' : ''; ?>">
        <?php html_msgarea() ?>
        <?php tpl_includeFile('header.html') ?>

        <!-- ********** HEADER ********** -->
        <div id="dokuwiki__header">

        <nav>
  <div class="nav-content">
    <ul class="nav-list">
      <li class="nav-item nav-logo"><?php tpl_link(wl(),$conf['title'],'accesskey="h" title="[H]" class="nav-link"') ?></li>
      <li class="nav-item"><?php echo tpl_action('recent', 1, false, 1) ?></li>
      <li class="nav-item"><?php echo tpl_action('media', 1, false, 1) ?></li>
      <li class="nav-item"><?php echo tpl_action('index', 1, false, 1) ?></li>
      <li class="nav-item float-right"><?php echo tpl_action('register', 1, false, 1) ?></li>
      <li class="nav-item float-right"><?php echo tpl_action('login', 1, false, 1) ?></li>
      <li class="nav-item float-right"><?php echo tpl_action('profile', 1, false, 1) ?></li>
      <li class="nav-item float-right"><?php echo tpl_action('admin', 1, false, 1) ?></li>
      <li class="nav-item float-right"><?php tpl_searchform() ?></li>
    </ul>
  </div>
</nav>

            <p class="a11y skip">
                <a href="#dokuwiki__content"><?php echo $lang['skip_to_content'] ?></a>
            </p>

            <!-- BREADCRUMBS -->
            <?php if($conf['breadcrumbs']){ ?>
                <div class="breadcrumbs"><?php tpl_breadcrumbs() ?></div>
            <?php } ?>
            <?php if($conf['youarehere']){ ?>
                <div class="breadcrumbs"><?php tpl_youarehere() ?></div>
            <?php } ?>

            <div>
                <?php
                    //$translation = plugin_load('helper','translation');
                    //if ($translation) echo $translation->showTranslations();
                    ?>
                </div>

            <div class="text-right">
                <ul class="inline">
                <?php tpl_toolsevent('pagetools', array(
                            'edit'      => tpl_action('edit', 1, 'li', 1),
                            'revisions' => tpl_action('revisions', 1, 'li', 1),
                            'backlink'  => tpl_action('backlink', 1, 'li', 1),
                            'subscribe' => tpl_action('subscribe', 1, 'li', 1),
                            'revert'    => tpl_action('revert', 1, 'li', 1),
                        )); ?>
                </ul>
                </div>
        </div><!-- /header -->


        <div class="wrapper group">

            <!-- ********** ASIDE ********** -->
            <?php if ($showSidebar): ?>
                <div id="dokuwiki__aside"><div class="aside include group">
                    <?php tpl_includeFile('sidebarheader.html') ?>
                    <?php tpl_include_page($conf['sidebar'], 1, 1) ?>
                    <?php tpl_includeFile('sidebarfooter.html') ?>
                    <hr class="a11y" />
                </div></div><!-- /aside -->
            <?php endif; ?>

            <!-- ********** CONTENT ********** -->
            <div id="dokuwiki__content">
                <?php tpl_flush() ?>
                <?php tpl_includeFile('pageheader.html') ?>

                    <!-- wikipage start -->
                    <?php tpl_content() ?>
                    <!-- wikipage stop -->

                <?php tpl_flush() ?>
                <?php tpl_includeFile('pagefooter.html') ?>
            </div><!-- /content -->

        </div><!-- /wrapper -->

        <!-- ********** FOOTER ********** -->
        <div id="dokuwiki__footer">
            <div class="text-right"><small><?php tpl_pageinfo() ?></small> | <?php echo tpl_action('top', 1, false, 1) ?></div>

        </div><!-- /footer -->

        <?php tpl_includeFile('footer.html') ?>
    </div><!-- /site -->

    <div class="no"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>
</body>
</html>
