<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php 
class Category{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db=new Database();
        $this->fm=new Format();
    }
    ///Inser Ctegory
    public function addCat($catName){
        $catName=$this->fm->validation($catName);
        $catName=mysqli_real_escape_string($this->db->link,$catName);
         //cant add same Category
         $chkquery="SELECT * FROM tbl_category1 WHERE catName='$catName'";
         $chkpro=$this->db->select($chkquery);
         if($chkpro){
            $msg="Category already added !";
            return $msg;
         }else{
            if(empty($catName)){
                $msg="Vategory Name Filed Must not be Empty !";
                return $msg;
            }else{
                $query="INSERT INTO tbl_category1(catName) VALUES('$catName')";
                $insert_category=$this->db->insert($query);
                if($insert_category){
                    $msg="<span style='color:green;font-size:18px;'>Ctegory Inserted Sucesfully !</span>";
                    return $msg;
                }else{
                    $msg="<span style='color:red;font-size:18px;'>Category Not Inserted  !</span>";
                    return $msg;
                }
            }
        }
    }
    ///show category
    public function ShowCategory(){
        $query="SELECT * FROM tbl_category1 ORDER BY catId DESC ";
        $show_cat=$this->db->select($query);
        return $show_cat;
    }

    ///edit category

    public function getCtaById($catid){
        $query="SELECT * FROM tbl_category1 WHERE catId='$catid'";
        $edit_cat=$this->db->select($query);
        return $edit_cat;
    }

    ///update Ctegory
    public function updateCat($catName,$catid){
        $catName=$this->fm->validation($catName);
        $catName=mysqli_real_escape_string($this->db->link,$catName);
        $catid=mysqli_real_escape_string($this->db->link,$catid);
        if(empty($catName)){
            $msg="Category Filed Must not be Empty !";
            return $msg;
        }else{
            $update_query="UPDATE tbl_category1
            SET
            catName='$catName'
            WHERE catId='$catid'
            ";
            $update_row=$this->db->update($update_query);
            if($update_row){
                $msg="<span style='color:green;font-size:18px;'>Category Updated Sucesfully !</span>";
                return $msg;
            }else{
                $msg="<span style='color:red;font-size:18px;'>Category Not Updated !</span>";
                return $msg;
            }
        }
    }

    ///delet category
    public function delCatById($delid){
        $delid=mysqli_real_escape_string($this->db->link,$delid);

            $query="DELETE FROM tbl_category1 WHERE catId='$delid'";
            $delcat=$this->db->delete($query);
            if($delcat){
                $msg="<span style='color:green;font-size:18px;'>Category Deleted Sucesfully !</span>";
                return $msg;
            }else{
                $msg="<span style='color:red;font-size:18px;'>Category Not Deleted  !</span>";
                return $msg;
            }
        }
    }


?>