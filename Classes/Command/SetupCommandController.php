<?php

class Tx_BlogExample_Command_SetupCommandController extends Tx_Extbase_MVC_Controller_CommandController {

	/**
	 * @var Tx_BlogExample_Domain_Repository_BlogRepository
	 */
	protected $blogRepository;

	/**
	 * @param Tx_BlogExample_Domain_Repository_BlogRepository $blogRepository
	 * @return void
-	 */
	public function injectBlogRepository(Tx_BlogExample_Domain_Repository_BlogRepository $blogRepository) {
		$this->blogRepository = $blogRepository;
	}

	/**
	 * Creates some sample blogs with dummy data
	 *
	 * @param integer $numberOfBlogs number of new blogs to create
	 * @return string
	 */
	public function createDataCommand($numberOfBlogs = 5) {
		$numberOfExistingBlogs = $this->blogRepository->countAll();
		$blogFactory = $this->objectManager->get('Tx_BlogExample_Domain_Service_BlogFactory');
		for ($blogNumber = $numberOfExistingBlogs + 1; $blogNumber < ($numberOfExistingBlogs + $numberOfBlogs); $blogNumber++) {
			$blog = $blogFactory->createBlog($blogNumber);
			$this->blogRepository->add($blog);
		}

		return sprintf('Created %d blogs!', $numberOfBlogs);
	}
}

?>