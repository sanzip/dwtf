<?php


class Common {
    public $conn;

    function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }


    public function deleteuser($inputdata='')
    {
        $id=$inputdata['id'];
		//echo $id;
        $rs=pg_query($this->conn,"delete from users where user_id=$id");
		
     $data = array();
       
       if($rs)
        {
            $data['status'] = "success";
            
            
        }
        return $data;
}
}
?>
