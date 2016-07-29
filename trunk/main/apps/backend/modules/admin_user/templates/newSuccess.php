<?php use_helper('I18N', 'Date') ?>
<?php include_partial('admin_user/assets') ?>

<div id="sf_admin_container">
    <h1><?php echo __('新建后台用户', array(), 'messages') ?></h1>

    <?php include_partial('admin_user/flashes') ?>

    <div id="sf_admin_header">
        <?php include_partial('admin_user/form_header', array('AdminUser' => $AdminUser, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>

    <div id="sf_admin_content">
        <?php include_partial('admin_user/form', array('AdminUser' => $AdminUser, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>

    <div id="sf_admin_footer">
        <?php include_partial('admin_user/form_footer', array('AdminUser' => $AdminUser, 'form' => $form, 'configuration' => $configuration)) ?>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#admin_user_change_password').attr('checked', true);
        $('.sf_admin_form_field_change_password').hide();

        $("#sf_admin_content .sf_admin_form form").bind("onSubmit", function() {
            return false;
        });
    });
</script>