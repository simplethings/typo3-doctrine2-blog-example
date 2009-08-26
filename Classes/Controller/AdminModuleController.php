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
 * The Administrative backend module controller for the Blog Example.
 *
 * @author      Steffen Kamper <info@sk-typo3.de>
 * @license     http://www.gnu.org/copyleft/gpl.html
 * @version     SVN: $Id: BlankModuleController.php 22770 2009-07-25 15:32:38Z xperseguers $
 */
class Tx_BlogExample_Controller_AdminModuleController extends Tx_Extbase_MVC_Controller_ActionController {
	
	/**
	 * @var Tx_BlogExample_Domain_Model_BlogRepository
	 */
	protected $blogRepository;

	/**
	 * Initializes the current action
	 *
	 * @return void
	 */
	public function initializeAction() {
		$this->blogRepository = t3lib_div::makeInstance('Tx_BlogExample_Domain_Repository_BlogRepository');
	}

	/**
	 * Index action for this controller.
	 *
	 * @return string The rendered view
	 */
	public function indexAction() {		
		$this->view->assign('title', 'Manage your Blogs');
		// TODO Switch action vie the action menu
		$this->view->assign('actionMenu', array (
			'index' => 'List all Blogs',
			'single' => 'Manage Posts',
			'statistics' => 'Show the statistics',
			));  
		$this->view->assign('optionsMenu', array (
			'blue' => 'I like blue!',
			'red' => 'I like red!',
			));
		$currentOption = filter_var($_GET['SET']['option']);
		if ($currentOption !== 'red' && $currentOption !== 'blue') $currentOption = NULL;
		$this->view->assign('currentOption', $currentOption);
//		$this->view->assign('blogs', $this->blogRepository->findAll()); // FIXME This does not work, because we have no configuration by now
	}
	
}
?>