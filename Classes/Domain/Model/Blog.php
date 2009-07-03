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
	protected $logo;

	/**
	 * The posts contained in this blog
	 *
	 * @var array
	 */
	protected $posts = array();

	/**
	 * Constructs this blog
	 *
	 * @return
	 */
	public function __construct() {
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
		// $post->setBlogUid($this->getUid());
		$this->posts[] = $post;
	}

	/**
	 * Remove a post from this blog
	 *
	 * @param Tx_BlogExample_Domain_Model_Post $postToRemove The post to be removed
	 * @return void
	 */
	public function removePost(Tx_BlogExample_Domain_Model_Post $postToRemove) {
		foreach ($this->posts as $key => $post) {
			if ($post === $postToRemove) {
				unset($this->posts[$key]);
				reset($this->posts);
				return;
			}
		}
	}
	
	/**
	 * Remove all posts from this blog
	 *
	 * @return void
	 */
	public function removeAllPosts() {
		$this->posts = array();
	}

	/**
	 * Returns all posts in this blog
	 *
	 * @return array of Tx_BlogExample_Domain_Model_Post
	 */
	public function getPosts() {
		return $this->posts;
	}

	/**
	 * Returns the latest $count posts from the blog
	 *
	 * @param integer $count
	 * @return array of Tx_BlogExample_Domain_Model_Post
	 */
	public function getLatestPosts($count = 5) {
		$posts = $this->posts->toArray();
		return array_slice($posts, -$count, $count, TRUE);
	}

	/**
	 * Returns single post by its identifyer
	 *
	 * @param string $uid the post uid
	 * @return Tx_BlogExample_Domain_Model_Post post or NULL if not found
	 */
	public function findPostByUid($uid) {
		if (array_key_exists($uid, $this->posts)) {
			return $this->posts[$uid];
		} else {
			return NULL;
		}
	}

	/**
	 * Returns single post posts by title
	 *
	 * @param string $postTitle the title of this post
	 * @return Tx_BlogExample_Domain_Model_Post post or NULL if not found
	 */
	public function findPostByTitle($postTitle) {
		foreach ($this->posts as $post) {
			if (strtolower($post->getTitle()) === strtolower($postTitle)) {
				return $post;
			}
		}
		return NULL;
	}

	/**
	 * Returns posts posts by tag
	 *
	 * @param string $tag
	 * @return array of Tx_BlogExample_Domain_Model_Post
	 */
	public function findPostsByTag($tag) {
		$foundPosts = array();
		foreach ($this->posts as $post) {
			foreach ($post->getTags() as $postTag) {
				if (strtolower($postTag) === strtolower($tag)) {
					$foundPosts[] = $post;
					break;
				}
			}
		}
		return $foundPosts;
	}

	/**
	 * Returns this blog as a formatted string
	 *
	 * @return string
	 */
	public function __toString() {
		return $this->name;
	}
}
?>