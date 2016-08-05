<?php use_helper('I18N', 'Date') ?>
<?php include_partial('aboutus/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('新建内容', array(), 'messages') ?></h1>

  <?php include_partial('aboutus/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('aboutus/form_header', array('Aboutus' => $Aboutus, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('aboutus/form', array('Aboutus' => $Aboutus, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('aboutus/form_footer', array('Aboutus' => $Aboutus, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
