<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($Aboutus->getId(), 'aboutus_edit', $Aboutus) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_aboutus_category_id">
  <?php echo get_partial('aboutus/aboutus_category_id', array('type' => 'list', 'Aboutus' => $Aboutus)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo get_partial('aboutus/title', array('type' => 'list', 'Aboutus' => $Aboutus)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_is_enable">
  <?php echo get_partial('aboutus/is_enable', array('type' => 'list', 'Aboutus' => $Aboutus)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_page_view">
  <?php echo $Aboutus->getPageView() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_release_date">
  <?php echo get_partial('aboutus/release_date', array('type' => 'list', 'Aboutus' => $Aboutus)) ?>
</td>
