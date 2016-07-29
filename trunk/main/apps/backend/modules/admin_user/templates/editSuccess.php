<?php use_helper('I18N', 'Date') ?>
<?php include_partial('admin_user/assets') ?>

<div id="sf_admin_container">
    <h1><?php echo __('编辑后台用户', array(), 'messages') ?></h1>

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
        if ($('#admin_user_change_password').is(':checked')) {
            $('.sf_admin_form_field_password').show();
            $('.sf_admin_form_field_password_confirm').show();
            $('.sf_admin_form_field_build_password').show();
        } else {
            $('.sf_admin_form_field_password').hide();
            $('.sf_admin_form_field_password_confirm').hide();
            $('.sf_admin_form_field_build_password').hide();
        }
        $('#admin_user_change_password').change(function() {
            if ($(this).is(':checked')) {
                $('.sf_admin_form_field_password').show();
                $('.sf_admin_form_field_password_confirm').show();
                $('.sf_admin_form_field_build_password').show();
            } else {
                $(this).next().hide();
                $('.sf_admin_form_field_password').hide();
                $('.sf_admin_form_field_password_confirm').hide();
                $('.sf_admin_form_field_build_password').hide();
            }
        });
    });
</script>