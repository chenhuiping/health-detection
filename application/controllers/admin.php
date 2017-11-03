<?php

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin_model');
    }

    /*页面 主页*/
    public function index()
    {
        $this->login_check();
        $data['userInfo'] = $this->admin_model->userInfo_all();
        $this->load->view('userList',$data);
    }




    /*页面 登录*/
    public function login()
    {
        $this->load->view('login');
    }

    public function login_check()
    {
        $session_admin = $this->session->userdata('jm_admin');
        if(!$session_admin){
            redirect('admin/login');
        }

    }

    /*功能 登录*/
    public function login_do()
    {
        $email =  $this->input->post('email');
        $password = $this->input->post('password');

//        $userId=2;
//        $password ="5245201175";

        $loginInfo = array(
            'email'=>$email,
            'password'=> md5($password),
        );
        $user = $this->admin_model->login_do($loginInfo);
        if(!count($user)){
            //false
            $data['status']=false;
//            redirect('admin/login');
        }
        else{
            //success
            $data['status']=true;
            //var_dump($user['nickName']);die;
            $this->session->set_userdata(array('jm_admin'=>$user['nickName'],'jm_admin_id'=>$user['id']));
//            redirect('admin/index');
        }
        $json = json_encode($data);
        print_r($json);
    }
    public function logout()
    {
        $this->session->sess_destroy();



            if(!empty($_COOKIE['jm_admin_id']) || !empty($_COOKIE['jm_admin'])){
                setcookie("jm_admin_id", null, time()-3600*24*365);
                setcookie("jm_admin", null, time()-3600*24*365);
            }

        redirect('/admin/login');
        return;
    }

    public function userList()
    {
        $data['userInfo'] = $this->admin_model->userInfo_all();
        $this->load->view('userList',$data);
    }

    public function userBL($userId)
    {
        $data['userBL'] = $this->admin_model->userBL();
        $data['userId'] = $userId;
        $data['user'] = $this->admin_model->getName($userId);
        $this->load->view('userBL',$data);
    }

    public function editUserBL($blId,$userId)
    {
        $data['blInfo'] = $this->admin_model->getBLInfo($blId);
        $data['fxz'] = $this->admin_model->getFXZ($blId,$userId);
        $data['typeName'] = $this->admin_model->getTypeName($blId);
        if($data['fxz']==NULL)
        {
            $data['fxz']=0;
        }

        $data['userId'] = $userId;
        $data['blId'] = $blId;

        $data['table'] = $this->admin_model->getTableById($blId,$userId);

        $this->load->view('editUserBL',$data);
    }

    public function editUserBL_do()
    {
        $tmp = $this->input->post('tmp');
        $blId = $this->input->post('blId');
        $userId = $this->input->post('userId');
        $fengxianzhi = $this->input->post('fengxianzhi');
        $bingli = $this->input->post('bingli');
        $bingliName = $this->input->post('bingliName');
        $content = $this->input->post('content');

//        $blId=1;
//        $userId=1;
        $info =array(
            'blId'=>$blId,
            'name'=>$bingliName,
            'content'=>$content,
            'bingli'=>$bingli
        );
        $data['statusTable']=$this->admin_model->editBingLi($blId,$info);


        $r = explode('|',$tmp);

        $data['table'] = $this->admin_model->getTableById($blId,$userId);
//        var_dump($data['table']);
//        die;
        if($data['table'])
        {
            $i=0;
          for($m=0;$m<count($data['table']);$m++)
          {
//              var_dump($id);
              if($i<((sizeof($r)-1)/5))
              {
                  $id = $data['table'][$m]['id'];
                  $j=$i*5;
//                  var_dump( $j);
                  $info =array(
                      'blId'=>$blId,
                      'weidian'=>$r[$j],
                      'pingjia'=>$r[$j+1],
                      'yanjiujiazhi'=>$r[$j+2],
                      'jiyinxing'=>$r[$j+3],
                      'jieguo'=>$r[$j+4],
                      'userId'=>$userId
                  );
//                  var_dump($info);
                  $data['statusTable']=$this->admin_model->editTable($id,$info);
              }
              $i++;
            }
//            die;
        }

        else
        {
            for($i=0;$i<((sizeof($r)-1)/5);$i++)
            {
                $j=$i*5;
                if($r[$j]=="")
                    break;
                else{
                    $info =array(
                        'blId'=>$blId,
                        'weidian'=>$r[$j],
                        'pingjia'=>$r[$j+1],
                        'yanjiujiazhi'=>$r[$j+2],
                        'jiyinxing'=>$r[$j+3],
                        'jieguo'=>$r[$j+4],
                        'userId'=>$userId
                    );
                    $data['statusTable']=$this->admin_model->insertTable($info);
                }

            }
        }
        $data['fxz'] = $this->admin_model->getFXZ($blId,$userId);
        $infoFXZ =array(
            'blId'=>$blId,
            'userId'=>$userId,
            'fengxianzhi'=>$fengxianzhi,
        );
        if($data['fxz'])
        {
            $id=$data['fxz']['id'];
            $data['statusFXZ']=$this->admin_model->editFXZ($id,$infoFXZ);
        }
        else
        {
            $data['statusFXZ']=$this->admin_model->insertFXZ($infoFXZ);
        }


//die;
        $json = json_encode($data);
        print_r($json);
    }


    public function addUser()
    {
        $this->load->view('addUser');
    }

    public function addUser_do()
    {
        $userId = $this->input->post('userId');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $name = $this->input->post('name');

        $info =array(
            'userId'=>$userId,
            'name'=>$name,
            'phone'=>$phone,
            'email'=>$email,
        );

        $data['status']=$this->admin_model->addUser($info);
        $json = json_encode($data);
        print_r($json);
    }

    public function deleteUser()
    {
        $id = $this->input->post('id');
        $data['status']= $this->admin_model->deleteUser($id);
        $json = json_encode($data);
        print_r($json);
    }

    public function addBL($userId)
    {
        $data['userId']=$userId;
        $data['maxId'] = $this->admin_model->maxId();
//        var_dump( $data['maxId']);die;
        $data['blId']= $data['maxId']['max(blId)']+1;
//        var_dump(  $data['blId']);die;

        $data['type'] = $this->admin_model->getType();
        $this->load->view('addBL',$data);
    }

    public function addBL_do()
    {
        $tmp = $this->input->post('tmp');
        $blId = $this->input->post('blId');
        $userId = $this->input->post('userId');
        $typeId = $this->input->post('typeId');
        $fengxianzhi = $this->input->post('fengxianzhi');
        $bingli = $this->input->post('bingli');
        $bingliName = $this->input->post('bingliName');
        $content = $this->input->post('content');


//        $blId=1;
//        $userId=1;
//        var_dump($tmp);die;
        $info =array(
            'blId'=>$blId,
            'name'=>$bingliName,
            'content'=>$content,
            'type'=>$typeId,
            'bingli'=>$bingli
        );
        $data['statusTable']=$this->admin_model->insertBingLi($info);


        $r = explode('|',$tmp);

            for($i=0;$i<((sizeof($r)-1)/5);$i++)
            {
                $j=$i*5;
                if($r[$j]=="")
                    break;
                else{
                    $info =array(
                        'blId'=>$blId,
                        'weidian'=>$r[$j],
                        'pingjia'=>$r[$j+1],
                        'yanjiujiazhi'=>$r[$j+2],
                        'jiyinxing'=>$r[$j+3],
                        'jieguo'=>$r[$j+4],
                        'userId'=>$userId
                    );
//                    var_dump($info);
                    $data['statusTable']=$this->admin_model->insertTable($info);
                }

            }
//        die;
        $infoFXZ =array(
            'blId'=>$blId,
            'userId'=>$userId,
            'fengxianzhi'=>$fengxianzhi,
        );
        $data['statusFXZ']=$this->admin_model->insertFXZ($infoFXZ);

        $json = json_encode($data);
        print_r($json);
    }


    public function delete()
    {
        $blId = $this->input->post('blId');
        $userId = $this->input->post('userId');
        $data['status'] = $this->admin_model->deleteTable($blId,$userId);
        $data['status'] = $this->admin_model->deleteFXZ($blId,$userId);
        $data['status'] = $this->admin_model->deleteBL($blId);
        $json=json_encode($data);
        print_r($json);
    }



}
?>
















