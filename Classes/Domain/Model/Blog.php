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
 * A blog
 *
 * @version $Id:$
 * @copyright Copyright belongs to the respective authors
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 * @scope prototype
 * @entity
 */
class Tx_BlogExample_Domain_Model_Blog extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * The blog's name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * A short description of the blog
	 *
	 * @var string
	 */
	protected $description = '';

	/**
	 * The blog's logo
	 *
	 * @var string
	 */
	protected $logo = '';

	/**
	 * The posts contained in this blog
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage
	 */
	protected $posts;

	/**
	 * Constructs a new Blog
	 *
	 */
	public function __construct() {
		$this->posts = new Tx_Extbase_Persistence_ObjectStorage();
	}
	
	/**
	 * Sets this blog's name
	 *
	 * @param string $name The blog's name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the blog's name
	 *
	 * @return string The blog's name
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * Sets the description for the blog
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the description
	 *
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Adds a post to this blog
	 *
	 * @param Tx_BlogExample_Domain_Model_Post $post
	 * @return void
	 */
	public function addPost(Tx_BlogExample_Domain_Model_Post $post) {
		$this->posts->attach($post);
	}

	/**
	 * Remove a post from this blog
	 *
	 * @param Tx_BlogExample_Domain_Model_Post $postToRemove The post to be removed
	 * @return void
	 */
	public function removePost(Tx_BlogExample_Domain_Model_Post $postToRemove) {
		$this->posts->detach($postToRemove);
	}
	
	/**
	 * Remove all posts from this blog
	 *
	 * @return void
	 */
	public function removeAllPosts() {
		$this->posts = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Returns all posts in this blog
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage
	 */
	public function getPosts() {
		if ($this->posts instanceof Tx_Extbase_Persistence_LazyLoadingProxy) {
			$this->posts->_loadRealInstance();
		}
		return clone $this->posts;
	}

}
?>