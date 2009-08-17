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
 * View helper which returns csh button with icon
 *
 * = Examples =
 *
 * <f:Be.startPage title="{anyString}" />
 *
 *
 * @package     TYPO3
 * @subpackage  tx_blogexample
 * @author Steffen Kamper <info@sk-typo3.de>
 * @license     http://www.gnu.org/copyleft/gpl.html
 * @version     SVN: $Id: 
 * 
 */
class Tx_BlogExample_ViewHelpers_Be_Buttons_CshViewHelper extends Tx_BlogExample_ViewHelpers_AbstractBackendViewHelper {

	
	/**
	 * Render javascript in header
	 *
	 * @param string   $table
	 * @param string   $field
	 * @param boolean  $iconOnly
	 * @param string   $styleAttributes
	 * @return string 
	 */
	public function render($table = '', $field = '', $iconOnly = false, $styleAttributes = '') {
		
		return t3lib_BEfunc::cshItem($table, $field, $GLOBALS['BACK_PATH'], '', $iconOnly, $styleAttributes); 
	}
}
?>