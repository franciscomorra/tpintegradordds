<?php

class Festivales_Controller {

    protected $productRepository;
    protected $entityManager;

	function __construct($entityManager){
        $this->entityManager = $entityManager;
        $this->productRepository = $entityManager->getRepository('Festival');
    }
	function get_all(){
        return $this->productRepository->findAll();
	}

    function getById($id){
        return $this->entityManager->find('Festival',$id);
    }
}
