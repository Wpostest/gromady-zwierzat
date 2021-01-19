<?php
    class Cluster extends DB{
        private $html_string;

        public function getClusterData($cluster_id){
            $sql = "SELECT z.`id`, z.`Gromady_id`, z.`gatunek`, z.`wystepowanie`, g.`nazwa` FROM `zwierzeta` as z INNER JOIN gromady as g ON z.`Gromady_id` = g.`id` WHERE z.`Gromady_id` = $cluster_id";
            $result = mysqli_query($this->getDBConn(), $sql);
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck > 0){
                $html_string = "";

                while($row = mysqli_fetch_assoc($result)){
                    $html_string .= "<p>".$row['id'].". ". $row['gatunek']. "</p>";
                    $html_string .= "<p>Występowanie ". $row['wystepowanie']. ", gromada". $row['nazwa'] ."</p>";
                }

                $this->html_string = $html_string;
                mysqli_close($this->getDBConn()); 

                return $html_string;
            }
        }

        public function getClasterList($cluster_id){
            $sql = "SELECT `gatunek`, `obraz` FROM `zwierzeta` WHERE `Gromady_id` = $cluster_id";
            $result = mysqli_query($this->getDBConn(), $sql);
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck > 0){
                $html_string = "";

                while($row = mysqli_fetch_assoc($result)){
                    $html_string .= "<li><a href='images/".$row['obraz']."'>".$row['gatunek']."</a></li>";
                }

                $this->html_string = $html_string;
                mysqli_close($this->getDBConn()); 

                return $html_string;
            }
        }
    }
?>
