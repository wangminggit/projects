<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($News->getId(), 'news_edit', $News) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_news_category_id">
  <?php echo get_partial('news/news_category_id', array('type' => 'list', 'News' => $News)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo get_partial('news/title', array('type' => 'list', 'News' => $News)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_is_enable">
  <?php echo get_partial('news/is_enable', array('type' => 'list', 'News' => $News)) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_page_view">
  <?php echo $News->getPageView() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_release_date">
  <?php echo get_partial('news/release_date', array('type' => 'list', 'News' => $News)) ?>
</td>
