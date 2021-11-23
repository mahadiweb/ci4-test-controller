<?php

namespace App\Controllers;

class Ci4crud extends BaseController
{
	public function __construct(){
		$this->db = \Config\Database::connect();
	}
    public function index()
    {
    	$db = \Config\Database::connect();
    	$showdata['showdata'] = $db->table("data")->get()->getResultArray();
    	//echo "<pre>";
    	//print_r($showdata);
        return view('crud/index',$showdata);
    }
    public function add(){
    	return view('crud/add');
    }
    public function store(){
    	$db = \Config\Database::connect();
    	//print_r($_POST);
    	$name = $this->request->getPost('name');
    	$pass = $this->request->getPost('password');

    	$data = array(
    		'name' => $name,
    		'password' => $pass
    	);
    	$query = $db->table('data')->insert($data);
    	if ($query) {
    		return redirect()->to('/crud');
    	}
    }
    public function edit($id){
    	$db = \Config\Database::connect();
    	$query['editdata'] = $db->table('data')->where(['id'=> $id])->get()->getResultArray();
    	return view('crud/edit',$query);
    	//print_r($query);
    }
    public function update(){
    	$db = \Config\Database::connect();
    	//print_r($_POST);
    	$name = $this->request->getPost('name');
    	$pass = $this->request->getPost('password');
    	$eid = $this->request->getPost('eid');

    	$data = array(
    		'name' => $name,
    		'password' => $pass
    	);
    	$query = $db->table('data')->where(['id'=> $eid])->set($data)->update();
    	if ($query) {
    		return redirect()->to('/crud');
    	}
    }
    public function delete($id){
    	//$db = \Config\Database::connect();

    	$query = $this->db->table('data')->delete(['id'=>$id]);
    	if ($query) {
    		return redirect()->to('/crud');
    	}
    }
}
