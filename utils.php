<?php

    class Utils {
        
        function __construct($connection) {
            $this->connection = $connection;
        }
        
        public function ShowPages() {
            
            $q = mysqli_query($this->connection, 'SELECT * FROM `pages`');
            $res = array();
            while ($r = mysqli_fetch_assoc($q)) {
                $res[] = $r;
            }

            $query = "SELECT count(*) FROM `pages`";
            $res_1 = mysqli_query($this->connection, $query);
            $row = mysqli_fetch_row($res_1);
            
            $i = 0;
            
            while($i < $row[0]) {
                
                $name = $res[$i]['name'];
                $url = $res[$i]['url'];
                
                echo "<li><a class=\"li_page\" href=\"$url\">$name</a></li>\n";
                $i++;
            }
            
        }
        
    }
    
?>