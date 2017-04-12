<?php


class Common {
    public $conn;

    function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }


    public function deletebanner($inputdata='')
    {
        $id=$inputdata['id'];
		echo $id;
        $rs=mysqli_query($this->conn,"delete from banner where banner_id=$id");
		
     $data = array();
       
       if($rs)
        {
            $data['status'] = "success";
            
            
        }
        return $data;
}
    public function deletegallery($inputdata='')
    {
        $id=$inputdata['id'];
		echo $id;
        $rs=mysqli_query($this->conn,"delete from galery where gallery_id=$id");
		
     $data = array();
       
       if($rs)
        {
            $data['status'] = "success";
            
            
        }
        return $data;
}
    public function deleteuser($inputdata='')
    {
        $id=$inputdata['id'];
		echo $id;
        $rs=mysqli_query($this->conn,"delete from users where user_id=$id");
		
     $data = array();
       
       if($rs)
        {
            $data['status'] = "success";
            
            
        }
        return $data;
}
}
?>
