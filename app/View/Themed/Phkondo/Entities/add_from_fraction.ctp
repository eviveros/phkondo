
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3 hidden-print collapse navbar-collapse phkondo-navbar">

        <div class="actions">

            <ul class="nav nav-pills nav-stacked">

                <?php if (isset($fractionId) && $fractionId != null) { ?>
                    <li ><?php echo $this->Html->link(__('Return'), array('controller' => 'fractions', 'action' => 'edit', $fractionId), array('class' => 'btn')); ?></li>
                <?php } else { ?>
                    <li ><?php echo $this->Html->link(__('Return'), array('controller' => 'fractions', 'action' => 'add'), array('class' => 'btn')); ?></li>
                <?php } ?>
            </ul>

        </div><!-- .actions -->

    </div><!-- #sidebar .col-sm-3s -->

    <div id="page-content" class="col-sm-9">

        <div class="entities form">

            <?php
            echo $this->Form->create('Entity', array('class' => 'form-horizontal',
                'role' => 'form',
                'inputDefaults' => array(
                    'class' => 'form-control',
                    'label' => array('class' => 'col-sm-2 control-label'),
                    'between' => '<div class="col-sm-6">',
                    'after' => '</div>',
            )));
            ?>
            <fieldset>
                <h2><?php echo __('Add Manager'); ?></h2>
                <div class="form-group">
<?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <div class="form-group">
                    <?php echo $this->Form->input('vat_number', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('representative', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
<?php echo $this->Form->input('address', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <div class="form-group">
<?php echo $this->Form->input('contacts', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <div class="form-group">
<?php echo $this->Form->input('email', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <div class="form-group">
<?php echo $this->Form->input('bank', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <div class="form-group">
<?php echo $this->Form->input('nib', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <div class="form-group">
<?php echo $this->Form->input('comments', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

            </fieldset>
            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-6"> 
            <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary pull-right')); ?>
                </div> 
            </div>
<?php echo $this->Form->end(); ?>

        </div>

    </div><!-- #page-content .col-sm-9 -->

</div><!-- #page-container .row -->