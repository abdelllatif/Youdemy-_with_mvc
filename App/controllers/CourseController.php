<?php
 abstract class CourseController {
    protected $model;
    public function __construct($model=null) {
        $this->model = $model;
    }

    public function index() {
        return $this->model->getAll();
    }

    public function show($id) {
        return $this->model->getById($id);
    }
    
     public abstract function afficher( $term = null, $page = 1, $perPage = 10);
}


