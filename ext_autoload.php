<?php
$extensionClassesPath = t3lib_extMgm::extPath('blog_example') . 'Classes/';
return array(
	'tx_blogexample_viewhelpers_abstractbackendviewhelper' => $extensionClassesPath . 'ViewHelpers/AbstractBackendViewHelper.php',
	'tx_blogexample_domain_model_blog' => $extensionClassesPath . 'Domain/Model/Blog.php',
	'tx_blogexample_domain_model_post' => $extensionClassesPath . 'Domain/Model/Post.php',
	'tx_blogexample_domain_model_tag' => $extensionClassesPath . 'Domain/Model/Tag.php',
	'tx_blogexample_domain_model_comment' => $extensionClassesPath . 'Domain/Model/Comment.php',
	'tx_blogexample_domain_model_person' => $extensionClassesPath . 'Domain/Model/Person.php',
	'tx_blogexample_domain_model_administrator' => $extensionClassesPath . 'Domain/Model/Administrator.php',
	'tx_blogexample_domain_repository_blogrepository' => $extensionClassesPath . 'Domain/Repository/BlogRepository.php',
	'tx_blogexample_domain_repository_personrepository' => $extensionClassesPath . 'Domain/Repository/PersonRepository.php',
	'tx_blogexample_domain_repository_postrepository' => $extensionClassesPath . 'Domain/Repository/PostRepository.php',
	'tx_blogexample_domain_repository_administratorrepository' => $extensionClassesPath . 'Domain/Repository/AdministratorRepository.php',
	'tx_blogexample_domain_repository_tagrepository' => $extensionClassesPath . 'Domain/Repository/TagRepository.php',
	'tx_blogexample_domain_repository_tagrepository' => $extensionClassesPath . 'Domain/Repository/TagRepository.php',
	'tx_blogexample_domain_validator_blogvalidator' => $extensionClassesPath . 'Domain/Validator/BlogValidator.php',	
	'tx_blogexample_controller_blogcontroller' => $extensionClassesPath . 'Domain/Controller/BlogController.php',
	'tx_blogexample_controller_commentcontroller' => $extensionClassesPath . 'Domain/Controller/CommentController.php',
	'tx_blogexample_controller_postcontroller' => $extensionClassesPath . 'Domain/Controller/PostController.php'
);
?>