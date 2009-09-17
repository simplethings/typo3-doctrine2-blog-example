<?php

########################################################################
# Extension Manager/Repository config file for ext: "blog_example"
#
# Auto generated 01-09-2009 10:39
#
# Manual updates:
# Only the data in the array - anything else is removed by next write.
# "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'A Blog Example for the Extbase Framework',
	'description' => 'An example extension demonstrating the features of the Extbase Framework. It is the back-ported Blog Example package of FLOW3. Have fun playing with it! But don\'t use it in a productive environment for security reasons.',
	'category' => 'example',
	'author' => '',
	'author_company' => '',
	'author_email' => '',
	'shy' => '',
	'dependencies' => 'extbase,fluid',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 1,
	'lockType' => '',
	'version' => '0.9.5',
	'constraints' => array(
		'depends' => array(
			'php' => '5.2.0-0.0.0',
			'typo3' => '4.3.dev-4.3.99',
			'extbase' => '0.9.5-0.0.0',
			'fluid' => '0.9.5-0.0.0',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:55:{s:16:"ext_autoload.php";s:4:"171a";s:12:"ext_icon.gif";s:4:"e499";s:17:"ext_localconf.php";s:4:"0c97";s:14:"ext_tables.php";s:4:"4191";s:14:"ext_tables.sql";s:4:"4bcb";s:44:"Classes/Controller/AdminModuleController.php";s:4:"f0b1";s:37:"Classes/Controller/BlogController.php";s:4:"1d86";s:40:"Classes/Controller/CommentController.php";s:4:"dce9";s:37:"Classes/Controller/PostController.php";s:4:"cd1c";s:38:"Classes/Domain/Model/Administrator.php";s:4:"99d6";s:29:"Classes/Domain/Model/Blog.php";s:4:"b8a5";s:32:"Classes/Domain/Model/Comment.php";s:4:"df7e";s:31:"Classes/Domain/Model/Person.php";s:4:"f294";s:29:"Classes/Domain/Model/Post.php";s:4:"2e67";s:28:"Classes/Domain/Model/Tag.php";s:4:"c29d";s:53:"Classes/Domain/Repository/AdministratorRepository.php";s:4:"e274";s:44:"Classes/Domain/Repository/BlogRepository.php";s:4:"7ae9";s:46:"Classes/Domain/Repository/PersonRepository.php";s:4:"a93d";s:44:"Classes/Domain/Repository/PostRepository.php";s:4:"4bee";s:42:"Classes/Domain/Validator/BlogValidator.php";s:4:"4e86";s:49:"Classes/ViewHelpers/AbstractBackendViewHelper.php";s:4:"17b7";s:44:"Classes/ViewHelpers/Be/EndPageViewHelper.php";s:4:"ee81";s:46:"Classes/ViewHelpers/Be/StartPageViewHelper.php";s:4:"35ea";s:48:"Classes/ViewHelpers/Be/Buttons/CshViewHelper.php";s:4:"583f";s:57:"Classes/ViewHelpers/Be/Buttons/SaveAndCloseViewHelper.php";s:4:"0e81";s:55:"Classes/ViewHelpers/Be/Buttons/SaveAndNewViewHelper.php";s:4:"cdfd";s:56:"Classes/ViewHelpers/Be/Buttons/SaveAndViewViewHelper.php";s:4:"11d2";s:49:"Classes/ViewHelpers/Be/Buttons/SaveViewHelper.php";s:4:"2803";s:53:"Classes/ViewHelpers/Be/Buttons/ShortcutViewHelper.php";s:4:"e576";s:55:"Classes/ViewHelpers/Be/Menus/FunctionMenuViewHelper.php";s:4:"14c4";s:52:"Classes/ViewHelpers/Be/Status/PageInfoViewHelper.php";s:4:"0569";s:52:"Classes/ViewHelpers/Be/Status/PagePathViewHelper.php";s:4:"01e6";s:41:"Configuration/FlexForms/flexform_list.xml";s:4:"ed1a";s:25:"Configuration/TCA/tca.php";s:4:"5be7";s:34:"Configuration/TypoScript/setup.txt";s:4:"de53";s:40:"Resources/Private/Language/locallang.xml";s:4:"df49";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"c008";s:44:"Resources/Private/Language/locallang_mod.xml";s:4:"cd5d";s:38:"Resources/Private/Layouts/default.html";s:4:"622a";s:37:"Resources/Private/Layouts/module.html";s:4:"3bba";s:44:"Resources/Private/Partials/postMetaData.html";s:4:"c219";s:50:"Resources/Private/Templates/AdminModule/index.html";s:4:"665d";s:42:"Resources/Private/Templates/Blog/edit.html";s:4:"1e6b";s:43:"Resources/Private/Templates/Blog/index.html";s:4:"f1b6";s:41:"Resources/Private/Templates/Blog/new.html";s:4:"0a1d";s:42:"Resources/Private/Templates/Post/edit.html";s:4:"ca27";s:43:"Resources/Private/Templates/Post/index.html";s:4:"956e";s:42:"Resources/Private/Templates/Post/index.txt";s:4:"ac46";s:41:"Resources/Private/Templates/Post/new.html";s:4:"de07";s:42:"Resources/Private/Templates/Post/show.html";s:4:"9a2d";s:64:"Resources/Public/Icons/icon_tx_blogexample_domain_model_blog.gif";s:4:"50a3";s:67:"Resources/Public/Icons/icon_tx_blogexample_domain_model_comment.gif";s:4:"50a3";s:66:"Resources/Public/Icons/icon_tx_blogexample_domain_model_person.gif";s:4:"50a3";s:64:"Resources/Public/Icons/icon_tx_blogexample_domain_model_post.gif";s:4:"50a3";s:63:"Resources/Public/Icons/icon_tx_blogexample_domain_model_tag.gif";s:4:"50a3";}',
	'suggests' => array(
	),
);

?>
