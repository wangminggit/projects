<?php 

$admin_user_group = AdminUserGroupPeer::retrieveByPK($AdminUser->getAdminUserGroupId());
echo is_object($admin_user_group) ? $admin_user_group->getName() : " ";

?>
