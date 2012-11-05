<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="<?php echo $pluralVar; ?> form">

	<h2><?php printf("<?php echo __('%s'); ?>", $singularHumanName); ?></h2>
	<div class="actions">
		<ul>
	
	<?php if (strpos($action, 'add') === false): ?>
			<li><?php echo "<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), null, __('Are you sure you want to delete # %s?', \$this->Form->value('{$modelClass}.{$primaryKey}'))); ?>"; ?></li>
	<?php endif; ?>
			<li><?php echo "<?php echo \$this->Html->link(__('List %s',__('" . $pluralHumanName . "')), array('action' => 'index')); ?>"; ?></li>
	<?php
			$done = array();
			foreach ($associations as $type => $data) {
				foreach ($data as $alias => $details) {
					if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
						echo "\t\t<li><?php echo \$this->Html->link(__('List %s',__('" . Inflector::humanize($details['controller']) . "')), array('controller' => '{$details['controller']}', 'action' => 'index')); ?> </li>\n";
						echo "\t\t<li><?php echo \$this->Html->link(__('New %s',__('" . Inflector::humanize(Inflector::underscore($alias)) . "')), array('controller' => '{$details['controller']}', 'action' => 'add')); ?> </li>\n";
						$done[] = $details['controller'];
					}
				}
			}
	?>
		</ul>
	</div>
<?php echo "<?php echo \$this->Form->create('{$modelClass}'); ?>\n"; ?>
	<fieldset>
		<legend><?php printf("<?php echo __('%s %%s', __('%s')); ?>", Inflector::humanize($action), $singularHumanName); ?></legend>
<?php
		echo "\t<?php\n";
		foreach ($fields as $field) {
			if (strpos($action, 'add') !== false && $field == $primaryKey) {
				continue;
			} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
				echo "\t\techo \$this->Form->input('{$field}');\n";
			}
		}
		if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
				echo "\t\techo \$this->Form->input('{$assocName}');\n";
			}
		}
		echo "\t?>\n";
?>
	</fieldset>
<?php
	echo "<?php echo \$this->Form->button(__('Submit')); ?>\n";
	echo "<?php echo \$this->Form->end(); ?>\n";
?>
</div>