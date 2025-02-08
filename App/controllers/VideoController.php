<?php
class VideoController extends CourseController {

     public function __construct() {
            parent::__construct(new VideoModel());  
        }
    
    
    public function addVideo( ) {
        echo '<br>';
        var_dump($_POST); 
        echo '<br>';
        var_dump($_FILES);
        echo '<br>';
        var_dump($_SESSION['user']['id']);        
    if (isset($_SESSION['user']['id'])) {
        $data = [
            'title' => $_POST['title'],
            'categorie_id' => $_POST['categorie'],
            'description' => $_POST['description'],
            'teacher_id' => $_SESSION['user']['id'],
            'tags_id'=>$_POST['tags']
        ];
        echo '<br>';
       echo $_POST['categorie']??'no';
       $data['tags_id'] = is_array($data['tags_id']) ? $data['tags_id'] : explode(',', $data['tags_id']);

        echo '<br>';
        foreach($data['tags_id']as $text){
            echo '<br>';

                    echo $text."nbr";
                    echo '<br>';

        }
        echo '<br>';

        $videoFile=$_FILES['video'];
         $thumbnailFile=$_FILES['thumbnail'];
        if ($this->isValidFile($videoFile, ['video/mp4', 'video/ogg', 'video/webm'], 20000 * 1024 * 1024) &&
            $this->isValidFile($thumbnailFile, ['image/jpeg', 'image/png', 'image/gif'], 15 * 1024 * 1024)) {
            $videoPath = $this->uploadFile($videoFile);
            $thumbnailPath = $this->uploadFile($thumbnailFile);
            echo "acceptables";
            $videoId = $this->model->add($data, $videoPath, $thumbnailPath);

            if ($videoId) {
                foreach($data['tags_id'] as $tag){
                $tagsAdded = $this->model->addTagsTocourse($tag,$videoId );
                } 

                if ($tagsAdded) {
                    echo "Video and tags added successfully.";
                } else {
                    echo "Video added, but failed to add tags.";
                }
        } else {
        }
        // require_once (__DIR__.'/../views/Teacher/teacher_profil.php');
    }
    else{
        echo 'no';
}
}
    }
    private function isValidFile($file, $validTypes, $maxSize) {
        if (!in_array($file['type'], $validTypes)) {
            return false;
        }
        if ($file['size'] > $maxSize) {
            return false;
        }
        return true;
    }

    public function addTags() {
        if (isset($_POST['video_id']) && isset($_POST['tags'])) {
            $videoId = $_POST['video_id'];
            $tags = $_POST['tags'];
            $result = $this->model->addTags($videoId, $tags);
            
if($result){
    echo "added suceffully";
}
else{
    echo "add failed";
}
        exit;
    }
}
public function afficher() {
    // Get 'page' and 'term' from the query parameters, with default values
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
    $term = isset($_POST['search_term']) ? trim($_POST['search_term']) : null;
    $perPage = 10; // Define number of results per page

    // Calculate total results and pages
    $totalResults = $this->model->countResults($term);
    $totalPages = ceil($totalResults / $perPage);

    // Calculate the offset for pagination
    $offset = ($page - 1) * $perPage;

    // Fetch results
    $results = $this->model->afficher($term, $page, $perPage);

    if (!$results) {
        echo "No results found.";
        exit();
    }

    // Pass data to the view
    require_once(__DIR__ . '/../views/Student/course.php');
}




    private function uploadFile($file) {
        $targetDirectory =  '../App/views/Uploads/';
        if (!is_dir($targetDirectory)) {
            mkdir($targetDirectory, 0755, true);
        }
        $targetPath = $targetDirectory . uniqid() . '-' . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            return $targetPath;
        }
        return false;
    }
   

    
}
