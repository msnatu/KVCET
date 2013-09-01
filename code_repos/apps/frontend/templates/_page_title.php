<div class="page-title-container">
  <div class="page-title-header-icon <?php echo $icon_class; ?>"></div>
  <div class="page-title-header"><?php echo $title; ?></div>
  <?php if(isset($back_url) && $back_url != "" || isset($straight_forward)) { ?>
  <div class="page-title-back-btn-container">
    <?php if(isset($straight_forward)) { ?>
      <a class="page-title-back-btn" onclick="history.go(-1)">
      <?php } else { ?>
      <a class="page-title-back-btn" href="<?php echo url_for($back_url); ?>">
    <?php } ?>
      <div class="page-title-back-btn-text">BACK</div>
      <div class="page-title-back-circle-btn"></div>
      <div class="page-title-back-circle-btn-icon"></div>
    </a>
  </div>
  <?php } ?>
  <br clear="all"/>
</div>