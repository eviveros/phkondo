
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3 hidden-print collapse navbar-collapse phkondo-navbar">

        <div class="actions">

            <ul class="nav nav-pills nav-stacked">
                <li ><?php echo $this->Html->link(__('List Insurances'), array('action' => 'index'),array('class'=>'btn')); ?></li>

            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <div class="insurances form">

            <?php echo $this->Form->create('Insurance', array('class' => 'form-horizontal', 'role' => 'form', 'inputDefaults' => array('class' => 'form-control', 'label' => array('class' => 'col-sm-2 control-label'), 'between' => '<div class="col-sm-6">', 'after' => '</div>',))); ?>
            <fieldset>
                <h2><?php echo __('Add Insurance'); ?></h2>
                <div class="form-group">
                    <?php echo $this->Form->input('condo_id', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('fraction_id', array('empty' => '', 'class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <div class="form-group">
                    <?php
                    echo $this->Form->input('expiration_date', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 1,
                        'maxYear' => date('Y') + 500, 'class' => 'form-control'));
                    ?>
                </div><!-- .form-group -->

                <div class="form-group">
<?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <div class="form-group">
<?php echo $this->Form->input('insurance_company', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <div class="form-group">
<?php echo $this->Form->input('policy', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <div class="form-group">
<?php echo $this->Form->input('insurance_type_id', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <div class="form-group">
<?php echo $this->Form->input('insurance_amount', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->

                <div class="form-group">
<?php echo $this->Form->input('insurance_premium', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->


            </fieldset>
            <div class="form-group">                 <div class="col-sm-offset-2 col-sm-6">                     <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary pull-right')); ?>                 </div>             </div>
<?php echo $this->Form->end(); ?>

        </div><!-- /.form -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->