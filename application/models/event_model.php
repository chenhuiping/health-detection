<?php


class Event_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }



    /*全部活动*/
    public function bingliList_all()
    {
        $query = $this->db->get_where('bingli');
        return $query->result_array();
    }


    public function maxId()
    {
        $sql = "select max(blId) from bingli ";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

	//活动详情
	public function bingliInfo($blId)
	{
		$query = $this->db->get_where('bingli',array('blId'=>$blId));
		return $query->row_array();
	}

    public function gettable_all($bingliId)
    {
        $query = $this->db->get_where('weidianxiangqing',array('typeid'=>$bingliId));
        return $query->result_array();
    }
    //vote详情
    public function voteInfo($voteId,$aId)
    {
        $dbUser=$this->load->database('vote', TRUE);
        $query=$dbUser->get_where('answer',array('qid'=>$voteId,'value'=>$aId));
        return $query->row_array();
    }



    /*全部工作*/
    public function jobList_all()
    {
        $query = $this->db->get_where('jm_event',array('disable'=>0,'tag'=>3));
        return $query->result_array();
    }

    /*全部工作*/
    public function voteList_all()
    {
        $dbUser=$this->load->database('vote', TRUE);
        $sql = "select * from answer,question where answer.qid=question.id and answer.disable=0;";
        $query = $dbUser->query($sql);


      // var_dump($query->result_array()  );die;
        return $query->result_array();
    }
    /*全部issue*/
    public function issueList_all()
    {
        $query = $this->db->get_where('jm_event',array('disable'=>0,'tag'=>2));
        return $query->result_array();
    }

    /*添加活动*/
    public function addEvent($info)
    {
        return $this->db->insert('bingli',$info);
    }
    public function addtable($info)
    {
        return $this->db->insert('weidianxiangqing',$info);
    }

    /*删除活动*/
    public function delete($id)
    {
        $sql="DELETE from bingli where id=".$id;
        $query = $this->db->query($sql);
        return true;
    }

    /*修改活动*/
    public function editEvent($blId,$info)
    {
        $this->db->where('id',$blId);
        return $this->db->update('bingli',$info);
    }
    public function editTable($blId,$info)
    {
        $this->db->where('id',$blId);
        return $this->db->update('weidianxiangqing',$info);
    }
    /*修改vote*/
    public function editVote($voteId,$voteAid,$num)
    {
        $dbUser=$this->load->database('vote', TRUE);
       $sql = "update answer set num=$num where qid=$voteId and value =$voteAid";
        $query = $dbUser->query($sql);
        return $query;
//        $dbUser->get_where('answer',array('qid'=>$voteId,'value'=>$voteAid));


//      $this->db->where('id',$eventId);
//        return $dbUser->update('answer',$info);
    }


    /**************  分类信息 begin  ******************/

    /*获得分类*/
    public function getSort()
    {
        $query = $this->db->get_where('jm_sort');
        return $query->result_array();
    }

    /**************  分类信息 end  ******************/

    /*查找点赞记录*/
    public function searchLikeEventLog($info)
    {
        $query = $this->db->get_where('jm_likeevent',$info);
        return $query->row_array();
    }


    /*插入点赞记录*/
    public function insertLikeEventLog($info)
    {
        return $this->db->insert('jm_likeevent',$info);
    }

    /*插入新评论*/
    public function insertEventComment($info)
    {
        return $this->db->insert('jm_event_comment',$info);

    }

    /*读取活动评论*/
    public function getEventComment($info)
    {
        $sql = "select * from jm_event_comment WHERE eventId=? limit ?,10";
        $query = $this->db->query($sql,$info);
        return $query->result_array();
    }
	
	public function getFiveEvent($tag)
	{
		$field = "jm_event.*,jm_sort.`name` as typename";
		$db = "jm_event,jm_sort";
		$where = "jm_event.typeId=jm_sort.id";
		$condition = array(
		'jm_event.disable'=>0,
		'jm_event.tag'=>$tag
		);
		$query = $this->db->select($field)
		->from($db)
		->where($condition)
		->where($where)
		->order_by('jm_event.id','desc')
		->limit(5)
		->get();
		
		// var_dump($this->db->last_query());
		return $query->result_array();
	}
	
	public function getFiveAll($tag)
	{
		$field = "jm_event.*";
		$db = "jm_event";
		$condition = array(
		'jm_event.disable'=>0,
		'jm_event.tag'=>$tag
		);
		$query = $this->db->select($field)
		->from($db)
		->where($condition)
		->order_by('jm_event.id','desc')
		->limit(5)
		->get();
		
		// var_dump($this->db->last_query());
		return $query->result_array();
	}

}

?>
