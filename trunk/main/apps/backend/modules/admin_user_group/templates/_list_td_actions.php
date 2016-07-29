<td>
    <ul class="sf_admin_td_actions">
        <?php if ($AdminUserGroup->getIsSuperAdmin() == 1) { ?>
            
        <?php } else if ($AdminUserGroup->getIsFixed() == 1 && $AdminUserGroup->getIsSuperAdmin() != 1) { ?>
            <?php echo $helper->linkToEdit($AdminUserGroup, array('params' => array(), 'class_suffix' => 'edit', 'label' => 'Edit',)) ?>
        <?php } else { ?>
            <?php echo $helper->linkToEdit($AdminUserGroup, array('params' => array(), 'class_suffix' => 'edit', 'label' => 'Edit',)) ?>
            <?php echo $helper->linkToDelete($AdminUserGroup, array('params' => array(), 'confirm' => 'Are you sure?', 'class_suffix' => 'delete', 'label' => 'Delete',)) ?>
        <?php } ?>
    </ul>
</td>
