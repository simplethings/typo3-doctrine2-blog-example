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
 * A repository for Posts
 */
class Tx_BlogExample_Domain_Repository_PostRepository extends Tx_Extbase_Persistence_Repository {
	
	/**
	 * Finds posts by the specified blog
	 *
	 * @param Tx_BlogExample_Domain_Model_Blog $blog The blog the post must refer to
	 * @param integer $limit The number of posts to return at max
	 * @return array The posts
	 */
	public function findByBlog(Tx_BlogExample_Domain_Model_Blog $blog, $limit = 20) {
		$query = $this->createQuery();
		return $query->matching($query->equals('blog', $blog))
			->setOrderings(array('date' => Tx_Extbase_Persistence_QueryInterface::ORDER_DESCENDING))
			->setLimit($limit)
			->execute();
	}

	/**
	 * Finds the previous of the given post
	 *
	 * @param Tx_BlogExample_Domain_Model_Post $post The reference post
	 * @return Tx_BlogExample_Domain_Model_Post
	 */
	public function findPrevious(Tx_BlogExample_Domain_Model_Post $post) {
		$query = $this->createQuery();
		$posts = $query->matching($query->lessThan('date', $post->getDate()))
			->setOrderings(array('date' => Tx_Extbase_Persistence_QueryInterface::ORDER_DESCENDING))
			->setLimit(1)
			->execute();
		return (count($posts) == 0) ? NULL : current($posts);
	}

	/**
	 * Finds the post next to the given post
	 *
	 * @param Tx_BlogExample_Domain_Model_Post $post The reference post
	 * @return Tx_BlogExample_Domain_Model_Post
	 */
	public function findNext(Tx_BlogExample_Domain_Model_Post $post) {
		$query = $this->createQuery();
		$posts = $query->matching($query->greaterThan('date', $post->getDate()))
			->setOrderings(array('date' =>  Tx_Extbase_Persistence_QueryInterface::ORDER_DESCENDING))
			->setLimit(1)
			->execute();
		return (count($posts) == 0) ? NULL : current($posts);
	}

	/**
	 * Finds most recent posts by the specified blog
	 *
	 * @param Tx_BlogExample_Domain_Model_Blog $blog The blog the post must refer to
	 * @param integer $limit The number of posts to return at max
	 * @return array The posts
	 */
	public function findRecentByBlog(Tx_BlogExample_Domain_Model_Blog $blog, $limit = 5) {
		$query = $this->createQuery();
		return $query->matching($query->equals('blog', $blog))
			->setOrderings(array('date' => Tx_Extbase_Persistence_QueryInterface::ORDER_DESCENDING))
			->setLimit($limit)
			->execute();
	}
}
?>