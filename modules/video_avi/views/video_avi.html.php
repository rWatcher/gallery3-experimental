<?php defined("SYSPATH") or die("No direct script access.") ?>
<div id="gItem">
  <?= $theme->photo_top() ?>

  <ul class="gPager">
    <li>
      <? if ($previous_item): ?>
      <a href="<?= $previous_item->url() ?>" class="gButtonLink ui-icon-left ui-state-default ui-corner-all">
      <span class="ui-icon ui-icon-triangle-1-w"></span><?= t("previous") ?></a>
      <? else: ?>
      <a class="gButtonLink ui-icon-left ui-state-disabled ui-corner-all">
      <span class="ui-icon ui-icon-triangle-1-w"></span><?= t("previous") ?></a>
      <? endif; ?>
    </li>
    <li class="gInfo"><?= t("%position of %total", array("position" => $position, "total" => $sibling_count)) ?></li>
    <li class="txtright">
      <? if ($next_item): ?>
      <a href="<?= $next_item->url() ?>" class="gButtonLink ui-icon-right ui-state-default ui-corner-all">
      <span class="ui-icon ui-icon-triangle-1-e"></span><?= t("next") ?></a>
      <? else: ?>
      <a class="gButtonLink ui-icon-right ui-state-disabled ui-corner-all">
      <span class="ui-icon ui-icon-triangle-1-e"></span><?= t("next") ?></a>
      <? endif ?>
    </li>
  </ul>
<?

  $resizePath = str_replace(VARPATH . "albums/", VARPATH . "resizes/", $item->file_path());
  $resizePath = substr_replace($resizePath, "flv", strlen($resizePath)-3);

  if (file_exists($resizePath)) {
    $resizeURL = $item->file_url(true);
    $resizeURL = substr_replace($resizeURL, "flv", strlen($resizeURL)-3);
    $resizeURL = str_replace("/var/albums", "/var/resizes", $resizeURL);

$attrs = array_merge(array("class" => "gMovie", "id" => "gMovieId-{$item->id}"), array("style" => "display:block;width:{$this->width}px;height:{$this->height}px"));

?>
<?= html::anchor($resizeURL, "", $attrs) ?>
<script>
  flowplayer(
    "<?= $attrs["id"] ?>",
    {
      src: "<?= url::abs_file("lib/flowplayer.swf") ?>",
      wmode: "transparent"
    },
    {
      plugins: {
        h264streaming: {
          url: "<?= url::abs_file("lib/flowplayer.h264streaming.swf") ?>"
        },
        controls: {
          autoHide: 'always',
          hideDelay: 2000
        }
      }
    }
  )
</script>
<? } elseif (access::can("view_full", $item)) { ?>
<center><a href="<?=$item->file_url() ?>">Click Here</a> to download this video.</center>
<? } else { ?>
<center>You do not have sufficient privileges to access this video.</center>
<? } ?>
  <div id="gInfo">
    <h1><?= html::purify($item->title) ?></h1>
       <div><?= nl2br(html::purify($item->description)) ?></div>
  </div>

  <?= $theme->photo_bottom() ?>
  <?= $theme->context_menu($item, "#gMovieId-{$item->id}") ?>
</div>
