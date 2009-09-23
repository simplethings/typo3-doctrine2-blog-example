<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_blogexample_domain_model_blog'] = array(
	'ctrl' => $TCA['tx_blogexample_domain_model_blog']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, title, description, logo, posts, administrator'
	),
	'columns' => array(
		'sys_language_uid' => Array (
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
			'config' => Array (
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => Array(
					Array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
					Array('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
				)
			)
		),
		'l18n_parent' => Array (
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('', 0),
				),
				'foreign_table' => 'tt_news',
				'foreign_table_where' => 'AND tt_news.uid=###REC_FIELD_l18n_parent### AND tt_news.sys_language_uid IN (-1,0)',
			)
		),
		'l18n_diffsource' => Array(
			'config'=>array(
				'type'=>'passthrough')
		),
		't3ver_label' => Array (
			'displayCond' => 'FIELD:t3ver_label:REQ:true',
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.versionLabel',
			'config' => Array (
				'type'=>'none',
				'cols' => 27
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'title' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_blog.title',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim,required',
				'max'  => 256
			)
		),
		'description' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_blog.description',
			'config'  => array(
				'type' => 'text',
				'eval' => 'required',
				'rows' => 30,
				'cols' => 80,
			)
		),
		'logo' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_blog.logo',
			'config'  => array(
				'type'          => 'group',
				'internal_type' => 'file',
				'allowed'       => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size'      => 3000,
				'uploadfolder'  => 'uploads/pics',
				'show_thumbs'   => 1,
				'size'          => 1,
				'maxitems'      => 1,
				'minitems'      => 0
			)
		),
		'posts' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_blog.posts',
			'config' => array(
				'type' => 'inline',
				'loadingStrategy' => 'storage',
				'foreign_class' => 'Tx_BlogExample_Domain_Model_Post',
				'foreign_table' => 'tx_blogexample_domain_model_post',
				//				 TODO Re-enable the foreign key references by uncommenting the following lines
				//				'foreign_field' => 'blog',
				'maxitems'      => 999999, // TODO This is only necessary because of a bug in tcemain
				'appearance' => array(
					'newRecordLinkPosition' => 'bottom',
					'collapseAll' => 1,
					'expandSingle' => 1,
				),
			)
		),
		'administrator' => Array (		
			'exclude' => 1,		
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_blog.administrator',
			'config' => Array (
				'type' => 'select',
				'foreign_table' => 'fe_users',
				'foreign_class' => 'Tx_BlogExample_Domain_Model_Administrator',
//				'foreign_table_where' => 'AND fe_users.pid=###STORAGE_PID###',
				'maxitems' => 1,
			)
		),
	),
	'types' => array(
		'1' => array('showitem' => 'hidden, title, description, logo, posts, administrator')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

$TCA['tx_blogexample_domain_model_post'] = array(
	'ctrl' => $TCA['tx_blogexample_domain_model_post']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, title, date, author, content, tags, comments, related_posts'
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'title' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_post.title',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim, required',
				'max'  => 256
			)
		),
		'date' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_post.date',
			'config'  => array(
				'type'    => 'input',
				'size' => 12,
				'checkbox' => 1,
				'eval' => 'datetime, required',
				'default' => time()
			)
		),
		'author' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_post.author',
			'config' => array(
				'type' => 'select',
				'foreign_class' => 'Tx_BlogExample_Domain_Model_Person',
				'foreign_table' => 'tx_blogexample_domain_model_person',
				'maxitems' => 1,
			)
		),
		'content' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_post.content',
			'config'  => array(
				'type' => 'text',
				'rows' => 30,
				'cols' => 80
			)
		),
		'tags' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_post.tags',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 9999,
				'autoSizeMax' => 30,
				'multiple' => 1,
				'foreign_class' => 'Tx_BlogExample_Domain_Model_Tag',
				'foreign_table' => 'tx_blogexample_domain_model_tag',
				'MM' => 'tx_blogexample_post_tag_mm',
				'MM_insert_fields' => array('tablenames' => 'tx_blogexample_domain_model_tag'),
				'MM_match_fields' => array('tablenames' => 'tx_blogexample_domain_model_tag'),
			)
		),
		'comments' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_post.comments',
			'config' => array(
				'type' => 'inline',
				'loadingStrategy' => 'proxy',
				'foreign_class' => 'Tx_BlogExample_Domain_Model_Comment',
				'foreign_table' => 'tx_blogexample_domain_model_comment',
				'foreign_field' => 'post',
				'appearance' => array(
					'newRecordLinkPosition' => 'bottom',
					'collapseAll' => 1,
					'expandSingle' => 1,
				),
			)
		),
		'related_posts' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_post.related',
			'config' => array(
				'type' => 'select',
				'loadingStrategy' => 'storage',
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 9999,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_class' => 'Tx_BlogExample_Domain_Model_Post',
				'foreign_table' => 'tx_blogexample_domain_model_post',
				// 'foreign_table_where' => 'AND tx_blogexample_domain_model_post.blog_uid=###REC_FIELD_blog_uid### AND tx_blogexample_domain_model_post.uid!=###THIS_UID###',
				'MM' => 'tx_blogexample_post_post_mm',
				'MM_opposite_field' => 'related_posts',
				'MM_insert_fields' => array('tablenames' => 'tx_blogexample_domain_model_post'),
				'MM_match_fields' => array('tablenames' => 'tx_blogexample_domain_model_post'),
			)
		),
		'blog' => array(
// TODO Re-enable the foreign key references by uncommenting the following lines
//			'config' => array(
//				'type' => 'passthrough',
//			)
		),
	),
	'types' => array(
		'1' => array('showitem' => 'hidden, title, date, author, content, tags, comments, related_posts')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

$TCA['tx_blogexample_domain_model_comment'] = array(
	'ctrl' => $TCA['tx_blogexample_domain_model_comment']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, date, author, email, content'
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'date' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_comment.date',
			'config'  => array(
				'type'    => 'input',
				'size' => 12,
				'checkbox' => 1,
				'eval' => 'datetime, required',
				'default' => time()
			)
		),
		'author' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_comment.author',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim, required',
				'max'  => 256
			)
		),
		'email' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_comment.email',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim, required',
				'max'  => 256
			)
		),
		'content' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_comment.content',
			'config'  => array(
				'type' => 'text',
				'rows' => 30,
				'cols' => 80
			)
		),
		'post' => array(		
			'config' => array(
				'type' => 'passthrough',	
			)
		),
	),
	'types' => array(
		'1' => array('showitem' => 'hidden, date, author, email, content')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

$TCA['tx_blogexample_domain_model_person'] = array(
	'ctrl' => $TCA['tx_blogexample_domain_model_person']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'firstname, lastname, email, avatar'
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'firstname' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_person.firstname',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim,required',
				'max'  => 256
			)
		),
		'lastname' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_person.lastname',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim,required',
				'max'  => 256
			)
		),
		'email' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_person.email',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim, required',
				'max'  => 256
			)
		),
		'avatar' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_person.avatar',
			'config'  => array(
				'type'          => 'group',
				'internal_type' => 'file',
				'allowed'       => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'max_size'      => 3000,
				'uploadfolder'  => 'uploads/pics',
				'show_thumbs'   => 1,
				'size'          => 1,
				'maxitems'      => 1,
				'minitems'      => 0
			)
		),
	),
	'types' => array(
		'1' => array('showitem' => 'firstname, lastname, email, avatar')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

$TCA['tx_blogexample_domain_model_tag'] = array(
	'ctrl' => $TCA['tx_blogexample_domain_model_tag']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, name, posts'
	),
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array(
				'type' => 'check'
			)
		),
		'name' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_tag.name',
			'config'  => array(
				'type' => 'input',
				'size' => 20,
				'eval' => 'trim, required',
				'max'  => 256
			)
		),
		'posts' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_tag.posts',
			'config' => array(
				'type' => 'select',
				'size' => 10,
				'minitems' => 0,
				'maxitems' => 9999,
				'autoSizeMax' => 30,
				'multiple' => 0,
				'foreign_class' => 'Tx_BlogExample_Domain_Model_Post',
				'foreign_table' => 'tx_blogexample_domain_model_post',
				'MM' => 'tx_blogexample_post_tag_mm',
				'MM_opposite_field' => 'tags',
				'MM_insert_fields' => array('tablenames' => 'tx_blogexample_domain_model_tag'),
				'MM_match_fields' => array('tablenames' => 'tx_blogexample_domain_model_tag'),
			)
		),
	),
	'types' => array(
		'1' => array('showitem' => 'hidden, name, posts')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);
?>