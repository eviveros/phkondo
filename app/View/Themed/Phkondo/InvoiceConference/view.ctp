
<div id="page-container" class="row">

    <div id="sidebar" class="col-sm-3 hidden-print collapse navbar-collapse phkondo-navbar">

        <div class="actions">

            <ul class="nav nav-pills nav-stacked">			
                <li ><?php echo $this->Html->link(__('Edit Invoice'), array('action' => 'edit', $invoice_conference['InvoiceConference']['id']), array('class' => 'btn ')); ?> </li>
                <li ><?php echo $this->Form->postLink(__('Delete Invoice'), array('action' => 'delete', $invoice_conference['InvoiceConference']['id']), array('class' => 'btn ','confirm'=> __('Are you sure you want to delete # %s?' , $invoice_conference['InvoiceConference']['description'] ))); ?> </li>
                <li ><?php echo $this->Html->link(__('New Invoice'), array('action' => 'add',$invoice_conference['InvoiceConference']['supplier_id']), array('class' => 'btn ')); ?> </li>
                <li ><?php echo $this->Html->link(__('List Invoices'), array('action' => 'index_by_supplier',$invoice_conference['InvoiceConference']['supplier_id']), array('class' => 'btn ')); ?> </li>


            </ul><!-- /.list-group -->

        </div><!-- /.actions -->

    </div><!-- /#sidebar .span3 -->

    <div id="page-content" class="col-sm-9">

        <div class="invoice_conference view">

            <h2><?php echo __('Invoice'); ?></h2>

            
                <table class="table table-hover table-condensed">
                    <tbody>
                        <tr>		
                            <td class='col-sm-2'><strong><?php echo __('Document'); ?></strong></td>
                            <td>
                                <?php echo $invoice_conference['InvoiceConference']['document']; ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Supplier'); ?></strong></td>
                            <td>
                                <?php echo $invoice_conference['Supplier']['name']; ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Description'); ?></strong></td>
                            <td>
                                <?php echo h($invoice_conference['InvoiceConference']['description']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Amount'); ?></strong></td>
                            <td>
                                <?php echo h($invoice_conference['InvoiceConference']['amount']); ?>
                                &nbsp;<?= Configure::read('currencySign'); ?>
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Document Date'); ?></strong></td>
                            <td>
                                <?php 
                                if (!empty($invoice_conference['InvoiceConference']['document_date'])):
                                echo $this->Time->format(Configure::read('dateFormatSimple'), $invoice_conference['InvoiceConference']['document_date']);
                                endif;
                                ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Due Date'); ?></strong></td>
                            <td>
                                <?php 
                                if (!empty($invoice_conference['InvoiceConference']['payment_due_date'])):
                                echo $this->Time->format(Configure::read('dateFormatSimple'), $invoice_conference['InvoiceConference']['payment_due_date']); 
                                endif;
                                
                                ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Payment Date'); ?></strong></td>
                            <td>
                                <?php 
                                if (!empty($invoice_conference['InvoiceConference']['payment_date'])):
                                echo $this->Time->format(Configure::read('dateFormatSimple'), $invoice_conference['InvoiceConference']['payment_date']); 
                                endif;
                                
                                ?>
                                &nbsp;
                            </td>
                        </tr>
                        
                        
                        <tr>		
                            <td><strong><?php echo __('Status'); ?></strong></td>
                            <td>
                                <?php echo $invoice_conference['InvoiceConferenceStatus']['name']; ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Comments'); ?></strong></td>
                            <td>
                                <?php echo $invoice_conference['InvoiceConference']['comments']; ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Modified'); ?></strong></td>
                            <td>
                                <?php echo $this->Time->format(Configure::read('dateFormat'), $invoice_conference['InvoiceConference']['modified']); ?>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>		
                            <td><strong><?php echo __('Created'); ?></strong></td>
                            <td>
                                <?php echo $this->Time->format(Configure::read('dateFormat'), $invoice_conference['InvoiceConference']['created']); ?>
                                &nbsp;
                            </td>
                        </tr>					
                    </tbody>
                </table><!-- /.table table-hover table-condensed -->
            

        </div><!-- /.view -->


    </div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->