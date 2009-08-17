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
 * The OldStyle backend module controller for the MVC_ExtJS_Samples package.
 *
 * @category    Controller
 * @package     TYPO3
 * @subpackage  tx_mvcextjssamples
 * @author      Steffen Kamper <info@sk-typo3.de>
 * @license     http://www.gnu.org/copyleft/gpl.html
 * @version     SVN: $Id: BlankModuleController.php 22770 2009-07-25 15:32:38Z xperseguers $
 */
class Tx_BlogExample_Controller_BlogModuleController extends Tx_Extbase_MVC_Controller_ActionController {
	
	/**
	 * Fills array for the funcMenu
	 * 
	 * @var array
	 */
	protected $modMenu;
	
	/**
	 * Index action for this controller.
	 *
	 * @return string The rendered view
	 */
	public function indexAction() {
	   
	   	                    
								   
		$this->menuConfig();
		
			// Template page
		$this->view->assign('title', 'BlogModule');  
			// used for function menu
		$this->view->assign('modMenu', $this->modMenu['function']);  
		$this->view->assign('modMenuKey', 'function');  
		$this->view->assign('submodMenu', $this->modMenu['subfunction']);
		$this->view->assign('submodMenuKey', 'subfunction');
			// save SET for shortcut  
		$this->view->assign('setKeys', implode(',', array_keys($this->modMenu)));  
		
                            
	}
		
	/**
	 * Adds items to the ->MOD_MENU array. Used for the function menu selector.
	 *
	 * @return	void
	 */
	protected function menuConfig()	{
		$this->modMenu['function'] = array (
			'1' => 'Menu 1',
			'2' => 'Menu 2',
			'3' => 'Menu 3',
		);
		$this->modMenu['subfunction'] = array (
			'1' => 'SubMenu 1',
			'2' => 'SubMenu 2',
			'3' => 'SubMenu 3',
		);
		
	}
	
}
?>