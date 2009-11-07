<?php

########################################################################
# Extension Manager/Repository config file for ext "blog_example".
#
# Auto generated 02-10-2009 09:07
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'A Blog Example for the Extbase Framework',
	'description' => 'An example extension demonstrating the features of the Extbase Framework. It is the back-ported and tweaked Blog Example package of FLOW3. Have fun playing with it!',
	'category' => 'example',
	'author' => '',
	'author_company' => 'TYPO3 core team',
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
	'version' => '0.9.7',
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
	'_md5_values_when_last_written' => 'a:54:{s:16:"ext_autoload.php";s:4:"171a";s:12:"ext_icon.gif";s:4:"e922";s:17:"ext_localconf.php";s:4:"d567";s:14:"ext_tables.php";s:4:"01ca";s:14:"ext_tables.sql";s:4:"cb1f";s:37:"Classes/Controller/BlogController.php";s:4:"c167";s:40:"Classes/Controller/CommentController.php";s:4:"9a70";s:37:"Classes/Controller/PostController.php";s:4:"70b3";s:38:"Classes/Domain/Model/Administrator.php";s:4:"99d6";s:29:"Classes/Domain/Model/Blog.php";s:4:"2f6a";s:32:"Classes/Domain/Model/Comment.php";s:4:"2b6b";s:31:"Classes/Domain/Model/Person.php";s:4:"f294";s:29:"Classes/Domain/Model/Post.php";s:4:"ecf3";s:28:"Classes/Domain/Model/Tag.php";s:4:"c29d";s:53:"Classes/Domain/Repository/AdministratorRepository.php";s:4:"e274";s:44:"Classes/Domain/Repository/BlogRepository.php";s:4:"6ba0";s:46:"Classes/Domain/Repository/PersonRepository.php";s:4:"a93d";s:44:"Classes/Domain/Repository/PostRepository.php";s:4:"3575";s:42:"Classes/Domain/Validator/BlogValidator.php";s:4:"5baf";s:42:"Classes/ViewHelpers/GravatarViewHelper.php";s:4:"d27d";s:41:"Configuration/FlexForms/flexform_list.xml";s:4:"a83e";s:25:"Configuration/TCA/tca.php";s:4:"b849";s:38:"Configuration/TypoScript/constants.txt";s:4:"b865";s:34:"Configuration/TypoScript/setup.txt";s:4:"e01e";s:46:"Resources/Private/Backend/Layouts/default.html";s:4:"652d";s:50:"Resources/Private/Backend/Templates/Blog/edit.html";s:4:"094c";s:51:"Resources/Private/Backend/Templates/Blog/index.html";s:4:"e0a5";s:49:"Resources/Private/Backend/Templates/Blog/new.html";s:4:"6fcb";s:50:"Resources/Private/Backend/Templates/Post/edit.html";s:4:"a394";s:51:"Resources/Private/Backend/Templates/Post/index.html";s:4:"d9a3";s:50:"Resources/Private/Backend/Templates/Post/index.txt";s:4:"ac46";s:49:"Resources/Private/Backend/Templates/Post/new.html";s:4:"bef6";s:50:"Resources/Private/Backend/Templates/Post/show.html";s:4:"4d81";s:40:"Resources/Private/Language/locallang.xml";s:4:"df49";s:44:"Resources/Private/Language/locallang_csh.xml";s:4:"5e95";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"c008";s:44:"Resources/Private/Language/locallang_mod.xml";s:4:"cd5d";s:38:"Resources/Private/Layouts/default.html";s:4:"b132";s:42:"Resources/Private/Partials/formErrors.html";s:4:"cc71";s:44:"Resources/Private/Partials/postMetaData.html";s:4:"c219";s:40:"Resources/Private/Partials/postTags.html";s:4:"bb9a";s:42:"Resources/Private/Templates/Blog/edit.html";s:4:"7fec";s:43:"Resources/Private/Templates/Blog/index.html";s:4:"5384";s:41:"Resources/Private/Templates/Blog/new.html";s:4:"ea35";s:42:"Resources/Private/Templates/Post/edit.html";s:4:"878b";s:43:"Resources/Private/Templates/Post/index.html";s:4:"ea17";s:42:"Resources/Private/Templates/Post/index.txt";s:4:"8bec";s:41:"Resources/Private/Templates/Post/new.html";s:4:"2d4a";s:42:"Resources/Private/Templates/Post/show.html";s:4:"36f1";s:64:"Resources/Public/Icons/icon_tx_blogexample_domain_model_blog.gif";s:4:"50a3";s:67:"Resources/Public/Icons/icon_tx_blogexample_domain_model_comment.gif";s:4:"50a3";s:66:"Resources/Public/Icons/icon_tx_blogexample_domain_model_person.gif";s:4:"50a3";s:64:"Resources/Public/Icons/icon_tx_blogexample_domain_model_post.gif";s:4:"50a3";s:63:"Resources/Public/Icons/icon_tx_blogexample_domain_model_tag.gif";s:4:"50a3";}',
	'suggests' => array(
	),
);

?>