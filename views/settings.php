<?php if (!defined('APPLICATION')) exit(); ?>
<h1><?php echo T($this->Data['Title']); ?></h1>
<div class="Info">
   <?php echo T($this->Data['PluginDescription']); ?>
</div>
<h3><?php echo T('Settings'); ?></h3>
<?php
   echo $this->Form->Open();
   echo $this->Form->Errors();
?>
<ul>
   <li><?php
      echo $this->Form->Label('Display Mode', 'Plugin.VanillaTinyMCE.Mode');
      echo $this->Form->DropDown('Plugin.VanillaTinyMCE.Mode',array(
         'simple'   => 'Simple',
         'basic'    => 'Basic',
         'advanced' => 'Advanced',
         'full'     => 'Full'
      ));
   ?></li>
</ul>
<?php
   echo $this->Form->Close('Save');
?>
