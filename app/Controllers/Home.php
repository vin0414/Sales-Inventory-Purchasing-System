<?php

namespace App\Controllers;
use App\Libraries\Hash;
class Home extends BaseController
{
    private $db;
    public function __construct()
    {
        helper(['form']);
        $this->db = db_connect();
    }
    public function index()
    {
        //application details
        $appModel = new \App\Models\appModel();
        $about = $appModel->first();
        //logo
        $logoModel = new \App\Models\logoModel();
        $logo = $logoModel->first();
        
        $data = ['about'=>$about,'logo'=>$logo];
        return view('welcome_message',$data);
    }

    public function auth()
    {
        date_default_timezone_set('Asia/Manila');   
        //check the credentials
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        //validation
        $validation = $this->validate([
            'username'=>'required',
            'password'=>'required|min_length[8]|max_length[16]'
        ]);

        if(!$validation)
        {
            //application details
            $appModel = new \App\Models\appModel();
            $about = $appModel->first();
            //logo
            $logoModel = new \App\Models\logoModel();
            $logo = $logoModel->first();
            return view('welcome_message',['validation'=>$this->validator,'about'=>$about,'logo'=>$logo]);
        }
        else
        {
            if( !preg_match( '/[^A-Za-z0-9]+/', $password))
            {
                session()->setFlashdata('fail','Password must contain at least one number and one uppercase and lowercase letter');
                return redirect()->to('/')->withInput();
            }
            else
            {
                $accountModel = new \App\Models\accountModel();
                $account = $accountModel->WHERE('Username',$username)->first();
                if(empty($account['accountID']))
                {
                    session()->setFlashdata('fail','Account is not registered. Please contact System Administrator');
                    return redirect()->to('/')->withInput();
                }
                else
                {
                    $check_password = Hash::check($password, $account['Password']);
                    if(empty($check_password))
                    {
                        session()->setFlashdata('fail','Invalid Username or Password!');
                        return redirect()->to('/')->withInput();
                    }
                    else
                    {
                        session()->set('loggedUser', $account['accountID']);
                        session()->set('fullname', $account['Fullname']);
                        session()->set('role',$account['Role']);
                        session()->set('designation',$account['Designation']);
                        if($account['Role']=="Administrator"||$account['Role']=="administrator")
                        {
                            return redirect()->to('admin/overview');
                        }
                        else
                        {
                            return redirect()->to('user/overview');
                        }
                    }
                }
            }
        }
    }

    public function logout()
    {
        if(session()->has('loggedUser'))
        {
            session()->remove('loggedUser');
            session()->destroy();
            session()->setFlashdata('fail','You are logged out!');
            return redirect()->to('/?access=out')->withInput();
        }
    }

    public function forgotPassword()
    {
        return view('forgot-password');
    }
    
}
