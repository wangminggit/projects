<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($Information->getId(), 'information_edit', $Information) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_information_category_id">
  <?php echo get_partial('information/information_category_id', array('type' => 'list', 'Information' => $Information)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo get_partial('information/title', array('type' => 'list', 'Information' => $Information)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_is_enable">
  <?php echo get_partial('information/is_enable', array('type' => 'list', 'Information' => $Information)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_page_view">
  <?php echo $Information->getPageView() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_release_date">
  <?php echo get_partial('information/release_date', array('type' => 'list', 'Information' => $Information)) ?>
</td>
