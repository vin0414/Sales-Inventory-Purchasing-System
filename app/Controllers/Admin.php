<?php

namespace App\Controllers;
use App\Libraries\Hash;
class Admin extends BaseController
{
    private $db;
    public function __construct()
    {
        helper(['form']);
        $this->db = db_connect();
    }

    public function overview()
    {
        //title
        $title = "Overview";
        //application details
        $appModel = new \App\Models\appModel();
        $about = $appModel->first();
        //logo
        $logoModel = new \App\Models\logoModel();
        $logo = $logoModel->first();
        
        $data = ['logo'=>$logo,'about'=>$about,'title'=>$title];
        return view('admin/overview',$data);
    }

    public function products()
    {
        date_default_timezone_set('Asia/Manila'); 
        $now = date('Y-m-d');
        //title
        $title = "Products and Services";
        //application details
        $appModel = new \App\Models\appModel();
        $about = $appModel->first();
        //logo
        $logoModel = new \App\Models\logoModel();
        $logo = $logoModel->first();
        //products
        $productModel = new \App\Models\productModel();
        $product = $productModel->findAll();
        //count
        $total = $productModel->countAllResults();
        //in stock
        $instock = $productModel->WHERE('Qty>',1)->countAllResults();
        //out of stock
        $outstock = $productModel->WHERE('Qty<=',0)->countAllResults();
        //expired
        $expired = $productModel->WHERE('expiryDate <=',$now)->countAllResults();

        $data = ['logo'=>$logo,'about'=>$about,'title'=>$title,
                'product'=>$product,'total'=>$total,
                'instock'=>$instock,'outstock'=>$outstock,'expired'=>$expired];
        return view('admin/products/index',$data);
    }

    public function newProduct()
    {
        //title
        $title = "New Product";
        //application details
        $appModel = new \App\Models\appModel();
        $about = $appModel->first();
        //logo
        $logoModel = new \App\Models\logoModel();
        $logo = $logoModel->first();

        $data = ['logo'=>$logo,'about'=>$about,'title'=>$title];
        return view('admin/products/new-product',$data);
    }

    public function settings()
    {
        //title
        $title = "Settings";
        //application details
        $appModel = new \App\Models\appModel();
        $about = $appModel->first();
        //logo
        $logoModel = new \App\Models\logoModel();
        $logo = $logoModel->first();
        //warehouse
        $warehouseModel = new \App\Models\warehouseModel();
        $list = $warehouseModel->findAll();
        //account expense
        $accountExpenseModel = new \App\Models\accountExpenseModel();
        $expense = $accountExpenseModel->findAll();
        
        $data = ['logo'=>$logo,'about'=>$about,'title'=>$title,'list'=>$list,'expense'=>$expense];
        return view('admin/settings',$data);
    }

    public function newWarehouse()
    {
        //title
        $title = "New Warehouse";
        //application details
        $appModel = new \App\Models\appModel();
        $about = $appModel->first();
        //logo
        $logoModel = new \App\Models\logoModel();
        $logo = $logoModel->first();
        
        $data = ['logo'=>$logo,'about'=>$about,'title'=>$title];
        return view('admin/new-warehouse',$data);
    }

    public function editWarehouse($id)
    {
        //title
        $title = "Edit Warehouse";
        //application details
        $appModel = new \App\Models\appModel();
        $about = $appModel->first();
        //logo
        $logoModel = new \App\Models\logoModel();
        $logo = $logoModel->first();
        //warehouse
        $warehouseModel = new \App\Models\warehouseModel();
        $warehouse = $warehouseModel->WHERE('wID',$id)->first();
        
        $data = ['logo'=>$logo,'about'=>$about,'title'=>$title,'warehouse'=>$warehouse];
        return view('admin/edit-warehouse',$data);
    }

    public function saveWarehouse()
    {
        $warehouseModel = new \App\Models\warehouseModel();
        //data
        $id = $this->request->getPost('id');
        $w_name = $this->request->getPost('warehouse');
        $w_email = $this->request->getPost('email');
        $w_phone = $this->request->getPost('phone');
        $w_address = $this->request->getPost('address');
        $w_status =  $this->request->getPost('status');

        if(empty($id))
        {
            $validation = $this->validate([
                'warehouse'=>'required|is_unique[tblwarehouse.w_Name]',
                'email'=>'required|valid_email|is_unique[tblwarehouse.w_Email]',
                'phone'=>'required|min_length[11]|max_length[11]',
                'address'=>'required',
            ]);

            if(!$validation)
            {
                $title = "New Warehouse";
                //application details
                $appModel = new \App\Models\appModel();
                $about = $appModel->first();
                //logo
                $logoModel = new \App\Models\logoModel();
                $logo = $logoModel->first();
                return view('admin/new-warehouse',['validation'=>$this->validator,'about'=>$about,'logo'=>$logo,'title'=>$title]);
            }
            else
            {
                $w_status = 1;
                $values = ['w_Name'=>$w_name,'w_Address'=>$w_address,'w_Email'=>$w_email,'w_Phone'=>$w_phone,'w_Status'=>$w_status];
                $warehouseModel->save($values);
                session()->setFlashdata('success','Great! Successfully save entry');
                return redirect()->to('admin/settings')->withInput();
            }
        }
        else
        {
            $validation = $this->validate([
                'warehouse'=>'required',
                'email'=>'required|valid_email',
                'phone'=>'required|min_length[11]|max_length[11]',
                'address'=>'required',
            ]);

            if(!$validation)
            {
                $title = "Edit Warehouse";
                //application details
                $appModel = new \App\Models\appModel();
                $about = $appModel->first();
                //logo
                $logoModel = new \App\Models\logoModel();
                $logo = $logoModel->first();
                //warehouse
                $warehouseModel = new \App\Models\warehouseModel();
                $warehouse = $warehouseModel->WHERE('wID',$id)->first();

                return view('admin/edit-warehouse',
                ['validation'=>$this->validator,'about'=>$about,'logo'=>$logo,'title'=>$title,'warehouse'=>$warehouse]);
            }
            else
            {
                $values = ['w_Name'=>$w_name,'w_Address'=>$w_address,'w_Email'=>$w_email,'w_Phone'=>$w_phone,'w_Status'=>$w_status];
                $warehouseModel->update($id,$values);
                session()->setFlashdata('success','Great! Successfully applied changes');
                return redirect()->to('admin/settings')->withInput();
            }
        }
    }

    public function newAccountExpense()
    {
        //title
        $title = "New Account Expense";
        //application details
        $appModel = new \App\Models\appModel();
        $about = $appModel->first();
        //logo
        $logoModel = new \App\Models\logoModel();
        $logo = $logoModel->first();
        
        $data = ['logo'=>$logo,'about'=>$about,'title'=>$title];
        return view('admin/new-account-expense',$data);
    }

    public function editCode($id)
    {
        //title
        $title = "Edit Account Expense";
        //application details
        $appModel = new \App\Models\appModel();
        $about = $appModel->first();
        //logo
        $logoModel = new \App\Models\logoModel();
        $logo = $logoModel->first();
        //get the data
        $accountExpenseModel = new \App\Models\accountExpenseModel();
        $account = $accountExpenseModel->WHERE('expenseID',$id)->first();
        
        $data = ['about'=>$about,'logo'=>$logo,'title'=>$title,'account'=>$account];
        return view('admin/edit-code',$data);
    }

    public function saveAccountExpense()
    {
        $accountExpenseModel = new \App\Models\accountExpenseModel();
        //data
        $id = $this->request->getPost('account_id');
        $code = $this->request->getPost('account_code');
        $details = $this->request->getPost('account_details');
        if(empty($id))
        {
            $validation = $this->validate([
                'account_code'=>'required|is_unique[tblaccount_expense.accountCode]',
                'account_details'=>'required',
            ]);

            if(!$validation)
            {
                //title
                $title = "New Account Expense";
                //application details
                $appModel = new \App\Models\appModel();
                $about = $appModel->first();
                //logo
                $logoModel = new \App\Models\logoModel();
                $logo = $logoModel->first();

                return view('admin/new-account-expense',['validation'=>$this->validator,'about'=>$about,'logo'=>$logo,'title'=>$title]);
            }
            else
            {
                $values = ['accountCode'=>$code,'accountDetails'=>$details];
                $accountExpenseModel->save($values);
                session()->setFlashdata('success','Great! Successfully save entry');
                return redirect()->to('admin/settings')->withInput();
            }
        }
        else
        {
            $validation = $this->validate([
                'account_code'=>'required',
                'account_details'=>'required',
            ]);

            if(!$validation)
            {
                //title
                $title = "Edit Account Expense";
                //application details
                $appModel = new \App\Models\appModel();
                $about = $appModel->first();
                //logo
                $logoModel = new \App\Models\logoModel();
                $logo = $logoModel->first();
                //get the data
                $accountExpenseModel = new \App\Models\accountExpenseModel();
                $account = $accountExpenseModel->WHERE('expenseID',$id)->first();

                return view('admin/edit-code',
                ['validation'=>$this->validator,'about'=>$about,'logo'=>$logo,'title'=>$title,'account'=>$account]);
            }
            else
            {
                $values = ['accountCode'=>$code,'accountDetails'=>$details];
                $accountExpenseModel->update($id,$values);
                session()->setFlashdata('success','Great! Successfully applied changes');
                return redirect()->to('admin/settings')->withInput();
            }
        }
    }

    public function uploadLogo()
    {
        $logoModel = new \App\Models\logoModel();
        //data
        $file = $this->request->getFile('file');
        $originalName = $file->getClientName();
        //move the file
        $file->move('assets/img/',$originalName);
        //check if empty or not
        $logo = $logoModel->first();
        if(empty($logo))
        {
            //save the records
            $values = ['Name'=>$originalName,'File'=>$originalName];
            $logoModel->save($values);
        }
        else
        {
            //update the records
            $values = ['Name'=>$originalName,'File'=>$originalName];
            $logoModel->update($logo['logoID'],$values);
        }
        echo "success";
    }

    public function about()
    {
        $appModel = new \App\Models\appModel();
        //data
        $app_name = $this->request->getPost('app_name');
        $app_details = $this->request->getPost('app_details');
        $app = $appModel->first();
        if(empty($app))
        {
            //save
            $values = ['App_name'=>$app_name,'App_details'=>$app_details];
            $appModel->save($values);
        }
        else
        {
            //update
            $values = ['App_name'=>$app_name,'App_details'=>$app_details];
            $appModel->update($app['systemID'],$values);
        }
        echo "success";
    }

    public function recovery()
    {
        //title
        $title = "Back-Up & Restore";
        //application details
        $appModel = new \App\Models\appModel();
        $about = $appModel->first();
        //logo
        $logoModel = new \App\Models\logoModel();
        $logo = $logoModel->first();
        
        $data = ['logo'=>$logo,'about'=>$about,'title'=>$title];
        return view('admin/recovery',$data);
    }
}