<?php 
class Nav extends DB{
    private $cluster_id;
    private $cluster_name;
    private $html_string;

    function __construct($cluster_id = 4){
        $this->cluster_id = $cluster_id;
    }

    public function generateMenuItems(){
        $sql = "SELECT `id`, `nazwa` FROM `gromady`";
        $result = mysqli_query($this->getDBConn(), $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0){
            $html_string = "";

            while($row = mysqli_fetch_assoc($result)){
                if($this->cluster_id == $row['id']){
                    $html_string .= "<button type='submit' name='nav__item' value='".$row['id']."' class='nav__item nav__item--active'>".$row['nazwa']."</button>";
                    $this->cluster_name = $row['nazwa'];
                }
                else{
                    $html_string .= "<button type='submit' name='nav__item' value='".$row['id']."' class='nav__item'>".$row['nazwa']."</button>";
                }
            }
        }

        $this->html_string = $html_string;
        mysqli_close($this->getDBConn()); 
        
        return $html_string;
    }

    public function getActiveClusterId(){
        return $this->cluster_id;
    }

    public function getActiveClusterName(){
        return $this->cluster_name;
    }
}