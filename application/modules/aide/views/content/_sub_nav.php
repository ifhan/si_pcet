<ul class="nav nav-pills">
    <li <?php echo $this->uri->segment(3) == '' ? 'class="active"' : '' ?>>
	<a href="<?php echo site_url(SITE_AREA .'/content') ?>" id="home"><?php echo lang('bf_home'); ?></a>
    </li>
    <li <?php echo $this->uri->segment(4) == '' ? 'class="active"' : '' ?>>
        <a href="<?php echo site_url(SITE_AREA .'/content/aide') ?>"><?php echo lang('aide_summary'); ?></a>
    </li>    
    <li <?php echo $this->uri->segment(4) == 'list' ? 'class="active"' : '' ?>>
        <a href="<?php echo site_url(SITE_AREA .'/content/aide/list') ?>"><?php echo lang('aide_list'); ?></a>
    </li>
    <li <?php echo $this->uri->segment(4) == 'create' ? 'class="active"' : '' ?>>
        <a href="<?php echo site_url(SITE_AREA .'/content/aide/create') ?>"><?php echo lang('aide_new'); ?></a>
    </li>
</ul>