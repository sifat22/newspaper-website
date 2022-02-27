<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');


?>

<?php 
 class Slogan{
     private $db;
     private $fm;
     public function __construct()
     {
        $this->db=new Database();
        $this->fm=new Format(); 
     }
     /// insert slogan
     public function addslogan($sloganName){
        $sloganName=$this->fm->validation($sloganName);
        $sloganName=mysqli_real_escape_string($this->db->link,$sloganName);
        //cant add same slogan
        $chkquery="SELECT * FROM tbl_slogan1 WHERE sloganName='$sloganName'";
        $chkpro=$this->db->select($chkquery);
        if($chkpro){
        $msg="Slogan already added !";
        return $msg;
        }else{
        if(empty($sloganName)){
            $msg="sloganName Filed Must not be Empty !";
            return $msg;
        }else{
            $query="INSERT INTO tbl_slogan1(sloganName) VALUES('$sloganName')";
            $insert_slogan=$this->db->insert($query);
            if($insert_slogan){
                $msg="<span style='color:green;font-size:18px;'>Slogan Inserted Sucesfully !</span>";
                return $msg;
            }else{
                $msg="<span style='color:red;font-size:18px;'>Slogan Not Inserted  !</span>";
                return $msg;
            }
        }
        }
     }

     public function showSlogan(){
        $query="SELECT * FROM tbl_slogan1 ";
        $show_slogan=$this->db->select($query);
        return $show_slogan;
     }
 }

?>