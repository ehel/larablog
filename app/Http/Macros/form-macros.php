<?php


Form::macro('field', function($name, $field, $required = '', $cols1 = 0, $cols2 = 0) { ?>
    <div class="form-group">
        <label class="control-label col-md-<?php echo $cols1 != 0 ? $cols1 : '3' ?>"><?php echo $name; ?> <?php if($required == 'required') : ?><span class="required"> * </span><?php endif; ?></label>
        <div class="col-md-<?php echo $cols2 != 0 ? $cols2 : '8' ?> input-wrapper">
            <?php echo $field; ?>
        </div>
    </div>
    <?php
});



