<?php
    class Backend_Model extends Model
    {
        function __construct()
        {
            parent::__construct();//dong nay ha dan den xuat ra 2 dong
            echo "Đây là frontend model";
        }
        function doLogin(){
            // echo $_POST[]
            $e = $_POST['email'];
            $p = $_POST['pass'];
            $sql = "SELECT * FROM users WHERE status = 1 AND email = '".$e."' AND password = '".sha1($p)."' AND role = 'admin'";
            $result = $this->getQueryOne($sql);

            return $result;
        }
        function mCatAdd(){
            $cat = array(
                'category_name' => $_POST['cat_name'],
                'parent' => $_POST['parent'],
                'status' =>$_POST['status']
            );
            $this->addRecord('category', $cat);
        }
        function mEditCat($id){
            $cat = array(
                'category_name' => $_POST['cat_name'],
                'parent' => $_POST['parent'],
                'status' =>$_POST['status']
            );
            $this->editRecord('category', $id, $cat);
        }

        function doEditOrd($id){
            $ord = array(
                'id' => $_POST['ord_id'],
                'fullname' => $_POST['ord_cus'],
                'address' =>$_POST['ord_addr'],
                'email' => $_POST['ord_email'],
                'phone' => $_POST['ord_phone'],
                'status' => $_POST['status'],
            );
            $this->editRecord('orders', $id, $ord);
        }
        function doEditUser($id){
            $user = array(
                'role' => $_POST['role'],
                'email' => $_POST['email'],
                'password' => sha1($_POST['password']),
                'name' => $_POST['name'],
                'phone' => $_POST['phone']
            );
            $this->editRecord('users', $id, $user);
        }
        function doEditNv($id){
            $nv = array(
                'email' => $_POST['email'],
                'password' => sha1($_POST['password']),
                'name' => $_POST['name'],
                'phone' => $_POST['phone']
            );
            $this->editRecord('users', $id, $nv);
        }
        function doEditNew($id){
            $new = array(
                'title' => $_POST['title'],
                'short_description' => $_POST['short_description'],
                'content' => $_POST['content'],
            );
            $this->editRecord('news', $id, $new);
        }

        function doPrdAdd(){
            $i = "temp.png";
            if($_FILES['image']['size']==0){
                echo $_FILES['image']['error'];
            }else{
                $file = $_FILES["image"];
                $i = $file['name'];
                $u = new Upload();
                $u ->doUpload($file);
            }
            $prd = array(
                'product_name' => $_POST['prd_name'],
                'price' => $_POST['price'],
                'product_detail' =>$_POST['detail'],
                'product_category' => $_POST['category'],
                'image' => $i,
                'status' => $_POST['status'],
                'created_at' => date("Y-m-d H:i:s")
            );
            $this->addRecord('products', $prd);
        }
        function doOrdAdd(){
            $ord = array(
                'id' => $_POST['ord_id'],
                'fullname' => $_POST['ord_cus'],
                'address' =>$_POST['ord_addr'],
                'email' => $_POST['ord_email'],
                'phone' => $_POST['ord_phone'],
                'status' => $_POST['status'],
            );
            $this->addRecord('orders', $ord);
        }
        function doUserAdd(){
            $user = array(
                'role' => $_POST['role'],
                'email' => $_POST['email'],
                'password' => sha1($_POST['password']),
                'name' => $_POST['name'],
                'phone' => $_POST['phone']
            );
            $this->addRecord('users', $user);
        }
        function doNvAdd(){
            $user = array(
                'email' => $_POST['email'],
                'password' => sha1($_POST['password']),
                'name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'role' => 'nv'
            );
            $this->addRecord('users', $user);
        }
        function doNewAdd(){
            $new = array(
                'title' => $_POST['title'],
                'short_description' => $_POST['short_description'],
                'content' => $_POST['content'],
            );
            $this->addRecord('news', $new);
        }
        function doEditPrd($id){
            $prd = array(
                'product_name' => $_POST['prd_name'],
                'price' => $_POST['price'],
                'product_detail' =>$_POST['detail'],
                'product_category' => $_POST['category'],

                'status' => $_POST['status'],
                'created_at' => date("Y-m-d H:i:s")
            );
            if($_FILES['image']['size']!=0){
                $file = $_FILES["image"];
                $i = $file['name'];
                $prt['image'] = $i;
                $u = new Upload();
                $u ->doUpload($file);
            }
            
            $this->editRecord('products', $id, $prd);
        }
        public function m_getDetailorder($id){
            $sql = "SELECT * FROM order_details, products WHERE product_id = id and order_details.status = 1 and order_id = $id";
            $result = $this->getQueryAll($sql);
            return $result;
        }
    }
?>