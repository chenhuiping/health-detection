<?php

class Check extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('check_model');
    }

    /*页面 主页*/
    public function index($userId)
    {
        $data['typeList']= $this->check_model->getType();
        $data['fxz'] =$this->check_model->getFXZByUserId($userId);
            for($i=0;$i<count( $data['fxz']);$i++)
            {
                $data['fxz'][$i]['bl'] = $this->check_model->getBLNameByBLId( $data['fxz'][$i]['blId']);
                $data['fxz'][$i]['table'] = $this->check_model->getTableByBlId( $data['fxz'][$i]['blId'],$userId);
            }
        $this->load->view('check',$data);
    }

    public function jyjiance($userId)
    {
        $data['fxz'] =$this->check_model->getFXZByUserId($userId);
        for($i=0;$i<count( $data['fxz']);$i++)
        {
            $data['fxz'][$i]['bl'] = $this->check_model->getBLNameByBLId( $data['fxz'][$i]['blId']);
            $y =2.00;
            $precent=  $data['fxz'][$i]['fengxianzhi'];
            $data['fxz'][$i]['pfxz']=(( $precent / $y)*100)."%";

        }
//        var_dump( $data['fxz']);die;
        $this->load->view('jyjiance',$data);
    }

    public function jyjianceTable($userId)
    {
        $data['fxz'] =$this->check_model->getFXZByUserId($userId);
        for($i=0;$i<count( $data['fxz']);$i++)
        {
            $data['fxz'][$i]['bl'] = $this->check_model->getBLNameByBLId( $data['fxz'][$i]['blId']);
            $y =2.00;
            $precent=  $data['fxz'][$i]['fengxianzhi'];
            $data['fxz'][$i]['pfxz']=(( $precent / $y)*100)."%";

        }
        $this->load->view('jyjianceTable',$data);
    }





}
?>
















