<?php
$showActions = false;
if ($this->Session->read('Condo.Budget.Status') == 1) {
    $showActions = true;
}
?>
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3 hidden-print collapse navbar-collapse phkondo-navbar">

        <div class="actions">

            <ul class="nav nav-pills nav-stacked">			
                <?php if ($showActions) : ?>
                    <li ><?php echo $this->Html->link(__('Edit Note'), array('action' => 'edit', $note['Note']['id']), array('class' => 'btn ')); ?> </li>
                    <?php if ($note['Note']['deletable']): ?>
                        <li ><?php echo $this->Form->postLink(__('Delete Note'), array('action' => 'delete', $note['Note']['id']), array('class' => 'btn ','confirm'=> __('Are you sure you want to delete # %s?' , $note['Note']['title'] ))); ?> </li>
                    <?php endif; ?>

                    <li ><?php echo $this->Html->link(__('New Note'), array('action' => 'add'), array('class' => 'btn ')); ?> </li>
                <?php endif; ?>
                <li ><?php echo $this->Html->link(__('List Notes'), array('action' => 'index'), array('class' => 'btn ')); ?> </li>


            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .span3 -->

    <div id="page-content" class="col-sm-9">

        <div class="notes view">

            <h2><?php echo __('Note'); ?></h2>

            
                <table class="table table-hover table-condensed">
                    <tbody>
                        <tr>		<td class='col-sm-2'><strong><?php echo __('Document'); ?></strong></td>
                            <td>
                                <?php echo h($note['Note']['document']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		<td><strong><?php echo __('Title'); ?></strong></td>
                            <td>
                                <?php echo h($note['Note']['title']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Document Date'); ?></strong></td>
                            <td>
                                <?php echo $this->Time->format(Configure::read('dateFormatSimple'), $note['Note']['document_date']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		<td><strong><?php echo __('Note Type'); ?></strong></td>
                            <td>
                                <?php echo h($note['NoteType']['name']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Fraction'); ?></strong></td>
                            <td>
                                <?php echo h($note['Fraction']['fraction']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Entity'); ?></strong></td>
                            <td>
                                <?php echo h($note['Entity']['name']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Budget'); ?></strong></td>
                            <td>
                                <?php echo h($note['Budget']['title']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		<td><strong><?php echo __('Fiscal Year'); ?></strong></td>
                            <td>
                                <?php echo h($note['FiscalYear']['title']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		<td><strong><?php echo __('Amount'); ?></strong></td>
                            <td>
                                <?php echo h($note['Note']['amount']); ?>
                                &nbsp;<?= Configure::read('currencySign'); ?>
                            </td>
                        </tr><!--tr>		<td><strong><?php //echo __('Pending Amount');  ?></strong></td>
                            <td>
                        <?php //echo h($note['Note']['pending_amount']); ?>
                                &nbsp;
                            </td>
                        </tr--><tr>		<td><strong><?php echo __('Due Date'); ?></strong></td>
                            <td>
                                <?php echo $this->Time->format(Configure::read('dateFormatSimple'), $note['Note']['due_date']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Payment Date'); ?></strong></td>
                            <td>
                                <?php echo $this->Time->format(Configure::read('dateFormatSimple'), $note['Note']['payment_date']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Note Status'); ?></strong></td>
                            <td>
                                <?php echo h($note['NoteStatus']['name']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		<td><strong><?php echo __('Receipt'); ?></strong></td>
                            <td>
                                <?php echo h($note['Receipt']['document']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php echo $this->Time->format(Configure::read('dateFormat'), $note['Note']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo $this->Time->format(Configure::read('dateFormat'), $note['Note']['created']); ?>
                                &nbsp;
                            </td>
                        </tr>					</tbody>
                </table><!-- /.table table-hover table-condensed -->
            

        </div><!-- /.view -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->