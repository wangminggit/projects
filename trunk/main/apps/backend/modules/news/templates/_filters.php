<div class="sf_admin_filter">
    <?php if ($form->hasGlobalErrors()): ?>
        <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>

    <?php use_stylesheets_for_form($form) ?>
    <?php use_javascripts_for_form($form) ?>
    
    <div class="row">
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">
                    <h4>
                        <i class="icon-reorder"></i>
                        过滤
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
                            <form action="<?php echo url_for('news_collection', array('action' => 'filter')) ?>" method="post">
                                <table cellspacing="0">
                                    <tfoot>
                                        <tr>
                                            <td colspan="2">
                                                <?php echo $form->renderHiddenFields() ?>
                                                <?php echo link_to(__('Reset', array(), 'sf_admin'), 'news_collection', array('action' => 'filter'), array('query_string' => '_reset', 'class' => 'btn', 'method' => 'post')) ?>
                                                <input type="submit" class="btn btn-info" value=" 执行过滤 " />
                                            </td>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php foreach ($configuration->getFormFilterFields($form) as $name => $field): ?>
                                                    <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
                                                    <?php
                                                    include_partial('news/filters_field', array(
                                                        'name' => $name,
                                                        'attributes' => $field->getConfig('attributes', array()),
                                                        'label' => $field->getConfig('label'),
                                                        'help' => $field->getConfig('help'),
                                                        'form' => $form,
                                                        'field' => $field,
                                                        'class' => 'sf_admin_form_row sf_admin_' . strtolower($field->getType()) . ' sf_admin_filter_field_' . $name,
                                                    ))
                                                    ?>
                                                <?php endforeach; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
