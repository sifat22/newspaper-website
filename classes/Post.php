<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
?>

<?php 
class Post{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db=new Database();
        $this->fm=new Format();
    }
    //insert post
    public function insertPost($data,$file){
        $title=mysqli_real_escape_string($this->db->link,$data['title']);
        $catId=mysqli_real_escape_string($this->db->link,$data['catId']);
        $body=mysqli_real_escape_string($this->db->link,$data['body']);
        $author=mysqli_real_escape_string($this->db->link,$data['author']);
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;
        if($title=="" ||$catId=="" ||$body==""||$author==""
        || $file_name=="" ){
            $msg="<span style='color:red;font-size:18px;'>Filed must not be empty  !</span>";
            return $msg;
        }elseif ($file_size >1048567) {
            echo "<span class='error'>Image Size should be less then 1MB!
            </span>";
           } elseif (in_array($file_ext, $permited) === false) {
            echo "<span class='error'>You can upload only:-"
            .implode(', ', $permited)."</span>";
           }else{
            move_uploaded_file($file_temp, $uploaded_image);
            $query="INSERT INTO tbl_post1(title,catId,body,
            author,image)
             VALUES('$title','$catId','$body',
             '$author','$uploaded_image')";
             $insert_product=$this->db->insert($query);
             if($insert_product){
                 $msg="<span style='color:green;font-size:18px;'>Products Inserted Sucesfully !</span>";
                 return $msg;
             }else{
                 $msg="<span style='color:red;font-size:18px;'>Products Not Inserted  !</span>";
                 return $msg;
             }

        }
    }
    //show post iiner join
    public function showPost(){
        $query="SELECT p.*,c.catName
        FROM tbl_post1 as p,tbl_category1 as c
        WHERE p.catId=c.catId 
        ORDER BY postId DESC
        ";
        $show_product=$this->db->select($query);
        return $show_product;
    }

    //edit post
    public function getPostByid($postid){
        $query="SELECT * FROM tbl_post1 WHERE postId='$postid'";
        $show_product=$this->db->select($query);
        return $show_product;
    }

    ///update post
    public function postUpdate($data,$file,$postid){
        $title=mysqli_real_escape_string($this->db->link,$data['title']);
        $catId=mysqli_real_escape_string($this->db->link,$data['catId']);
        $body=mysqli_real_escape_string($this->db->link,$data['body']);
        $author=mysqli_real_escape_string($this->db->link,$data['author']);
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;
        if($title=="" ||$catId=="" ||$body==""||$author=="" ){
            $msg="<span style='color:red;font-size:18px;'>Filed must not be empty  !</span>";
            return $msg;
        }else{
            if(!empty($file_name)){

            
        if ($file_size >1048567) {
            echo "<span class='error'>Image Size should be less then 1MB!
            </span>";
           } elseif (in_array($file_ext, $permited) === false) {
            echo "<span class='error'>You can upload only:-"
            .implode(', ', $permited)."</span>";
           }else{
            move_uploaded_file($file_temp, $uploaded_image);
            
             $query="UPDATE tbl_post1
                    SET
                    title='$title',
                    catId='$catId',
                    body='$body',
                    author='$author',
                    image='$uploaded_image'
                    WHERE postId='$postid'";
             $update_product=$this->db->update($query);
             if($update_product){
                 $msg="<span style='color:green;font-size:18px;'>Products Updated Sucesfully !</span>";
                 return $msg;
             }else{
                 $msg="<span style='color:red;font-size:18px;'>Products Not Updated  !</span>";
                 return $msg;
             }

        }
    }else{
        $query="UPDATE tbl_post1
        SET
        title='$title',
        catId='$catId',
        body='$body',
        author='$author'
        WHERE postId='$postid'";
 $update_product=$this->db->update($query);
 if($update_product){
     $msg="<span style='color:green;font-size:18px;'>Products Updated Sucesfully !</span>";
     return $msg;
 }else{
     $msg="<span style='color:red;font-size:18px;'>Products Not Updated  !</span>";
     return $msg;
 }

    } 
    }
}
//delete
public function delPostById($delid){
    $delid=mysqli_real_escape_string($this->db->link,$delid);

    $query="DELETE FROM tbl_post1 WHERE postId='$delid'";
    $delcat=$this->db->delete($query);
    if($delcat){
        $msg="<span style='color:green;font-size:18px;'>Category Deleted Sucesfully !</span>";
        return $msg;
    }else{
        $msg="<span style='color:red;font-size:18px;'>Category Not Deleted  !</span>";
        return $msg;
    }
}

///show one in news in the naitionapage
public function getOneNews(){
    $query="SELECT * FROM tbl_post1 WHERE catId='1' ORDER BY rand() LIMIT 1  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
///getpost by random national
public function getPostByRandNat(){
    $query="SELECT * FROM tbl_post1 WHERE catId='1' ORDER BY rand() LIMIT 3  ";
    $show_post=$this->db->select($query);
  
    return $show_post;
}
//get more last by id
public function getNatpost(){
    $query="SELECT * FROM tbl_post1 WHERE catId='1' ORDER BY rand() LIMIT 5  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
///show one in news in the finance
public function getFinNews(){
    $query="SELECT * FROM tbl_post1 WHERE catId='4' ORDER BY rand() LIMIT 1  ";
    $show_post=$this->db->select($query);
    return $show_post;
}


///getpost by random finance
public function getPostByRandFin(){
    $query="SELECT * FROM tbl_post1 WHERE catId='4' ORDER BY rand() LIMIT 3  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
//get more last by id
public function getFinPost(){
    $query="SELECT * FROM tbl_post1 WHERE catId='4' ORDER BY rand() LIMIT 5  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
///show one in news in the politic
public function getPolnews(){
    $query="SELECT * FROM tbl_post1 WHERE catId='2' ORDER BY rand() LIMIT 1  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
//get more last by id
public function getPolPost(){
    $query="SELECT * FROM tbl_post1 WHERE catId='2' ORDER BY rand() LIMIT 5  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
///getpost by random Politics
public function getPostByrandPol(){
    $query="SELECT * FROM tbl_post1 WHERE catId='2' ORDER BY rand() LIMIT 3  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
///show one in news in the internation
public function getIntNews(){
    $query="SELECT * FROM tbl_post1 WHERE catId='3' ORDER BY rand() LIMIT 1  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
///getpost by random internation
public function getPostByrandInt(){
    $query="SELECT * FROM tbl_post1 WHERE catId='3' ORDER BY rand() LIMIT 3  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
//get more last by id
public function getIntpost(){
    $query="SELECT * FROM tbl_post1 WHERE catId='3' ORDER BY rand() LIMIT 5  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
///show one in news in the sports
public function getSportsNews(){
    $query="SELECT * FROM tbl_post1 WHERE catId='5' ORDER BY rand() LIMIT 1  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
///getpost by random sports
public function getpostByrandSpo(){
    $query="SELECT * FROM tbl_post1 WHERE catId='5' ORDER BY rand() LIMIT 3  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
//get more last by id
public function getSpoPost(){
    $query="SELECT * FROM tbl_post1 WHERE catId='5' ORDER BY rand() LIMIT 5  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
///show one in news in the education
public function getEduNews(){
    $query="SELECT * FROM tbl_post1 WHERE catId='6' ORDER BY rand() LIMIT 1  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
///getpost by random education
public function getEdubyRand(){
    $query="SELECT * FROM tbl_post1 WHERE catId='6' ORDER BY rand() LIMIT 3  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
//get more last by id
public function getEduPost(){
    $query="SELECT * FROM tbl_post1 WHERE catId='6' ORDER BY rand() LIMIT 5  ";
    $show_post=$this->db->select($query);
    return $show_post;
}

///show one in news in the education
public function getHeaNews(){
    $query="SELECT * FROM tbl_post1 WHERE catId='7' ORDER BY rand() LIMIT 1  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
///getpost by random education
public function getHeaByrand(){
    $query="SELECT * FROM tbl_post1 WHERE catId='7' ORDER BY rand() LIMIT 3  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
//get more last by id
public function getHeaPost(){
    $query="SELECT * FROM tbl_post1 WHERE catId='7' ORDER BY rand() LIMIT 5  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
///show one in news in the anondo and ayna
public function genAnondoNews(){
    $query="SELECT * FROM tbl_post1 WHERE catId='8' ORDER BY rand() LIMIT 1  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
///getpost by random anondo and ayna
public function getAnondoByRand(){
    $query="SELECT * FROM tbl_post1 WHERE catId='8' ORDER BY rand() LIMIT 3  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
//get anondo and ayna
public function getAnondoPost(){
    $query="SELECT * FROM tbl_post1 WHERE catId='8' ORDER BY rand() LIMIT 5  ";
    $show_post=$this->db->select($query);
    return $show_post;
}

///show one in news in the carrer
public function getCareerNews(){
    $query="SELECT * FROM tbl_post1 WHERE catId='9' ORDER BY rand() LIMIT 1  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
///getpost by random Career
public function getCareerByRand(){
    $query="SELECT * FROM tbl_post1 WHERE catId='9' ORDER BY rand() LIMIT 3  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
//get Career
public function getCareerPost(){
    $query="SELECT * FROM tbl_post1 WHERE catId='9' ORDER BY rand() LIMIT 5  ";
    $show_post=$this->db->select($query);
    return $show_post;
}

///show one in news in the dhormo
public function getDhormoNews(){
    $query="SELECT * FROM tbl_post1 WHERE catId='10' ORDER BY rand() LIMIT 1  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
///getpost by random dhormo
public function getDhormobyRand(){
    $query="SELECT * FROM tbl_post1 WHERE catId='10' ORDER BY rand() LIMIT 3  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
//get dhormo
public function getDhormoPost(){
    $query="SELECT * FROM tbl_post1 WHERE catId='10' ORDER BY rand() LIMIT 5  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
///show one in news in the opradh
public function getOporadhNews(){
    $query="SELECT * FROM tbl_post1 WHERE catId='14' ORDER BY rand() LIMIT 1  ";
    $show_post=$this->db->select($query);
    return $show_post;
}

///show one in news in the adalot
public function getAdalotNews(){
    $query="SELECT * FROM tbl_post1 WHERE catId='13' ORDER BY rand() LIMIT 1  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
///getpost by random adalot
public function getAdalotByRand(){
    $query="SELECT * FROM tbl_post1 WHERE catId='13' ORDER BY rand() LIMIT 3  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
//get adalot
public function getadalotpost(){
    $query="SELECT * FROM tbl_post1 WHERE catId='13' ORDER BY rand() LIMIT 5  ";
    $show_post=$this->db->select($query);
    return $show_post;
}

///show one in news in the sahitto
public function getSahittoNews(){
    $query="SELECT * FROM tbl_post1 WHERE catId='15' ORDER BY rand() LIMIT 1  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
///getpost by random sahitto
public function getSahitto(){
    $query="SELECT * FROM tbl_post1 WHERE catId='15' ORDER BY rand() LIMIT 3  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
//get sahitto
public function getSahittoPost(){
    $query="SELECT * FROM tbl_post1 WHERE catId='15' ORDER BY rand() LIMIT 5  ";
    $show_post=$this->db->select($query);
    return $show_post;
}

///show one in news in the exclusive
public function getExNews(){
    $query="SELECT * FROM tbl_post1 WHERE catId='18' ORDER BY rand() LIMIT 1  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
///getpost by random exclsive
public function getEx(){
    $query="SELECT * FROM tbl_post1 WHERE catId='8' ORDER BY rand() LIMIT 3  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
//get exclusive
public function getExPost(){
    $query="SELECT * FROM tbl_post1 WHERE catId='18' ORDER BY rand() LIMIT 5  ";
    $show_post=$this->db->select($query);
    return $show_post;
}

///show one in news in the vinnokhobor
public function getVinNews(){
    $query="SELECT * FROM tbl_post1 WHERE catId='17' ORDER BY rand() LIMIT 1  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
///getpost by random vinnokhobor
public function getVinno(){
    $query="SELECT * FROM tbl_post1 WHERE catId='17' ORDER BY rand() LIMIT 3  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
//get vinnokhobor
public function getVinPost(){
    $query="SELECT * FROM tbl_post1 WHERE catId='17' ORDER BY rand() LIMIT 5  ";
    $show_post=$this->db->select($query);
    return $show_post;
}




//get post by id
public function getSinglepost($postid){
    $query="SELECT p.*,c.catName
    FROM tbl_post1 as p,tbl_category1 as c
    WHERE p.catId=c.catId  AND
     p.postId='$postid'
    ";
    $show_post=$this->db->select($query);
    return $show_post;
}
//get more post by id
public function getMorePost(){
    $query="SELECT * FROM tbl_post1  ORDER BY rand() LIMIT 4  ";
    $show_post=$this->db->select($query);
    return $show_post;
}
//get more last by id
public function getLastPost(){
    $query="SELECT * FROM tbl_post1  ORDER BY postId DESC LIMIT 8 ";
    $show_post=$this->db->select($query);
    return $show_post;
}
//get more read by people by id
public function getmoreRead(){
    $query="SELECT * FROM tbl_post1  ORDER BY rand() LIMIT 8 ";
    $show_post=$this->db->select($query);
    return $show_post;
}


///get র্বাধিক পঠিত news
public function getMoreReading(){
    $query="SELECT * FROM tbl_post1  ORDER BY rand() LIMIT 8 ";
    $show_post=$this->db->select($query);
    return $show_post;
}

///get Index news
public function Index(){
    $query="SELECT * FROM tbl_post1 WHERE catId='1' ORDER BY rand() LIMIT 3 ";
    $show_post=$this->db->select($query);
    return $show_post;
}

}


?>