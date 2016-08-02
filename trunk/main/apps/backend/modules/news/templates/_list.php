<div class="sf_admin_list">
    <div class="row">
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">
                    <h4>
                        <i class="icon-reorder"></i>
                        列表
                    </h4>
                    <div class="toolbar no-padding">
                        <div class="btn-group">
                            <span class="btn btn-xs widget-collapse">
                                <i class="icon-angle-down"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="widget-content" style="display: block;">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                        <div class="row" style="margin: 0px;">
                            <?php if (!$pager->getNbResults()): ?>
                                <p><?php echo __('No result', array(), 'sf_admin') ?></p>
                            <?php else: ?>
                                <table cellspacing="0" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th id="sf_admin_list_batch_actions"><input id="sf_admin_list_batch_checkbox" type="checkbox" onclick="checkAll();" /></th>
                                            <?php include_partial('news/list_th_tabular', array('sort' => $sort)) ?>
                                            <th id="sf_admin_list_th_actions"><?php echo __('Actions', array(), 'sf_admin') ?></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="8">
                                                <?php if ($pager->haveToPaginate()): ?>
                                                    <?php include_partial('news/pagination', array('pager' => $pager)) ?>
                                                <?php endif; ?>

                                    <div class="result_counter">
                                        <?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults(), 'sf_admin') ?>
                                        <?php if ($pager->haveToPaginate()): ?>
                                            <?php echo __('(page %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'sf_admin') ?>
                                        <?php endif; ?>
                                    </div>
                                    </th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($pager->getResults() as $i => $News): $odd = fmod( ++$i, 2) ? 'odd' : 'even' ?>
                                            <tr class="sf_admin_row <?php echo $odd ?>">
                                                <?php include_partial('news/list_td_batch_actions', array('News' => $News, 'helper' => $helper)) ?>
                                                <?php include_partial('news/list_td_tabular', array('News' => $News)) ?>
                                                <?php include_partial('news/list_td_actions', array('News' => $News, 'helper' => $helper)) ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    /* <![CDATA[ */
    function checkAll()
    {
        var boxes = document.getElementsByTagName('input');
        for (var index = 0; index < boxes.length; index++) {
            box = boxes[index];
            if (box.type == 'checkbox' && box.className == 'sf_admin_batch_checkbox')
                box.checked = document.getElementById('sf_admin_list_batch_checkbox').checked
        }
        return true;
    }
    /* ]]> */
</script>
