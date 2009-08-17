<?php
/*                                                                        *
 * This script belongs to the FLOW3 package "Fluid".                      *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License as published by the *
 * Free Software Foundation, either version 3 of the License, or (at your *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
 * General Public License for more details.                               *
 *                                                                        *
 * You should have received a copy of the GNU Lesser General Public       *
 * License along with the script.                                         *
 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * The abstract base class for all backend view helpers.
 *
 * @version $Id:
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 * @scope prototype
 *
 * @package     TYPO3
 * @subpackage  tx_blogexample
 * @author      Steffen Kamper <info@sk-typo3.de>
 * @license     http://www.gnu.org/copyleft/gpl.html
 * @version     SVN: $Id: 
 * 
 */    
abstract class Tx_BlogExample_ViewHelpers_AbstractBackendViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {



	/**
	* Ges instance of template if exists or create a new one.
	* Saves instance in viewHelperVariableContainer
	* 
	* @return template $doc 
	*/
	public function getDocInstance() {
		if (!$this->viewHelperVariableContainer->exists('Tx_Fluid_ViewHelpers_Backend', 'doc')) {
			$doc = t3lib_div::makeInstance('template');
			$doc->backPath = $GLOBALS['BACK_PATH'];  
			$this->viewHelperVariableContainer->add('Tx_Fluid_ViewHelpers_Backend', 'doc', $doc);	
		} else {
			$doc = $this->viewHelperVariableContainer->get('Tx_Fluid_ViewHelpers_Backend', 'doc');	
		}
		
		return $doc;
	}
	
	/**
	* Ges instance of scBase if exists or create a new one.
	* Saves instance in viewHelperVariableContainer
	* 
	* @return t3lib_SCbase $scBase
	*/
	public function getScBaseInstance() {
		if (!$this->viewHelperVariableContainer->exists('Tx_Fluid_ViewHelpers_Backend', 'scBase')) {
			$scBase = t3lib_div::makeInstance('t3lib_SCbase');
			$scBase->MCONF['name'] = $this->controllerContext->getRequest()->getControllerName();
			$scBase->init();  
			$this->viewHelperVariableContainer->add('Tx_Fluid_ViewHelpers_Backend', 'scBase', $scBase);	
		} else {
			$scBase = $this->viewHelperVariableContainer->get('Tx_Fluid_ViewHelpers_Backend', 'scBase');	
		}
		
		return $scBase;
	}


}
?>