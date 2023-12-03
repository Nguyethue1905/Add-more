<?php
class upload
{
    var $user_id  = null;
    var $avatar  = null;
    var $cover_img  = null;

    public function Update_avatar($avatar, $user_id)
    {
        $db = new connect();
        $sql = "UPDATE userproflie SET  `avatar` = '$avatar' WHERE user_id = '$user_id'";
        $resulf = $db->pdo_query_one($sql);
        return $resulf;
    }
    public function Update_cover($cover_img, $user_id)
    {
        $db = new connect();
        $sql = "UPDATE userproflie SET  `cover_img` = '$cover_img' WHERE user_id = '$user_id'";
        $resulf = $db->pdo_query_one($sql);
        return $resulf;
    }

    public function getimg($user_id)
    {
        $db = new connect();
        $sql = "SELECT * from userproflie where user_id = '$user_id'";
        $resulf = $db->pdo_query_one($sql);
        return $resulf;
    }


    public function loadimg(){
        if (isset($_FILES['image-avatar']['name'])) {
            $user_id = $_SESSION['id'];
            $imgName = $_FILES['image']['name'];
            $imgSize = $_FILES['image']['size'];
            $tmpName = $_FILES['image']['tmp_name'];
        
            $validImageExtension = ['jpg', 'jpeg', 'png', 'gif'];
            $imageExtension = explode('.', $imgName);
            $imageExtension = strtolower(end($imageExtension));
            if (!in_array($imageExtension, $validImageExtension)) {
                echo "
                <script>
                    alert('Image extension');
                    document.location.href = './View/images/uploads');
                </script>
                ";
            } else {
                $avatar = $imgName;
                $avatar1 = date("Y.m.d") . "-" . date("h.i.sa");
                $avatar1 = "." . $imageExtension;
                move_uploaded_file($tmpName, './View/images/uploads/' . $avatar);
                $db = new upload();
                $retart  = $db->Update_avatar($avatar, $user_id);
        
                header("location: ./index.php?act=myacount");
            }
        
            echo "
                <script>
                    alert('Image extension');
                    document.location.href = './View/images/uploads');
                </script>
                ";
        }
        
    }
    public function loadcover(){
        if (isset($_FILES['image-cover']['name'])) {
            $user_id = $_SESSION['id'];
            $imgNames = $_FILES['image-cover']['name'];
            $imgSizes = $_FILES['image-cover']['size'];
            $tmpNames = $_FILES['image-cover']['tmp_name'];
        
            $validImageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            $imageExtensions = explode('.', $imgNames);
            $imageExtensions = strtolower(end($imageExtensions));
            if (!in_array($imageExtensions, $validImageExtensions)) {
                echo "
                <script>
                    alert('Image extension');
                    document.location.href = './View/images/uploads');
                </script>
                ";
            } else {
                $cover_img = $imgNames;
                $cover_img1 = date("Y.m.d") . "-" . date("h.i.sa");
                $cover_img1 = "." . $imageExtensions;
                move_uploaded_file($tmpNames, './View/images/uploads/' . $cover_img);
                // if (isset($_POST['change'])) {
                $db = new upload();
                $retart  = $db->Update_cover($cover_img, $user_id);
        
                header("location: ./index.php?act=myacount");
            }
        
            echo "
                <script>
                    alert('Image extension');
                    document.location.href = './View/images/uploads');
                </script>
                ";
        }
        
    }

  
    }
