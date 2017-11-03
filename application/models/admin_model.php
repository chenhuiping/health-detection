<?php


class Admin_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
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
    public function insertBingLi($info)
    {
        return $this->db->insert('bingli',$info);
    }

   public function editTable($id,$info)
   {
       $this->db->where('id',$id);
       return $this->db->update('table',$info);
   }

    public function editBingLi($id,$info)
    {
        $this->db->where('blId',$id);
        return $this->db->update('bingli',$info);
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

    public function maxId()
    {
        $sql = "select max(blId) from bingli ";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function getType()
    {
        $query = $this->db->get_where('type',array('status'=>0));
        return $query->result_array();
    }

    public function getTypeName($id)
    {
        $sql="SELECT type.name from bingli,type where bingli.type=type.id and bingli.blId=".$id;
        $query = $this->db->query($sql);
        return $query->row_array();
    }


    public function deleteBL($id)
    {
        $sql="DELETE from bingli where id=".$id;
        $query = $this->db->query($sql);
        return true;
    }
    public function deleteFXZ($blId,$userId)
    {
        $sql="DELETE from jyfx where blId=".$blId."and userId=".$userId;
        $query = $this->db->query($sql);
        return true;
    }
    public function deleteTable($blId,$userId)
    {
        $sql="DELETE from bingli where blId=".$blId."and userId=".$userId;
        $query = $this->db->query($sql);
        return true;
    }


}

?>
