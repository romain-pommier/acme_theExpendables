<?php
/* Smarty version 3.1.33, created on 2020-08-21 09:10:18
  from '/var/www/html/admin896fun2jr/themes/default/template/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f3f735ad324d1_55730311',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3553747c872872810fe6179b41f9a0f3b7aabbd5' => 
    array (
      0 => '/var/www/html/admin896fun2jr/themes/default/template/content.tpl',
      1 => 1593780665,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f3f735ad324d1_55730311 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="ajax_confirmation" class="alert alert-success hide"></div>
<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div>
<?php }
}
