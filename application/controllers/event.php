
<?php

class Event extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('event_model');
    }

    public function login_check()
    {
        $session_admin = $this->session->userdata('jm_admin');
        if(!$session_admin){
            redirect('admin/login');
        }

    }
    /*页面 添加活动*/
    public function addEvent()
    {
        $data['maxId'] =$this->event_model->maxId();
//        var_dump( $data['maxId']);die;
        $this->load->view('addEvent',$data);
    }



    /*页面 活动管理*/
    public function manage()
    {
//        $this->login_check();
        $data['bingliList']=$this->event_model->bingliList_all();
        $this->load->view('manageEvent',$data);
    }

    /*功能 上传病例*/
    public function addEvent_do()
    {
//        $tmp = $this->input->post('tmp');
        $bingliName = $this->input->post('bingliName');
//        $fengxianzhi = $this->input->post('fengxianzhi');
//        $bingli = $this->input->post('bingli');
        $content  = $this->input->post('content');
        $id = $this->input->post('blId');
        $blId= $id+1;

//       $r = explode('|',$tmp);

//        for($i=0;$i<((sizeof($r)-1)/5);$i++)
//        {
//           $j=$i*5;
//            $info =array(
//                'typeid'=>$blid,
//                'weidian'=>$r[$j],
//                'pingjia'=>$r[$j+1],
//                'yanjiujiazhi'=>$r[$j+2],
//                'jiyinxing'=>$r[$j+3],
//                'jieguo'=>$r[$j+4],
//            );
//            $data['status']=$this->event_model->addtable($info);
//
//        }


//        die;
        $info =array(
            'blId'=>$blId,
            'name'=>$bingliName,
//            'fengxianzhi'=>$fengxianzhi,
//            'bingli'=>$bingli,
            'content'=>$content,
        );

        $data['status']=$this->event_model->addEvent($info);
        //$data['status']=true;
        $json = json_encode($data);
        print_r($json);
    }

    /*功能 删除活动*/
    public function delete()
    {
        $id = $this->input->post('id');
        $data['status'] = $this->event_model->delete($id);
        $json=json_encode($data);
        print_r($json);
    }

    /*页面 修改活动*/
    public function editEvent($blId)
    {
//        $this->login_check();
        $data['blInfo']=$this->event_model->bingliInfo($blId);
//        $data['table'] = $this->event_model->gettable_all($blId);
//        var_dump( $data['table']);die;
        $this->load->view('editEvent',$data);
    }

    /*功能 保存修改*/
    public function editBlingli_do()
    {
//        $tmp = $this->input->post('tmp');
        $id = $this->input->post('blId');
        $bingliName = $this->input->post('bingliName');
//        $fengxianzhi = $this->input->post('fengxianzhi');
//        $bingli = $this->input->post('bingli');
        $content  = $this->input->post('content');

//        $tid = $this->input->post('tid');
//        $r = explode('|',$tmp);

//        for($i=0;$i<((sizeof($r)-1)/5);$i++)
//        {
//            $j=$i*5;
//            $info =array(
//                'typeid'=>$id,
//                'weidian'=>$r[$j],
//                'pingjia'=>$r[$j+1],
//                'yanjiujiazhi'=>$r[$j+2],
//                'jiyinxing'=>$r[$j+3],
//                'jieguo'=>$r[$j+4],
//            );
//            $data['status']=$this->event_model->addtable($tid,$info);
//
//        }
        $info =array(
            'name'=>$bingliName,

            'content'=>$content,
        );

        $data['status']=$this->event_model->editEvent($id,$info);
        //$data['status']=true;
        $json = json_encode($data);
        print_r($json);

    }

}
?>










