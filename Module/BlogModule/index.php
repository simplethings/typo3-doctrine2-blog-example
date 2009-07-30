<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 Fabien Udriot <fabien.udriot@ecodev.ch>
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
 * Default index for the BE module
 *
 * @author	Steffen Kamper <info@sk-typo3.de>
 * @package	TYPO3
 * @subpackage	tx_addresses
 * @copyright Copyright belongs to the respective authors
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 */

// temporary index.php to get it started now
include_once(t3lib_extMgm::extPath('blog_example', 'Classes/Controller/ModuleController.php'));

$LANG->includeLLFile('EXT:blog_example/Resources/Private/Language/locallang.xml');
$BE_USER->modAccess($MCONF,1);    // This checks permissions and exits if the users has no permission for entry.

$SOBE = t3lib_div::makeInstance('Tx_Blog_Controller_ModuleController');

// Include files?
foreach($SOBE->include_once as $INC_FILE)    include_once($INC_FILE);
$SOBE->main();

   
?>
