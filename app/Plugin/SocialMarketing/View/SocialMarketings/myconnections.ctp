<div class="no-mar ver-space top-mspace sep-bot clearfix"><h2 class="text-32  span"><?php echo __l('Social');?></h2>
<?php echo $this->element('sidebar', array('config' => 'sec')); ?>
</div>
<div class="thumbnail space">
  <?php $user = $this->Html->getCurrUserInfo($this->Auth->user('id')); ?>
  <div class="row page-header space-bottom">
    <div class="span2 text-46"><i class="icon-facebook-sign facebookc"></i></div>
    <?php if (!empty($user['User']['is_facebook_connected'])) { ?>
      <?php
        $width = Configure::read('thumb_size.medium_thumb.width');
        $height = Configure::read('thumb_size.medium_thumb.height');
        $user_image = $this->Html->getFacebookAvatar($user['User']['facebook_user_id'], $height, $width);
      ?>
      <div class="span13 space well"><?php echo $user_image . ' ' . __l('You have already connected to Facebook.')?></div>
      <?php if (!empty($user['User']['is_facebook_connected']) && empty($user['User']['is_facebook_register'])): ?>
        <div class="span5 offset1">
          <?php echo $this->Html->link(__l('Disconnect from Facebook'), array('controller' => 'social_marketings', 'action' => 'myconnections', 'facebook'), array('title' => sprintf(__l('Disconnect from %s'), __l('Facebook')) ,'class' => 'span4 btn btn-primary js-confirm')); ?>
        </div>
      <?php endif; ?>
	  <div class="users-social-networks round-3">
		<?php echo $this->Form->create('SocialMarketing', array('action' => 'myconnections', 'class' => 'form-horizontal space')); ?>
		<?php echo $this->Form->input('User.is_show_facebook_friends', array('type' => 'checkbox', 'label' => sprintf(__l('Show Facebook friends level in %s list page.'), Configure::read('item.alt_name_for_item_plural_small')), 'class' => 'js-autosubmit', 'default' => $user['User']['is_show_facebook_friends'])); ?>
		<?php echo $this->Form->submit(__l('Update'), array('div' => 'submit hide')); ?>
		<?php echo $this->Form->end();?>
	</div>
    <?php } else { ?>
      <div class="span13 space well"><?php echo __l('Increase your reputation by showing Facebook friends count.'); ?></div>
      <?php
        $connect_url = Router::url(array(
          'controller' => 'social_marketings',
          'action' => 'import_friends',
          'type' =>'facebook',
          'import' => 'facebook',
          'from' => 'social'
        ), true);
      ?>
      <div class="span5 offset1"><?php echo $this->Html->link(__l('Connect with Facebook'), $connect_url, array('title' => __l('Connect with Facebook'), 'class' => 'js-connect js-no-pjax span4 btn btn-primary {"url":"'.$connect_url.'"}')); ?></div>
    <?php } ?>
  </div>
  <div class="row page-header space-bottom">
    <div class="span2 text-46"><i class="icon-twitter-sign twitterc"></i></div>
    <?php if (!empty($user['User']['is_twitter_connected'])) { ?>
      <?php
        $width = Configure::read('thumb_size.medium_thumb.width');
        $height = Configure::read('thumb_size.medium_thumb.height');
		$user_image = '';
        if (!empty($user['User']['twitter_avatar_url'])):
          $user_image = $this->Html->image($user['User']['twitter_avatar_url'], array(
            'title' => $this->Html->cText($user['User']['username'], false) ,
            'width' => $width,
            'height' => $height
          ));
        endif;
      ?>
      <div class="span13 space well"><span class="space-left"><?php echo $user_image . ' ' . __l('You have already connected to Twitter.'); ?></span></div>
      <?php if (empty($user['User']['is_twitter_register'])): ?>
        <div class="span5 offset1">
          <?php echo $this->Html->link(__l('Disconnect from Twitter'), array('controller' => 'social_marketings', 'action' => 'myconnections', 'twitter'), array('title' => __l('Disconnect from Twitter'),'class' => 'span4 btn btn-primary js-confirm')); ?>
        </div>
      <?php endif; ?>
    <?php } else { ?>
      <div class="span13 space well"><?php echo __l('Increase your reputation by showing Twitter followers count.')?></div>
      <?php
        $connect_url = Router::url(array(
          'controller' => 'social_marketings',
          'action' => 'import_friends',
          'type' =>'twitter',
          'import' => 'twitter',
          'from' => 'social'
        ), true);
      ?>
      <div class="span5 offset1"><?php echo $this->Html->link(__l('Connect with Twitter'), $connect_url, array('title' => __l('Connect with Twitter'),'class' => 'js-connect js-no-pjax span4 btn btn-primary {"url":"'.$connect_url.'"}')); ?></div>
    <?php } ?>
  </div>
  <div class="row page-header space-bottom">
    <div class="span2 text-46"><i class="icon-google-sign googlec"></i></div>
    <?php if (!empty($user['User']['is_google_connected'])) { ?>
					<?php
        $width = Configure::read('thumb_size.medium_thumb.width');
        $height = Configure::read('thumb_size.medium_thumb.height');
		$user_image = '';
        if (!empty($user['User']['google_avatar_url'])):
          $user_image = $this->Html->image($user['User']['google_avatar_url'], array(
            'title' => $this->Html->cText($user['User']['username'], false) ,
            'width' => $width,
            'height' => $height
          ));
        endif;
      ?>
      <div class="span13 space well"><?php  echo $user_image . ' ' . __l('You have already connected to Gmail.')?></div>
      <?php if (empty($user['User']['is_google_register'])): ?>
        <div class="span5 offset1">
          <?php echo $this->Html->link(__l('Disconnect from Gmail'), array('controller' => 'social_marketings', 'action' => 'myconnections', 'google'), array('title' => __l('Disconnect from Gmail'),'class' => 'span4 btn btn-primary js-confirm')); ?>
        </div>
      <?php endif; ?>
    <?php } else { ?>
      <div class="span13 space well"><?php echo __l('Increase your reputation by showing Google contacts count.')?></div>
      <?php
        $connect_url = Router::url(array(
          'controller' => 'social_marketings',
          'action' => 'import_friends',
          'type' =>'google',
          'import' => 'google',
          'from' => 'social'
        ), true);
      ?>
      <div class="span5 offset1"><?php echo $this->Html->link(__l('Connect with Gmail'), $connect_url, array('title' => __l('Connect with Gmail'),'class' => 'js-connect js-no-pjax span4 btn btn-primary {"url":"'.$connect_url.'"}'));
      ?></div>
    <?php } ?>
  </div>
  <div class="row page-header space-bottom">
    <div class="span2 text-46"><i class="icon-google-plus-sign googleplus"></i></div>
    <?php if (!empty($user['User']['is_googleplus_connected'])) { ?>
      <div class="span13 space well"><?php echo __l('You have already connected to Google+.')?></div>
      <?php if (empty($user['User']['is_googleplus_register'])): ?>
        <div class="span5 offset1">
          <?php echo $this->Html->link(__l('Disconnect from Google'), array('controller' => 'social_marketings', 'action' => 'myconnections', 'googleplus'), array('title' => __l('Disconnect from Google+'),'class' => 'span4 btn btn-primary js-confirm')); ?>
        </div>
      <?php endif; ?>
    <?php } else { ?>
      <div class="span13 space well"><?php echo __l('Increase your reputation by showing Google+ contacts count.')?></div>
      <?php
        $connect_url = Router::url(array(
          'controller' => 'social_marketings',
          'action' => 'import_friends',
          'type' =>'googleplus',
          'import' => 'googlePlus',
          'from' => 'social'
        ), true);
      ?>
      <div class="span5 offset1"><?php echo $this->Html->link(__l('Connect with Google+'), $connect_url, array('title' =>__l('Connect with Google+'),'class' => 'js-connect js-no-pjax span4 btn btn-primary {"url":"'.$connect_url.'"}'));
      ?></div>
    <?php } ?>
  </div>
  <div class="row page-header space-bottom">
    <div class="span2 text-46"><i class="icon-yahoo yahooc"></i></div>
    <?php if (!empty($user['User']['is_yahoo_connected'])) { ?>
      <div class="span13 space well"><?php  echo __l('You have already connected to Yahoo!.')?></div>
      <?php if (empty($user['User']['is_yahoo_register'])): ?>
        <div class="span5 offset1">
          <?php echo $this->Html->link(__l('Disconnect from Yahoo'), array('controller' => 'social_marketings', 'action' => 'myconnections', 'yahoo'), array('title' => __l('Disconnect from Yahoo'),'class' => 'span4 btn btn-primary js-confirm')); ?>
        </div>
      <?php endif; ?>
    <?php } else { ?>
      <?php
        $connect_url = Router::url(array(
          'controller' => 'social_marketings',
          'action' => 'import_friends',
          'type' =>'yahoo',
          'import' => 'yahoo',
          'from' => 'social'
        ), true);
      ?>
      <div class="span13 space well"><?php echo __l('Increase your reputation by showing Yahoo! contacts count.')?></div>
      <div class="span5 offset1"><?php echo $this->Html->link(__l('Connect with Yahoo!'), $connect_url, array('title' => __l('Connect with Yahoo!'), 'class' => 'js-connect js-no-pjax span4 btn btn-primary {"url":"'.$connect_url.'"}'));
      ?></div>
    <?php } ?>
  </div>
  <div class="row page-header no-bor space-bottom">
    <div class="span2 text-46"><i class="icon-linkedin-sign linkedc"></i></div>
    <?php if (!empty($user['User']['is_linkedin_connected'])) { ?>
	<?php
        $width = Configure::read('thumb_size.medium_thumb.width');
        $height = Configure::read('thumb_size.medium_thumb.height');
		$user_image = '';
        if (!empty($user['User']['linkedin_avatar_url'])):
          $user_image = $this->Html->image($user['User']['linkedin_avatar_url'], array(
            'title' => $this->Html->cText($user['User']['username'], false) ,
            'width' => $width,
            'height' => $height
          ));
        endif;
    ?>
      <div class="span13 space well"><?php  echo $user_image . ' ' . __l('You have already connected to LinkedIn.')?></div>
      <?php if (empty($user['User']['is_linkedin_register'])): ?>
        <div class="span5 offset1">
          <?php echo $this->Html->link(__l('Disconnect from Linkedin'), array('controller' => 'social_marketings', 'action' => 'myconnections', 'linkedin'), array('title' =>__l('Disconnect from Linkedin'),'class' => 'span4 btn btn-primary js-confirm')); ?>
        </div>
      <?php endif; ?>
    <?php } else { ?>
      <div class="span13 space well"><?php echo __l('Increase your reputation by showing LinkedIn connections count.')?></div>
      <?php
        $connect_url = Router::url(array(
          'controller' => 'social_marketings',
          'action' => 'import_friends',
          'type' =>'linkedin',
          'import' => 'linkedin',
          'from' => 'social'
        ), true);
      ?>
      <div class="span5 offset1"><?php echo $this->Html->link(__l('Connect with Linkedin'), $connect_url, array('title' => __l('Connect with Linkedin'),'class' => 'js-connect js-no-pjax span4 btn btn-primary {"url":"'.$connect_url.'"}'));
      ?></div>
    <?php } ?>
  </div>
</div>