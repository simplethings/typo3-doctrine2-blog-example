<?php

/***************************************************************
*  Copyright notice
*
*  (c) 2009 Jochen Rau <jochen.rau@typoplanet.de>
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
 * A repository for Blogs
 */
class Tx_BlogExample_Domain_Repository_BlogRepository extends Tx_Extbase_Persistence_Repository {

	public function findAll() {
		$query = $this->createQuery();
		// $query->setOrderings(array('posts.date' => Tx_Extbase_Persistence_QueryInterface::ORDER_DESCENDING));
		// This would work if Extbase translates it to
		// SELECT tx_blogexample_domain_model_blog.*,MAX(tx_blogexample_domain_model_post.date) tx_extbase_sorting FROM tx_blogexample_domain_model_blog INNER JOIN tx_blogexample_domain_model_post ON tx_blogexample_domain_model_blog.uid=tx_blogexample_domain_model_post.blog GROUP BY tx_blogexample_domain_model_blog.uid ORDER BY tx_extbase_sorting DESC
		// bzw. für ASC
		// SELECT tx_blogexample_domain_model_blog.*,MIN(tx_blogexample_domain_model_post.date) tx_extbase_sorting FROM tx_blogexample_domain_model_blog INNER JOIN tx_blogexample_domain_model_post ON tx_blogexample_domain_model_blog.uid=tx_blogexample_domain_model_post.blog GROUP BY tx_blogexample_domain_model_blog.uid ORDER BY tx_extbase_sorting ASC
		return $query->execute();
	}

}
?>