<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($Regulation->getId(), 'regulation_edit', $Regulation) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_regulation_category_id">
  <?php echo get_partial('regulation/regulation_category_id', array('type' => 'list', 'Regulation' => $Regulation)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo get_partial('regulation/title', array('type' => 'list', 'Regulation' => $Regulation)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_is_enable">
  <?php echo get_partial('regulation/is_enable', array('type' => 'list', 'Regulation' => $Regulation)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_page_view">
  <?php echo $Regulation->getPageView() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_release_date">
  <?php echo get_partial('regulation/release_date', array('type' => 'list', 'Regulation' => $Regulation)) ?>
</td>
