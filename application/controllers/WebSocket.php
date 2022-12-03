<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebSocket extends CI_Controller
{
    public function index()
    {
        // Загрузка пакетов
        $this->load->add_package_path(FCPATH . 'vendor/takielias/codeigniter-websocket');
        $this->load->library('Codeigniter_websocket');
        $this->load->remove_package_path(FCPATH . 'vendor/takielias/codeigniter-websocket');

        // Запустить сервер
        $this->codeigniter_websocket->set_callback('auth', array($this, '_auth'));
        $this->codeigniter_websocket->set_callback('event', array($this, '_event'));
        $this->codeigniter_websocket->set_callback('roomleave', array($this, '_roomleave'));
        $this->codeigniter_websocket->run();
    }

    public function _auth($datas = null) {
        return (!empty($datas->user_id)) ? $datas->user_id : false;
    }

    public function _event($datas = null) {
        echo 'Hey ! I\'m an EVENT callback'.PHP_EOL;
    }

    public function _roomleave($data = null) {
        // Here you will receive data from the frontend roomleave event trigger.
        echo 'Hey ! I\'m a room leave EVENT callback' . PHP_EOL;
    }
}