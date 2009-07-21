<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_blogexample_domain_model_blog'] = array(
	'ctrl' => $TCA['tx_blogexample_domain_model_blog']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, name, description, logo, posts, administrator'
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
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_blog.name',
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
				'loadingStrategy' => 'proxy',
				'foreign_class' => 'Tx_BlogExample_Domain_Model_Post',
				'foreign_table' => 'tx_blogexample_domain_model_post',
				'foreign_field' => 'blog_uid',
				'foreign_table_field' => 'blog_table',
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
				'maxitems' => 1,
			)
		),
	),
	'types' => array(
		'1' => array('showitem' => 'hidden, name, description, logo, posts, administrator')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);

$TCA['tx_blogexample_domain_model_post'] = array(
	'ctrl' => $TCA['tx_blogexample_domain_model_post']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, title, date, author, content, votes, published, tags, comments'
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
		'votes' => array(
			'label'  => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_post.votes',
			'config' => array(
				'type' => 'input',
				'eval' => 'trim, double2',
				'size' => '4',
				'max'  => '6'
			)
		),
		'published' => array(
			'exclude' => 0,
			'label'   => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_post.published',
			'config'  => array(
				'type' => 'check'
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
				'MM' => 'tx_blogexample_post_tag_mm'
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
				'foreign_field' => 'post_uid',
				'foreign_table_field' => 'post_table',
				'appearance' => array(
					'newRecordLinkPosition' => 'bottom',
					'collapseAll' => 1,
					'expandSingle' => 1,
				),
			)
		),
		'blog_uid' => array(		
			'config' => array(
				'type' => 'passthrough',	
			)
		),
		'blog_table' => array(		
			'config' => array(
				'type' => 'passthrough',	
			)
		),
	),
	'types' => array(
		'1' => array('showitem' => 'hidden, title, date, author, content, votes, published, tags, comments')
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
		'post_uid' => array(		
			'config' => array(
				'type' => 'passthrough',	
			)
		),
		'post_table' => array(		
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
		'showRecordFieldList' => 'hidden, name'
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
	),
	'types' => array(
		'1' => array('showitem' => 'hidden, name')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);
?>