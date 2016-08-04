<?php use_helper('I18N', 'Date') ?>
<?php include_partial('information/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('新建信息', array(), 'messages') ?></h1>

  <?php include_partial('information/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('information/form_header', array('Information' => $Information, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('information/form', array('Information' => $Information, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('information/form_footer', array('Information' => $Information, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
