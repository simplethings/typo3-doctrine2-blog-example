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
 * View helper which return start page
 *
 * = Examples =
 *
 * <f:Be.startPage title="{anyString}" />
 *
 *
 * @package     TYPO3
 * @subpackage  tx_blogexample
 * @author      Steffen Kamper <info@sk-typo3.de>
 * @license     http://www.gnu.org/copyleft/gpl.html
 * @version     SVN: $Id: 
 * 
 */
class Tx_BlogExample_ViewHelpers_Be_StartPageViewHelper extends Tx_BlogExample_ViewHelpers_AbstractBackendViewHelper {
	
	/**
	 * Render start page with template.php and pageTitle
	 *
	 * @param string  $pageTitle
	 * @param boolean $jumpToUrl           used by function menu
	 * @param boolean $prototype           loads prototype library
	 * @param boolean $scriptaculous       loads scriptaculous library
	 * @param string  $scriptaculousModule additionales modules for scriptaculous
	 * @param boolean $extJs         	   loads ExtJS Library
	 * @param boolean $extJsTheme          use ExtJS Theme
	 * @param string  $extJsAdapter        load alternative adapter (ext-base is default adapter)
	 * @param boolean $extJsDebug          enables ExtJS Debug
	 * @return string 
	 */
	public function render( $pageTitle = '', $jumpToUrl = false, 
							$prototype = true,
							$scriptaculous = false, $scriptaculousModule = '',
							$extJs = false, $extJsTheme = true, $extJsAdapter = '', $extJsDebug = false) {
		
		$doc = $this->getDocInstance();
		
		if ($jumpToUrl) {
			$doc->JScode = '
				<script language="javascript" type="text/javascript">
					script_ended = 0;
					function jumpToUrl(URL)	{
						document.location = URL;
					}
				</script>
			';
		}
		
		if ($prototype) {
			$doc->loadPrototype();
		}
		
		if ($scriptaculous) {
			$doc->loadScriptaculous($scriptaculousModule);
		}
		
		if ($extJs) {
			$doc->loadExtJS(true, $extJsTheme, $extJsAdapter);
		}
		
		if ($extJsTheme === true && $extJsDebug === true) {
			$doc->enableExtJsDebug();
		}
		
		
		return $doc->startPage($pageTitle); 
	}
}
?>