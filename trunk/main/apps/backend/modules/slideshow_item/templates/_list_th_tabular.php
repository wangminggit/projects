<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_thumbnail" width="20%">
    <?php echo __('缩略图', array(), 'messages') ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_title" width="25%">
    <?php if ('title' == $sort[0]): ?>
        <?php echo link_to(__('标题', array(), 'messages'), '@slideshow_item', array('query_string' => 'sort=title&sort_type=' . ($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
        <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir') . '/images/' . $sort[1] . '.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
    <?php else: ?>
        <?php echo link_to(__('标题', array(), 'messages'), '@slideshow_item', array('query_string' => 'sort=title&sort_type=asc')) ?>
    <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_url" width=25%">
    <?php if ('url' == $sort[0]): ?>
        <?php echo link_to(__('链接', array(), 'messages'), '@slideshow_item', array('query_string' => 'sort=url&sort_type=' . ($sort[1] == 'asc' ? 'desc' : 'asc'))) ?>
        <?php echo image_tag(sfConfig::get('sf_admin_module_web_dir') . '/images/' . $sort[1] . '.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
    <?php else: ?>
        <?php echo link_to(__('链接', array(), 'messages'), '@slideshow_item', array('query_string' => 'sort=url&sort_type=asc')) ?>
    <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>