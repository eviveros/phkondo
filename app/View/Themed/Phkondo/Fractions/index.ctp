<div id="page-container" class="row">

    <div id="page-content" class="col-sm-12">

        <div class="fractions index">

            <h2 class="col-sm-9"><?php echo __('Fractions'); ?></h2>
             
            <div class="actions hidden-print col-sm-3">
                <?php echo $this->Html->link('<span class="glyphicon glyphicon-plus-sign"></span> ' . __('New Fraction'), array('action' => 'add'), array('class' => 'btn btn-primary', 'style' => 'margin: 14px 0; float: right;', 'escape' => false)); ?>            </div><!-- /.actions -->
            <div class="clearfix"></div>
            <?php
            $milRate = Set::extract('/Fraction/mil_rate', $fractions);

            if (array_sum($milRate) != 1001 && array_sum($milRate) != 0):
            ?>
            <div class="alert alert-warning" role="alert"><?= __('Warning: Mil rate sum should be 1000'); ?></div>

            <?php endif; ?>
            <div class="table-responsive">
                <table class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th><?php echo $this->Paginator->sort('Fraction.length', __('Fraction')); ?></th>
                            <th><?php echo $this->Paginator->sort('floor_location'); ?></th>
                            <th><?php echo $this->Paginator->sort('description'); ?></th>
                            <th><?php echo $this->Paginator->sort('mil_rate'); ?></th>
                            <th><?php echo $this->Paginator->sort('Manager.name', __('Manager')); ?></th>
                            <th class="actions hidden-print"><?php //echo __('Actions');   ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($fractions as $fraction): ?>
                            <tr>
                                <td><?php echo h($fraction['Fraction']['fraction']); ?>&nbsp;</td>
                                <td><?php echo h($fraction['Fraction']['floor_location']); ?>&nbsp;</td>
                                <td><?php echo h($fraction['Fraction']['description']); ?>&nbsp;</td>
                                <td><?php echo h($fraction['Fraction']['mil_rate']); ?>&nbsp;</td>
                                <td><?php
                                    if ($fraction['Fraction']['manager_id'] == 0) {
                                        echo '<span style="font-weight:bold;">' . __('All owners') . '</span>';
                                        foreach ($fraction['Entity'] as $manager) {
                                            echo "<br/>" . $manager['name'];
                                        }
                                    } else {
                                        echo h($fraction['Manager']['name']);
                                    }

                                    $deleteDisabled = '';
                                    if (!$fraction['Fraction']['deletable'] == true) {
                                        $deleteDisabled = ' disabled';
                                    }
                                    ?>
                                </td>
                                <td class="actions hidden-print">
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-list"></span> ', array('action' => 'view', $fraction['Fraction']['id']), array('title' => __('Details'), 'class' => 'btn btn-default btn-xs', 'escape' => false)); ?>
                                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span> ', array('action' => 'edit', $fraction['Fraction']['id']), array('title' => __('Edit'), 'class' => 'btn btn-default btn-xs', 'escape' => false)); ?>
                                    <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span> ', array('action' => 'delete', $fraction['Fraction']['id']), array('title' => __('Remove'), 'class' => 'btn btn-default btn-xs' . $deleteDisabled, 'escape' => false, 'confirm' => __('Are you sure you want to delete # %s?', $fraction['Fraction']['fraction']))); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <p class='pull-right'><small>
                    <?php
                    echo $this->Paginator->counter(array(
                        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                    ));
                    ?>                </small></p>

            <div class='clearfix'></div><ul class="hidden-print pagination pull-right">
                <?php
                echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
                echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                ?>
            </ul><!-- /.pagination -->
           
        </div><!-- /.index -->

    </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->