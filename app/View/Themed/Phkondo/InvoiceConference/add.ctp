<?php $this->Html->script('invoice_conference_edit', false); ?>
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3 hidden-print collapse navbar-collapse phkondo-navbar">

        <div class="actions">

            <ul class="nav nav-pills nav-stacked">
                <?php if (count($suppliers) > 1) { ?>
                    <li><?php echo $this->Html->link(__('List Invoices'), array('action' => 'index'),array('class'=>'btn')); ?></li>
                <?php } else { ?>
                    <li><?php echo $this->Html->link(__('List Invoices'), array('action' => 'index_by_supplier', key($suppliers)),array('class'=>'btn')); ?></li>
                <?php } ?>
            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .col-sm-3 -->

    <div id="page-content" class="col-sm-9">

        <div class="movements form">

            <?php echo $this->Form->create('InvoiceConference', array('class' => 'form-horizontal', 'role' => 'form', 'inputDefaults' => array('class' => 'form-control', 'label' => array('class' => 'col-sm-2 control-label'), 'between' => '<div class="col-sm-6">', 'after' => '</div>',))); ?>
            <fieldset>
                <h2><?php echo __('Add Invoice'); ?></h2>
                <div class="form-group">
                    <?php echo $this->Form->input('condo_id', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('fiscal_year_id', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('document', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php
                    $emptyValue = false;
                    if (count($suppliers) > 1) {
                        $emptyValue = true;
                    }
                    echo $this->Form->input('supplier_id', array('empty' => $emptyValue, 'class' => 'form-control'));
                    ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('description', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('amount', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php
                    echo $this->Form->input('document_date', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 10,
                        'maxYear' => date('Y') + 50, 'class' => 'form-control'));
                    ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php
                    echo $this->Form->input('payment_due_date', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 10,
                        'maxYear' => date('Y') + 50, 'class' => 'form-control'));
                    ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('comments', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <div class="form-group">
                    <?php echo $this->Form->input('invoice_conference_status_id', array('class' => 'form-control')); ?>
                </div><!-- .form-group -->
                <?php 
                $hidden="hidden";
                $disabled="disabled";
               
                if ($this->Form->value('invoice_conference_status_id')=='5') {
                    $hidden=null;
                    $disabled=null;
                }
                ?>
                <div class="form-group <?php echo $hidden; ?>" id="elem_payment_date">
                    <?php
                    echo $this->Form->input('payment_date', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 10,
                        'maxYear' => date('Y') + 50, 'empty' => true, 'class' => 'form-control','disabled'=>$disabled));
                    ?>
                </div><!-- .form-group -->

            </fieldset>
            <div class="form-group">                 <div class="col-sm-offset-2 col-sm-6">                     <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-large btn-primary pull-right')); ?>                 </div>             </div>
            <?php echo $this->Form->end(); ?>

        </div><!-- /.form -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->