<?php


class Check_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function getType()
    {
        $query = $this->db->get_where('type',array('status'=>0));
        return $query->result_array();
    }

    public function getBlByType($id)
    {
        $sql = "select * from bingli where type=".$id;
        $query = $this->db->query($sql);
        //var_dump($this->db->last_query());
        return $query->result_array();
    }

    public function getTableByBlId($id,$userId)
    {
        $query = $this->db->get_where('table',array('blId'=>$id,'userId'=>$userId));
        return $query->result_array();
    }


    //    登录
    public function login_do($loginInfo)
    {
        $query = $this->db->get_where('jm_admin',$loginInfo);
        return $query->row_array();
    }

    public function userInfo_all()
    {
        $query = $this->db->get_where('user',array('disable'=>0));
        return $query->result_array();
    }

    public function userBL()
    {
        $query = $this->db->get_where('bingli');
        return $query->result_array();
    }

    public function getBLInfo($blId)
    {
        $query = $this->db->get_where('bingli',array('blId'=>$blId));
        return $query->row_array();
    }

    public function getFXZ($blId,$userId)
    {
        $query = $this->db->get_where('jyfx',array('blId'=>$blId,'userId'=>$userId));
        return $query->row_array();
    }

    public function getTableById($blId,$userId)
    {
        $query = $this->db->get_where('table',array('blId'=>$blId,'userId'=>$userId));
        return $query->result_array();
    }

    public function getName($userId)
    {
        $query = $this->db->get_where('user',array('userId'=>$userId));
        return $query->row_array();
    }
// 修改jyfx表格的风险值
    public function editFXZ($id,$info)
    {
        $this->db->where('id',$id);
        return $this->db->update('jyfx',$info);
    }

    public function insertFXZ($info)
    {
        return $this->db->insert('jyfx',$info);
    }

   public function editTable($id,$info)
   {
       $this->db->where('id',$id);
       return $this->db->update('table',$info);
   }


    public function delete($blId)
    {
        $sql="DELETE from bingli where id=".$blId;
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function insertTable($info)
    {
        return $this->db->insert('table',$info);
    }


    public function addUser($info)
    {
        return $this->db->insert('user',$info);
    }

    public function deleteUser($id)
    {
        $this->db->where('id',$id);
        return $this->db->update('user',array('disable'=>1));
    }

    public  function getBL()
    {
        $query = $this->db->get('bingli');
        return $query->result_array();
    }

    public function getFXZById($blId,$userId)
    {
        $query = $this->db->get_where('jyfx',array('blId'=>$blId,'userId'=>$userId));
        return $query->row_array();
    }

    public function getFXZByUserId($userId)
    {
        $sql="SELECT * from jyfx where userId=".$userId." order by fengxianzhi desc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getBLNameByBLId($blId)
    {
        $query = $this->db->get_where('bingli',array('blId'=>$blId));
        return $query->row_array();
    }

}

?>
