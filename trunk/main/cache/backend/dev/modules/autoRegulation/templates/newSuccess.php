<?php use_helper('I18N', 'Date') ?>
<?php include_partial('regulation/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('新建信息', array(), 'messages') ?></h1>

  <?php include_partial('regulation/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('regulation/form_header', array('Regulation' => $Regulation, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('regulation/form', array('Regulation' => $Regulation, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('regulation/form_footer', array('Regulation' => $Regulation, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
