<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="cities index js-response">
<ul class="breadcrumb top-mspace ver-space">
              <li><?php echo $this->Html->link(__l('Dashboard'), array('controller'=>'users','action'=>'stats'), array('class' => 'js-no-pjax', 'escape' => false));?> <span class="divider">/</span></li>
              <li class="active"><?php echo __l('Cities'); ?></li>
            </ul> 
			<div class="tabbable ver-space sep-top top-mspace">
<div class="clearfix">
				<?php 
				$class = (!empty($this->request->params['named']['filter_id']) && $this->request->params['named']['filter_id'] == 			ConstMoreAction::Active) ? 'active' : null;
				echo $this->Html->link( '
					<dl class="dc list users '.$class .' mob-clr mob-sep-none ">					         	
						<dt class="pr hor-mspace text-11 grayc"  title="'.__l('Enabled').'">'.__l('Enabled').'</dt>
						<dd title="'.$this->Html->cInt($active,false).'" class="textb text-20 no-mar graydarkc pr hor-mspace">'.$this->Html->cInt($active ,false).'</dd>                  	
					</dl>'
					, array('controller'=>'cities','action'=>'index','filter_id' => ConstMoreAction::Active), array('escape' => false,'class'=>'no-under show pull-left mob-clr bot-space bot-mspace cur'));
				$class = (!empty($this->request->params['named']['filter_id']) && $this->request->params['named']['filter_id'] == 			ConstMoreAction::Inactive) ? 'active' : null;
				echo $this->Html->link( '
					<dl class="dc list users '.$class .' mob-clr mob-sep-none ">					         	
						<dt class="pr hor-mspace text-11 grayc"  title="'.__l('Disabled').'">'.__l('Disabled').'</dt>
						<dd title="'.$this->Html->cInt($inactive,false).'" class="textb text-20 no-mar graydarkc pr hor-mspace">'.$this->Html->cInt($inactive ,false).'</dd>                  	
					</dl>'
					, array('controller'=>'cities','action'=>'index','filter_id' => ConstMoreAction::Inactive), array('escape' => false,'class'=>'no-under show pull-left mob-clr bot-space bot-mspace cur'));
				$class = (empty($this->request->params['named']['filter_id'])) ? 'active' : null;
				echo $this->Html->link( '
					<dl class="dc list users '.$class .' mob-clr mob-sep-none ">					         	
						<dt class="pr hor-mspace text-11 grayc"  title="'.__l('Total').'">'.__l('Total').'</dt>
						<dd title="'.$this->Html->cInt($active + $inactive,false).'" class="textb text-20 no-mar graydarkc pr hor-mspace">'.$this->Html->cInt($active + $inactive,false).'</dd>                  	
					</dl>'
					, array('controller'=>'cities','action'=>'index'), array('escape' => false,'class'=>'no-under show pull-left mob-clr bot-space bot-mspace cur'));
				
				?>
				</div>
<div class="clearfix dc">
					<?php echo $this->Form->create('City', array('method' => 'get', 'class' => 'form-search bot-mspace big-input span', 'action'=>'index')); ?>
					<?php echo $this->Form->input('q', array('placeholder' => __l('Keyword'),'class'=>'span9 ver-mspace text-16','label' => false, 'maxlength' => '255')); ?>
					<?php echo $this->Form->submit(__l('Search'), array('class'=>'btn btn-large hor-mspace btn-primary textb text-16'));?>
					<?php echo $this->Form->end(); ?>
					<div class="pull-right top-space mob-clr dc top-mspace">
					 
					<?php echo $this->Html->link('<span class="ver-smspace"><i class="icon-plus-sign no-pad top-smspace"></i></span>', array('controller' => 'cities', 'action' => 'add'), array('escape' => false,'class' => 'add btn btn-primary textb text-18 whitec','title'=>__l('Add'))); ?>
				</div>
			</div>
					
			</div>
			<?php echo $this->element('paging_counter'); ?>
            <?php
            echo $this->Form->create('City', array('action' => 'update','class'=>'normal')); ?>
            <?php echo $this->Form->input('r', array('type' => 'hidden', 'value' => $this->request->url)); ?>
        <div class="ver-space">
                    <div id="active-users" class="tab-pane active in no-mar">
     <table class="table no-round table-striped">
	<thead>
	<tr class=" well no-mar no-pad">
                    <th class="dc graydarkc sep-right span2"><?php echo __l('Select'); ?></th>
                    <th class="dc graydarkc sep-right span2"><?php echo __l('Actions');?></th>
                    <th class="graydarkc sep-right"><div class="js-pagination"><?php echo $this->Paginator->sort( 'Country.name',__l('Country'), array('url'=>array('controller'=>'cities', 'action'=>'index')));?></div></th>
                    <th class="graydarkc sep-right"><div class="js-pagination"><?php echo $this->Paginator->sort( 'State.name', __l('State'),array('url'=>array('controller'=>'cities', 'action'=>'index')));?></div></th>
                    <th class="graydarkc sep-right"><div class="js-pagination"><?php echo $this->Paginator->sort( 'name',__l('Name'));?></div></th>
                    <th class="dc graydarkc sep-right"><div class="js-pagination"><?php echo $this->Paginator->sort('latitude',__l('Latitude'));?></div></th>
                    <th class="dc graydarkc sep-right"><div class="js-pagination"><?php echo $this->Paginator->sort( 'longitude',__l('Longitude'));?></div></th>
                    <th class="dc graydarkc sep-right"><div class="js-pagination"><?php echo $this->Paginator->sort( 'timezone',__l('Timezone'));?></div></th>
                    <th class="dc graydarkc sep-right"><div class="js-pagination"><?php echo $this->Paginator->sort( 'county',__l('County'));?></div></th>
                    <th class="dc graydarkc sep-right"><div class="js-pagination"><?php echo $this->Paginator->sort( 'code',__l('Code'));?></div></th>
                </tr></thead><tbody>
                <?php
                if (!empty($cities)):
                    $i = 0;
                    foreach ($cities as $city):
                        $class = null;
                        $active_class = '';
                        if ($i++ % 2 == 0) :
                             $class = 'altrow';
                        endif;
                        if($city['City']['is_approved'])  :
                            $status_class = 'js-checkbox-active';
                        else:
                            $active_class = 'disable';
                            $status_class = 'js-checkbox-inactive';
                        endif;
                    ?>
                         <tr class="<?php echo $class. ' ' .$active_class;?>">
                            <td class="dc">
                                <?php
                                echo $this->Form->input('City.'.$city['City']['id'].'.id',array('type' => 'checkbox', 'id' => "admin_checkbox_".$city['City']['id'],'label' => "" , 'class' => $status_class.' js-checkbox-list'));
                                ?>
                            </td>
							 <td class="dc"><span class="dropdown dc"> <span title="<?php echo __l('Actions');?>" data-toggle="dropdown" class="graydarkc left-space hor-smspace icon-cog text-18 cur dropdown-toggle"> <span class="hide"><?php echo __l('Action');?></span> </span>
                                <ul class="dropdown-menu arrow no-mar dl">
								 <?php if(!$city['City']['is_approved']): ?>
        			<li><?php echo $this->Html->link('<i class="icon-thumbs-up"></i>'.__l('Approve'), array('action' => 'update_status', $city['City']['id'], 'status' => 'approved'), array('escape' => false,'class' => 'js-delete', 'title' => __l('Approve')));?></li>
						<?php else: ?>
					<li><?php echo $this->Html->link('<i class="icon-thumbs-down"></i>'.__l('Disapprove'), array('action' => 'update_status', $city['City']['id'], 'status' => 'disapproved'), array('escape' => false,'class' => 'delete js-delete', 'title' => __l('Disapprove')));?></li>
					<?php
					endif;
					?>
					<li><?php echo $this->Html->link('<i class="icon-edit"></i>'.__l('Edit'), array('action' => 'edit', $city['City']['id']), array('escape' => false, 'title' => __l('Edit')));?></li>
        			<li><?php echo $this->Html->link('<i class="icon-remove"></i>'.__l('Delete'), array('action' => 'delete', $city['City']['id']), array('escape' => false,'class' => 'delete js-delete', 'title' => __l('Delete')));?></li>
			   </ul>
							 </span>
                            </td>
                            <td class="dl"><?php echo $this->Html->cText($city['Country']['name'], false);?></td>
                            <td class="dl"><?php echo $this->Html->cText($city['State']['name'], false);?></td>
                            <td class="dl"><?php echo $this->Html->cText($city['City']['name'], false);?></td>
                            <td class="dc"><?php echo $this->Html->cFloat($city['City']['latitude']);?></td>
                            <td class="dc"><?php echo $this->Html->cFloat($city['City']['longitude']);?></td>
                            <td class="dc"><?php echo $this->Html->cText($city['City']['timezone']);?></td>
                            <td class="dc"><?php echo $this->Html->cText($city['City']['county']);?></td>
                            <td class="dc"><?php echo $this->Html->cText($city['City']['code']);?></td>
                        </tr>
                    <?php
                    endforeach;
                    else:
                    ?>
                    <tr>
                        <td colspan="10"><div class="space dc grayc"><p class="ver-mspace top-space text-16 "><?php echo __l('No Cities available');?></p></div></td>
                    </tr>
                    <?php
                    endif;
                    ?></tbody>
            </table>
            <?php
                if (!empty($cities)) :
                    ?>
                   	<div class="admin-select-block ver-mspace pull-left mob-clr dc"><div class="span top-mspace">
       <span class="graydarkc">
                        <?php echo __l('Select:'); ?></span>
                        <?php echo $this->Html->link(__l('All'), '#', array('class' => 'hor-smspace grayc js-select js-no-pjax {"checked":"js-checkbox-list"}','title' => __l('All'))); ?>
                        <?php echo $this->Html->link(__l('None'), '#', array('class' => 'hor-smspace grayc js-select js-no-pjax {"unchecked":"js-checkbox-list"}','title' => __l('None'))); ?>
						<?php echo $this->Html->link(__l('Enable'), '#', array('class' => 'hor-smspace grayc js-select js-no-pjax {"checked":"js-checkbox-active","unchecked":"js-checkbox-inactive"}','title' => __l('Enable'))); ?>   
                        <?php echo $this->Html->link(__l('Disable'), '#', array('class' => 'hor-smspace grayc js-select js-no-pjax {"checked":"js-checkbox-inactive","unchecked":"js-checkbox-active"}','title' => __l('Disable'))); ?>
                                        
             </div><?php echo $this->Form->input('more_action_id', array('class' => 'js-admin-index-autosubmit js-no-pjax span5', 'div'=>false,'label' => false, 'empty' => __l('-- More actions --'))); ?></span>
            <?php endif; ?>
         </div>
          <div class="js-pagination pagination pull-right no-mar mob-clr dc">
            <?php echo $this->element('paging_links'); ?>
        </div>
        </div>
        <div class="hide">
            <?php echo $this->Form->submit(__l('Submit'));  ?>
        </div>
        <?php
    echo $this->Form->end();
    ?>
</div>