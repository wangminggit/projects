<?php if ($field->isPartial()): ?>
    <?php include_partial('regulation/' . $name, array('type' => 'filter', 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php elseif ($field->isComponent()): ?>
    <?php include_component('regulation', $name, array('type' => 'filter', 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php else: ?>
    <div class="filter_item filter_item_<?php echo $name; ?>">
        <?php echo $form[$name]->renderLabel($label) ?>
        <?php echo $form[$name]->renderError() ?>
        <?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?>
    </div>
<?php endif; ?>
