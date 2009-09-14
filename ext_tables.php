<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

/**
 * Registers a Plugin to be listed in the Backend. You also have to configure the Dispatcher in ext_localconf.php.
 */
Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY, // The extension name (in UpperCamelCase) or the extension key (in lower_underscore)
	'Pi1', // A unique name of the plugin in UpperCamelCase
	'A Blog Example' // A title shown in the backend dropdown field
);

/**
* Registers a Backend Module
*/
Tx_Extbase_Utility_Extension::registerModule(
	$_EXTKEY,
	'web',	// Make module a submodule of 'web'
	'admin_module', // Submodule key
	'', // Position
	array(
		'AdminModule' => 'index'
	),
	array(
		'access' => 'user,group',
		'icon'   => 'EXT:blog_example/ext_icon.gif',
		'labels' => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_mod.xml',
	)
);


t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Blog Example');

$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY . '_pi1'] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($_EXTKEY . '_pi1', 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/flexform_list.xml');

t3lib_extMgm::allowTableOnStandardPages('tx_blogexample_domain_model_blog');
$TCA['tx_blogexample_domain_model_blog'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_blog',
		'label' 			=> 'title',
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> true,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',	
		'transOrigPointerField' 	=> 'l18n_parent',	
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',	
		// 'prependAtCopy' 	=> 'LLL:EXT:lang/locallang_general.xml:LGL.prependAtCopy',
		// 'copyAfterDuplFields' 		=> 'sys_language_uid',
		// 'useColumnsForDefaultValues' => 'sys_language_uid',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_blogexample_domain_model_blog.gif'
	)
);

t3lib_extMgm::allowTableOnStandardPages('tx_blogexample_domain_model_post');
$TCA['tx_blogexample_domain_model_post'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_post',
		'label'				=> 'title',
		'label_alt'			=> 'author',
		'label_alt_force'	=> TRUE,
		'tstamp'            => 'tstamp',
		'crdate'            => 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> true,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',	
		'transOrigPointerField' 	=> 'l18n_parent',	
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',	
		'prependAtCopy' 	=> 'LLL:EXT:lang/locallang_general.xml:LGL.prependAtCopy',
		'copyAfterDuplFields' 		=> 'sys_language_uid',
		'useColumnsForDefaultValues' => 'sys_language_uid',
		'delete'            => 'deleted',
		'enablecolumns'     => array(
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_blogexample_domain_model_post.gif'
	)
);

t3lib_extMgm::allowTableOnStandardPages('tx_blogexample_domain_model_comment');
$TCA['tx_blogexample_domain_model_comment'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_comment',
		'label'				=> 'date',
		'label_alt'			=> 'author',
		'label_alt_force'	=> TRUE,
		'tstamp'            => 'tstamp',
		'crdate'            => 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> true,
		'origUid' 			=> 't3_origuid',
		'languageField' 	=> 'sys_language_uid',	
		'transOrigPointerField' 	=> 'l18n_parent',	
		'transOrigDiffSourceField' 	=> 'l18n_diffsource',	
		'prependAtCopy' 	=> 'LLL:EXT:lang/locallang_general.xml:LGL.prependAtCopy',
		'copyAfterDuplFields' 		=> 'sys_language_uid',
		'useColumnsForDefaultValues' => 'sys_language_uid',
		'delete'            => 'deleted',
		'enablecolumns'     => array (
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_blogexample_domain_model_comment.gif'
	)
);

t3lib_extMgm::allowTableOnStandardPages('tx_blogexample_domain_model_person');
$TCA['tx_blogexample_domain_model_person'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_person',
		'label' 			=> 'lastname',
		'label_alt'			=> 'firstname',
		'label_alt_force'	=> TRUE,
		'tstamp' 			=> 'tstamp',
		'crdate' 			=> 'crdate',
		'versioningWS' 		=> 2,
		'versioning_followPages'	=> true,
		'origUid' 			=> 't3_origuid',
		'prependAtCopy' 	=> 'LLL:EXT:lang/locallang_general.xml:LGL.prependAtCopy',
		'delete' 			=> 'deleted',
		'enablecolumns' 	=> array(
			'disabled' => 'hidden'
			),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile' 			=> t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_blogexample_domain_model_person.gif'
	)
);

t3lib_extMgm::allowTableOnStandardPages('tx_blogexample_domain_model_tag');
$TCA['tx_blogexample_domain_model_tag'] = array (
	'ctrl' => array (
		'title'             => 'LLL:EXT:blog_example/Resources/Private/Language/locallang_db.xml:tx_blogexample_domain_model_tag',
		'label'				=> 'name',
		'tstamp'            => 'tstamp',
		'crdate'            => 'crdate',
		'delete'            => 'deleted',
		'enablecolumns'     => array (
			'disabled' => 'hidden'
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/icon_tx_blogexample_domain_model_tag.gif'
	)
);

?>
