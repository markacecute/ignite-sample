<?php

namespace App\Controllers;

use App\Models\MarkModel;

class Home extends BaseController
{
    public function index()
    {
        $db = new MarkModel();
        $data['mark'] = $db->query('SELECT * FROM hotdog')->getResult();
        return view('home', $data);
    }

    public function get_data()
    {
        $db = new MarkModel();
        $mark = $db->query('SELECT * FROM hotdog')->getResult();
        return json_encode($mark);
    }

    public function add() {
        $db = new MarkModel();
        $data = [
            'class' => $this->request->getVar('mark')
        ];
        $haha = $db->save($data);
        if($haha) {
            return redirect()->to('/');
        }
    }

    public function del($id) {
        $db = new MarkModel();        
        $mama = $db->delete(['id' => (int)$id]);
        if($mama) {
            return redirect()->to('/');
        }
    }

    public function update($id) {
        $db = new MarkModel();
        $db->set('class', $this->request->getVar('up_data'));
        $db->where('id', $id);
        $result = $db->update();
       
        if($result) {
            return redirect()->to('/');
        }
        
    }
}
