<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 Steffen Kamper <info@sk-typo3.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */




/**
 * Module 'Blogs' for the 'blogexample' extension.
 *
 * @author    Steffen Kamper <info@sk-typo3.de>
 * @package    TYPO3
 * @subpackage    tx_blogexample
 */
class  Tx_Blog_Controller_ModuleController extends t3lib_SCbase {
                var $pageinfo;

                /**
                 * Initializes the Module
                 * @return    void
                 */
                public function __construct()    {
                    global $BE_USER,$LANG,$BACK_PATH,$TCA_DESCR,$TCA,$CLIENT,$TYPO3_CONF_VARS;
                    parent::init();
                }

                /**
                 * Adds items to the ->MOD_MENU array. Used for the function menu selector.
                 *
                 * @return    void
                 */
                public function menuConfig()    {
                    global $LANG;
                    $this->MOD_MENU = Array (
                        'function' => Array (
                            '1' => $LANG->getLL('function1'),
                            '2' => $LANG->getLL('function2'),
                            '3' => $LANG->getLL('function3'),
                        )
                    );
                    parent::menuConfig();
                }

                /**
                 * Main function of the module. Write the content to $this->content
                 * If you chose "web" as main module, you will need to consider the $this->id parameter which will contain the uid-number of the page clicked in the page tree
                 *
                 * @return    [type]        ...
                 */
                public function main()    {
                    global $BE_USER,$LANG,$BACK_PATH,$TCA_DESCR,$TCA,$CLIENT,$TYPO3_CONF_VARS;
                   
                    // Access check!
                    // The page will show only if there is a valid page and if this page may be viewed by the user
                    $this->pageinfo = t3lib_BEfunc::readPageAccess($this->id,$this->perms_clause);
                    $access = is_array($this->pageinfo) ? 1 : 0;
                
                        // initialize doc
                    $this->doc = t3lib_div::makeInstance('template');
                    $this->doc->setModuleTemplate(t3lib_extMgm::extPath('blogexample') . 'Resources//Private/Templates/Module/BlogModule.html');
                    $this->doc->backPath = $BACK_PATH;
                    $docHeaderButtons = $this->getButtons();

                    if (($this->id && $access) || ($BE_USER->user['admin'] && !$this->id))    {
 
                            // Draw the form
                        $this->doc->form = '<form action="" method="post" enctype="multipart/form-data">';

                            // JavaScript
                        $this->doc->JScode = '
                            <script language="javascript" type="text/javascript">
                                script_ended = 0;
                                function jumpToUrl(URL)    {
                                    document.location = URL;
                                }
                            </script>
                        ';
                        $this->doc->postCode='
                            <script language="javascript" type="text/javascript">
                                script_ended = 1;
                                if (top.fsMod) top.fsMod.recentIds["web"] = 0;
                            </script>
                        ';
                            // Render content:
                        $this->moduleContent();
                    } else {
                            // If no access or if ID == zero
                        $docHeaderButtons['save'] = '';
                        $this->content.=$this->doc->spacer(10);
                    }

                        // compile document
                    $markers['FUNC_MENU'] = t3lib_BEfunc::getFuncMenu(0, 'SET[function]', $this->MOD_SETTINGS['function'], $this->MOD_MENU['function']);
                    $markers['CONTENT'] = $this->content;

                            // Build the <body> for the module
                    $this->content = $this->doc->startPage($LANG->getLL('title'));
                    $this->content.= $this->doc->moduleBody($this->pageinfo, $docHeaderButtons, $markers);
                    $this->content.= $this->doc->endPage();
                    $this->content = $this->doc->insertStylesAndJS($this->content);
                
                	$this->printContent();
                }

                /**
                 * Prints out the module HTML
                 *
                 * @return    void
                 */
                protected function printContent()    {

                    $this->content.=$this->doc->endPage();
                    echo $this->content;
                }

                /**
                 * Generates the module content
                 *
                 * @return    void
                 */
                protected function moduleContent() {
                    switch((string)$this->MOD_SETTINGS['function'])    {
                        case 1:
                            $content='<div align="center"><strong>Hello World!</strong></div><br />
                                The "Kickstarter" has made this module automatically, it contains a default framework for a backend module but apart from that it does nothing useful until you open the script '.substr(t3lib_extMgm::extPath('blogexample'),strlen(PATH_site)).'mod1/index.php and edit it!
                                <hr />
                                <br />This is the GET/POST vars sent to the script:<br />'.
                                'GET:'.t3lib_div::view_array($_GET).'<br />'.
                                'POST:'.t3lib_div::view_array($_POST).'<br />'.
                                '';
                            $this->content.=$this->doc->section('Message #1:',$content,0,1);
                        break;
                        case 2:
                            $content='<div align=center><strong>Menu item #2...</strong></div>';
                            $this->content.=$this->doc->section('Message #2:',$content,0,1);
                        break;
                        case 3:
                            $content='<div align=center><strong>Menu item #3...</strong></div>';
                            $this->content.=$this->doc->section('Message #3:',$content,0,1);
                        break;
                    }
                }
                

                /**
                 * Create the panel of buttons for submitting the form or otherwise perform operations.
                 *
                 * @return    array    all available buttons as an assoc. array
                 */
                protected function getButtons()    {

                    $buttons = array(
                        'csh' => '',
                        'shortcut' => '',
                        'save' => ''
                    );
                        // CSH
                    $buttons['csh'] = t3lib_BEfunc::cshItem('_MOD_web_func', '', $GLOBALS['BACK_PATH']);

                        // SAVE button
                    $buttons['save'] = '<input type="image" class="c-inputButton" name="submit" value="Update"' . t3lib_iconWorks::skinImg($GLOBALS['BACK_PATH'], 'gfx/savedok.gif', '') . ' title="' . $GLOBALS['LANG']->sL('LLL:EXT:lang/locallang_core.php:rm.saveDoc', 1) . '" />';


                        // Shortcut
                    if ($GLOBALS['BE_USER']->mayMakeShortcut())    {
                        $buttons['shortcut'] = $this->doc->makeShortcutIcon('', 'function', $this->MCONF['name']);
                    }

                    return $buttons;
                }
                
        }



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/blogexample/Classes/Controller/ModuleController.php'])    {
    include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/blogexample/Classes/Controller/ModuleController.php']);
}


?> 