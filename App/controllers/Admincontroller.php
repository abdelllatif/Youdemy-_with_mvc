<?php
require_once (__DIR__.'/../model/AdminModel.php');

class AdminController {
    private $adminModel;

    public function __construct() {
        $this->adminModel = new AdminModel();
    }
    public function getDachebored() {
        require_once(__DIR__ . '/../views/Admin/admin_dachebored.php');
    }
    public function validateTeacherAccount($teacherId, $isApproved) {
        return $this->adminModel->validateTeacherAccount($teacherId, $isApproved);
    }

    public function getTeachers() {
        return $this->adminModel->getTeachers();
    }

    public function suspendUser($userId, $status) {
        return $this->adminModel->suspendUser($userId, $status);
    }

    public function getUserStatus($userId) {
        return $this->adminModel->getUserStatus($userId);
    }

    public function getAllUsersByStatus($status = null) {
        return $this->adminModel->getAllUsersByStatus($status);
    }

    public function getTotalVideos() {
        return $this->adminModel->getTotalVideos();
    }

    public function getTotalDocuments() {
        return $this->adminModel->getTotalDocuments();
    }

    public function getCoursesByCategory() {
        return $this->adminModel->getCoursesByCategory();
    }

    public function getTopCourse() {
        return $this->adminModel->getTopCourse();
    }

    public function getTopTeachers() {
        return $this->adminModel->getTopTeachers();
    }

    public function suspendCourse($courseId, $type, $role) {
        return $this->adminModel->suspendCourse($courseId, $type, $role);
    }
}