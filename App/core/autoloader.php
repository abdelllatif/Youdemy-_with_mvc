<?php
class Autoloader {
        public static function register() {
            spl_autoload_register(function($class) {
                $paths = [
                    __DIR__ . '/../Controllers/',   
                    __DIR__ . '/../Model/',     
                    __DIR__ . '/../Views/' ,  
                    __DIR__ . '/../core/'         
      
                ];
    
                foreach ($paths as $path) {
                    $file = $path . str_replace('\\', '/', $class) . '.php';
                    if (file_exists($file)) {
                        require_once $file;
                        return;
                    } else {
                        error_log("Autoloader: File not found - " . $file);
                    }
                }
            });
   
}
}
