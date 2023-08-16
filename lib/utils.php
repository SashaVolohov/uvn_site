<?php

    class Utils {
        
        public function ShowPages() {
            
            echo file_get_contents("templates/pages.html");
            
        }
        
    }
    
?>