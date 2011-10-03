<?php defined('_JEXEC') or die('Restricted access'); ?>

<?php

	JToolBarHelper::title(  JText::_( 'Virtuemart SEF' ), 'sef'  );
	JToolBarHelper::save();
	
?>


<div class="col width-45">
<form action="index.php" method="post" name="adminForm">
	<fieldset class="adminform">
	<legend><?php echo JText::_( 'Config' ); ?></legend>
	<table class="admintable">
		<tr>
			<td width="120" class="key">
				<?php echo JText::_( 'Published' ); ?>:
			</td>
			<td>
				<?php echo JHTML::_( 'select.booleanlist',  'is_active', 'class="inputbox"', $this->config->is_active ); ?>
			</td>
		</tr>
		<tr>
			<td width="110" class="key">
				<label for="alias">
					<?php echo JText::_( 'Rewrite type' ); ?>:
				</label>
			</td>
			<td>
				<?php echo JHTML::_('select.genericlist',   $this->rewrite_modes, 'rewrite_mode', 'class="inputbox" size="1"', 'value', 'text', $this->config->rewrite_mode );?>
			</td>
		</tr>
	</table>
	</fieldset>
	<input type="hidden" name="task" value="save" />
	<input type="hidden" name="option" value="com_vm_sef" />
	<input type="hidden" name="version" value="<?php echo $this->config->version; ?>" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
</div>
<div class="col width-45">
	<fieldset class="adminform">
	<legend><?php echo JText::_( 'Info' ); ?></legend>
    <table class="admintable">
    	<tr>
        	<td>Virtuemart</td>
            <td><?php echo ($this->virtuemart) ? '<font color="green">'.JTEXT::_('Ok').'</font>' : '<font color="red">'.JTEXT::_('ERROR').'</font>' ?></td>
        </tr>
        <tr>
        	<td>Joomla SEF</td>
            <td><?php echo ($this->sef) ? '<font color="green">'.JTEXT::_('YES').'</font>' : '<font color="red">'.JTEXT::_('NO').'</font>' ?></td>
        </tr>
    </table>

        <br/><a href="http://www.daycounts.com/" target="_blank" title="DayCounts.com"><img src="components/com_vm_sef/assets/images/daycounts.png"  alt="DayCounts.com" border="0" height="40" /></a>
        <br/><br/>
        <iframe frameborder="0" width="100%" height="350" src="http://daycounts.com/en/component/versions/?catid=<?php echo $this->config->version_cat; ?>&tmpl=component&myVersion=<?php echo $this->config->version; ?>"></iframe>

    
        <br /><br />
    
    <br /><br />
    <form method="post" action="https://www.paypal.com/cgi-bin/webscr"> 
    	<input value="_s-xclick" name="cmd" type="hidden" /> 
        <input value="XJY7APQB5UE2U" name="hosted_button_id" type="hidden" /> 
        <input alt="PayPal - The safer, easier way to pay online!" name="submit" border="0" src="https://www.paypalobjects.com/WEBSCR-640-20110306-1/en_US/i/btn/btn_donate_LG.gif" type="image" style="border:none;" /> 
        <img height="1" width="1" src="https://www.paypalobjects.com/WEBSCR-640-20110306-1/fr_CA/i/scr/pixel.gif" border="0" /> 
        </form>
	</fieldset>
</div>
<div class="clr"></div>

