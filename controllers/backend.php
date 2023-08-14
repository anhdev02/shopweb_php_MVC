<?php
    class Backend extends Controller// class Frontend ke thua tu class Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->p = new Paginator();
            // require "template/template.html";
            // $index = "template/template.html";
            // echo $index;
        }
        function index(){
            $data = array();
            if(!isset($_SESSION['admin'])||$_SESSION['admin']== false){
                header('Location:../index.php/backend/login');
                // exit();
                $this->load->view("index.php/backend/login", $data);
            }else{
                $data['page'] = "backend/pages/home";
                $this->load->view("backend/index", $data);
            }
        }
        function detail($id){
            $data = array();
            $data['detail'] = $this->model->m_getDetailorder($id);
            $data['page'] = "backend/pages/order/detail";
            $this->load->view("backend/index", $data);
        }
        function catList1($page){
            $data = array();
            $data['category'] = $this->model->getData('category',5,$page);
            $data['page'] = "backend/pages/category/list";
            $this->load->view("backend/index", $data);
        }
        function prdList1(){
            $data = array();
            $data['products'] = $this->model->getData1('products');
            $data['page'] = "backend/pages/product/list";
            $this->load->view("backend/index", $data);
        }
        
        function prdList($page=1){
            $_SESSION['page'] = null;
            $ur=$_SERVER['REQUEST_URI'];//lay duong dan tren thanh tim kiem
            $ur=rtrim($ur,'/');//xoa dau / o cuoi duong dan
            $ur=explode('/',$ur);
            if(isset($ur[5])){
                $_SESSION['page'] = $ur[5];
            }
            $prd = $this->model->getRecordByTrash('products',0);
            $m = count($prd);
            $config = array(
                'base_url'=>URL."index.php/backend/prdList",
                'total_rows'=>$m,
                'per_page'=>5,
                'cur_page'=>$page
            );
            $this->p->init($config);
            $data = array();
            $data['allPrd'] = $prd;
            $data['products'] = $this->model->getData('products', $config['per_page'], $page);
            if($this->model->getRecordByTrash('products',1)!=null){
                $data['trash'] = count($this->model->getRecordByTrash('products',1));
            }else{
                $data['trash'] = 0;
            }
            $data['page'] = "backend/pages/product/list";
            $data['paginator'] = $this->p->createLinks();
            $this->load->view("backend/index", $data);
        }
        function orderList($page=1){
            $_SESSION['page'] = null;
            $ur=$_SERVER['REQUEST_URI'];//lay duong dan tren thanh tim kiem
            $ur=rtrim($ur,'/');//xoa dau / o cuoi duong dan
            $ur=explode('/',$ur);
            if(isset($ur[5])){
                $_SESSION['page'] = $ur[5];
            }
            $ord = $this->model->getRecordByTrash('orders',0);
            $n = count($ord);
            $config = array(
                'base_url'=>URL."index.php/backend/orderList",
                'total_rows'=>$n,
                'per_page'=>5,
                'cur_page'=>$page
            );
            $this->p->init($config);
            $data = array();
            $data['allOrd'] = $ord;
            $data['orders'] = $this->model->getData('orders', $config['per_page'], $page);
            $data['page'] = "backend/pages/order/list";
            $data['paginator'] = $this->p->createLinks();
            $this->load->view("backend/index", $data);
        }
        function userList($page=1){
            $_SESSION['page'] = null;
            $ur=$_SERVER['REQUEST_URI'];//lay duong dan tren thanh tim kiem
            $ur=rtrim($ur,'/');//xoa dau / o cuoi duong dan
            $ur=explode('/',$ur);
            if(isset($ur[5])){
                $_SESSION['page'] = $ur[5];
            }
            $user = $this->model->getRecordByTrash('users',0);
            $n = count($user);
            $config = array(
                'base_url'=>URL."index.php/backend/userList",
                'total_rows'=>$n,
                'per_page'=>5,
                'cur_page'=>$page
            );
            $this->p->init($config);
            $data = array();
            $data['allUser'] = $user;
            $data['users'] = $this->model->getData('users', $config['per_page'], $page);
            $data['page'] = "backend/pages/user/list";
            $data['paginator'] = $this->p->createLinks();
            $this->load->view("backend/index", $data);
        }
        function nvList($page=1){
            $nv = $this->model->getRecordByRole('users',0);
            $n = count($nv);
            $config = array(
                'base_url'=>URL."index.php/backend/nvList",
                'total_rows'=>$n,
                'per_page'=>5,
                'cur_page'=>$page
            );
            $this->p->init($config);
            $data = array();
            $data['allUser'] = $nv;
            $data['nv'] = $this->model->getData2('users', $config['per_page'], $page);
            $data['trash'] = count($this->model->getRecordByRole('users',1));
            $data['page'] = "backend/pages/nv/list";
            $data['paginator'] = $this->p->createLinks();
            $this->load->view("backend/index", $data);
        }
        function newList($page=1){
            $_SESSION['page'] = null;
            $ur=$_SERVER['REQUEST_URI'];//lay duong dan tren thanh tim kiem
            $ur=rtrim($ur,'/');//xoa dau / o cuoi duong dan
            $ur=explode('/',$ur);
            if(isset($ur[5])){
                $_SESSION['page'] = $ur[5];
            }
            $new = $this->model->getRecordByTrash('news',0);
            $n = count($new);
            $config = array(
                'base_url'=>URL."index.php/backend/newList",
                'total_rows'=>$n,
                'per_page'=>5,
                'cur_page'=>$page
            );
            $this->p->init($config);
            $data = array();
            $data['allNew'] = $new;
            $data['news'] = $this->model->getData('news', $config['per_page'], $page);
            if($this->model->getRecordByTrash('news',1)!=null){
                $data['trash'] = count($this->model->getRecordByTrash('news',1));
            }else{
                $data['trash'] = 0;
            }
            $data['page'] = "backend/pages/new/list";
            $data['paginator'] = $this->p->createLinks();
            $this->load->view("backend/index", $data);
        }
        public function login(){
            $data = array(
                // 'mainmenu' => $this->model->getAllMenu(),
                // 'category' => $this->model->m_getCategory(),
                "page" => "backend/login"
            );
            $this->load->view("backend/login", $data);
        }
        public function doLogin(){
            $user = array();
            $user = $this->model->doLogin();
            $u = $_POST['email'];
            $p = $_POST['pass'];
            if(isset($_POST['remember'])){
                setcookie("emailadmin", $u, time()+3600);
                setcookie("passadmin", $p, time()+3600);
            }
            if($user!=null){
                $_SESSION['admin'] = $user['name'];
                ?>
                <script>
                    alert("Đăng nhập thành công!");
                    window.location = "<?= URL ?>index.php/backend/index";
                </script>
                <?php
                // header('Location:../backend/index');
            }
            else{
                ?>
                <script>
                     alert("Tài khoản hoặc mật khẩu không chính xác!");
                    window.location = "<?= URL ?>index.php/backend/login";
                </script>
                <?php
                // header('Location:../backend/login');
            }
            // print_r($user);
        }
        public function logout(){
            unset($_SESSION['admin']);
            header('Location:../backend/login');
        }
        function catAdd(){
            $data['category']=$this->model->getRecordByTrash('category',0);
            $data['page']="backend/pages/category/add";
            $this->load->view("backend/index",$data);
        }
        function prdAdd(){
            $data['category']=$this->model->getRecordByTrash('category',0);
            $data['products']=$this->model->getRecordByTrash('products',0);
            $data['page']="backend/pages/product/add";
            $this->load->view("backend/index",$data);
        }
        function ordAdd(){
            $data['orders']=$this->model->getRecordByTrash('orders',0);
            $data['page']="backend/pages/order/add";
            $this->load->view("backend/index",$data);
        }
        function userAdd(){
            $data['users']=$this->model->getRecordByTrash('users',0);
            $data['page']="backend/pages/user/add";
            $this->load->view("backend/index",$data);
        }
        function nvAdd(){
            $data['nv']=$this->model->getRecordByRole('users',0);
            $data['page']="backend/pages/nv/add";
            $this->load->view("backend/index",$data);
        }
        function newAdd(){
            $data['news']=$this->model->getRecordByTrash('news',0);
            $data['page']="backend/pages/new/add";
            $this->load->view("backend/index",$data);
        }
        function doCatAdd(){
            $this->model->mCatAdd();
            header('Location:../backend/catList/1');
        }
        function doPrdAdd(){
            $this->model->doPrdAdd();
            header('Location:../backend/prdlist/1');
        }
        function doOrdAdd(){
            $this->model->doOrdAdd();
            header('Location:../backend/orderlist/1');
        }
        function doUserAdd(){
            $this->model->doUserAdd();
            header('Location:../backend/userlist/1');
        }
        function doNvAdd(){
            $this->model->doNvAdd();
            header('Location:../backend/nvlist/1');
        }
        function doNewAdd(){
            $this->model->doNewAdd();
            header('Location:../backend/newlist/1');
        }
        function editCat($id){
            $data = array();
            $data['edit'] = $this->model->getOneRecordByTrash('category', $id,0);
            $data['category']=$this->model->getRecordByTrash('category',0);
            $data['page']="backend/pages/category/edit";
            $this->load->view("backend/index",$data);
        }
        function editPrd($id){
            $data = array();
            $data['product'] = $this->model->getOneRecordByTrash('products', $id,0);
            $data['category']=$this->model->getRecordByTrash('category',0);
            $data['page']="backend/pages/product/edit";
            $this->load->view("backend/index",$data);
        }
        function editOrd($id){
            $data = array();
            $data['edit'] = $this->model->getOneRecordByTrash('orders', $id,0);
            $data['page']="backend/pages/order/edit";
            $this->load->view("backend/index",$data);
        }
        function editUser($id){
            $data = array();
            $data['edit'] = $this->model->getOneRecordByTrash('users', $id,0);
            $data['page']="backend/pages/user/edit";
            $this->load->view("backend/index",$data);
        }
        function editNv($id){
            $data = array();
            $data['edit'] = $this->model->getOneRecordByTrash('users', $id,0);
            $data['page']="backend/pages/nv/edit";
            $this->load->view("backend/index",$data);
        }
        function editNew($id){
            $data = array();
            $data['edit'] = $this->model->getOneRecordByTrash('news', $id,0);
            $data['page']="backend/pages/new/edit";
            $this->load->view("backend/index",$data);
        }

        function doEditCat($id){
            $this->model->mEditCat($id);
            header('Location:../catList/1');
        }
        function doPrdEdit($id){
            $this->model->doEditPrd($id);
            header('Location:../prdList/1');
        }
        function doOrdEdit($id){
            $this->model->doEditOrd($id);
            header('Location:../orderList/1');
        }
        function doUserEdit($id){
            $this->model->doEditUser($id);
            header('Location:../userList/1');
        }
        function doNvEdit($id){
            $this->model->doEditNv($id);
            header('Location:../nvList/1');
        }
        function doNewEdit($id){
            $this->model->doEditNew($id);
            header('Location:../newList/1');
        }
        function delTempCat($id){
            $this->model->DelTempRecord('category', $id);
            header('Location:../catList/'.$_SESSION['page']);

        }
        function delTempPrd($id){
            $this->model->DelTempRecord('products', $id);
            header('Location:../prdList/'.$_SESSION['page']);

        }
        function delTempOrd($id){
            $this->model->DelTempRecord('Orders', $id);
            header('Location:../orderList/1');

        }
        function delTempUser($id){
            $this->model->DelTempRecord('users', $id);
            header('Location:../userList/1');

        }
        function delTempNv($id){
            $this->model->DelTempRecord('users', $id);
            header('Location:../nvList/1');

        }
        function delTempNew($id){
            $this->model->DelTempRecord('news', $id);
            header('Location:../newList/'.$_SESSION['page']);

        }
        function catList($page=1){
            $_SESSION['page'] = null;
            $ur=$_SERVER['REQUEST_URI'];//lay duong dan tren thanh tim kiem
            $ur=rtrim($ur,'/');//xoa dau / o cuoi duong dan
            $ur=explode('/',$ur);
            if(isset($ur[5])){
                $_SESSION['page'] = $ur[5];
            }
            $cat = $this->model->getRecordByTrash('category',0);
            $n = count($cat);
            $config = array(
                'base_url'=> URL."index.php/backend/catList",
                'total_rows'=>$n,
                'per_page'=>5,
                'cur_page'=>$page
            );
            $this->p->init($config);
            $data = array();
            $data['allCat'] = $cat;
            $data['category'] = $this->model->getData('category', $config['per_page'], $page);
            if($this->model->getRecordByTrash('category',1)!=null){
                $data['trash'] = count($this->model->getRecordByTrash('category',1));
            }else{
                $data['trash'] = 0;
            }
            $data['page'] = "backend/pages/category/list";
            $data['paginator'] = $this->p->createLinks();
            $this->load->view("backend/index", $data);
            // $page=$_SERVER['REQUEST_URI'];//lay duong dan tren thanh tim kiem
            // $page=rtrim($page,'/');//xoa dau / o cuoi duong dan
            // $page=explode('/',$page);//chia chuoi dia chi thanh mang moi phan tu cach nhau boi dau /
            // print_r($page);
            // $GLOBALS['pagecat'] = (int)$page[5];
            // var_dump( $GLOBALS['pagecat']);
            // echo  $GLOBALS['pagecat'];
        }
        function trashCatlist($page=1){
            $trashcat = $this->model->getRecordByTrash('category',1);
            if($trashcat!=null){
                $n = count($trashcat);
            }else{
                $n = 0;
            }
            $config = array(
                'base_url'=> URL."index.php/backend/trashCatList",
                'total_rows'=>$n,
                'per_page'=>5,
                'cur_page'=>$page
            );
            $this->p->init($config);
            $data = array();
            $data['allCat'] = $this->model->getRecordByTrash('category',0);
            $data['trash'] = $this->model->getDataTrash('category', $config['per_page'], $page);
            $data['page'] = "backend/pages/category/trash";
            $data['paginator'] = $this->p->createLinks();
            $this->load->view("backend/index", $data);
        }
        function trashPrdlist($page=1){
            $trashprd = $this->model->getRecordByTrash('products',1);
            if($trashprd!=null){
                $n = count($trashprd);
            }else{
                $n = 0;
            }
            $config = array(
                'base_url'=> URL."index.php/backend/trashPrdList",
                'total_rows'=>$n,
                'per_page'=>5,
                'cur_page'=>$page
            );
            $this->p->init($config);
            $data = array();
            $data['allPrd'] = $this->model->getRecordByTrash('products',0);
            $data['trash'] = $this->model->getDataTrash('products', $config['per_page'], $page);
            $data['page'] = "backend/pages/product/trash";
            $data['paginator'] = $this->p->createLinks();
            $this->load->view("backend/index", $data);
        }
        function trashOrdlist(){
            $data = array();
            $data['allOrd'] = $this->model->getRecordByTrash('orders',0);
            $data['page'] = "backend/pages/order/trash";
            $this->load->view("backend/index", $data);
        }
        function trashUserlist(){
            $data = array();
            $data['allUser'] = $this->model->getRecordByTrash('users',0);
            $data['page'] = "backend/pages/user/trash";
            $this->load->view("backend/index", $data);
        }
        function trashNvlist(){
            $data = array();
            $data['allUser'] = $this->model->getRecordByTrash('users',0);
            $data['page'] = "backend/pages/nv/trash";
            $this->load->view("backend/index", $data);
        }
        function trashNewlist($page=1){
            $trashnew = $this->model->getRecordByTrash('news',1);
            if($trashnew!=null){
                $n = count($trashnew);
            }else{
                $n = 0;
            }
            $config = array(
                'base_url'=> URL."index.php/backend/trashNewList",
                'total_rows'=>$n,
                'per_page'=>5,
                'cur_page'=>$page
            );
            $this->p->init($config);
            $data = array();
            $data['allNew'] = $this->model->getRecordByTrash('news',0);
            $data['trash'] = $this->model->getDataTrash('news', $config['per_page'], $page);
            $data['page'] = "backend/pages/new/trash";
            $data['paginator'] = $this->p->createLinks();
            $this->load->view("backend/index", $data);
        }
        function restoreCat($id){
            $this->model->del_restore('category', $id, 0);
            header('Location:../trashCatList');

        }
        function restorePrd($id){
            $this->model->del_restore('products', $id, 0);
            header('Location:../trashPrdList');

        }
        function restoreOrd($id){
            $this->model->del_restore('orders', $id, 0);
            header('Location:../trashOrdList');

        }
        function restoreUser($id){
            $this->model->del_restore('users', $id, 0);
            header('Location:../trashUserList');

        }
        function restoreNv($id){
            $this->model->del_restore('users', $id, 0);
            header('Location:../trashNvList');

        }
        function restoreNew($id){
            $this->model->del_restore('news', $id, 0);
            header('Location:../trashNewList');

        }
        function delCat($id){
            $this->model->del("category", $id);
            header('Location:../trashCatList');

        }
        function delPrd($id){
            $this->model->del("products", $id);
            header('Location:../trashPrdList');

        }
        function delOrd($id){
            $this->model->del("orders", $id);
            header('Location:../trashOrdList');

        }
        function delUser($id){
            $this->model->del("users", $id);
            header('Location:../userList/'.$_SESSION['page']);

        }
        function delNv($id){
            $this->model->del("users", $id);
            header('Location:../trashNvList');

        }
        function delNew($id){
            $this->model->del("news", $id);
            header('Location:../trashNewList');

        }

        function statusCat($id, $status){
            
            $this->model->status("category", $id, $status);
            /*
                vong lap chay khi mang uri > 0 va uri0 khac index.php; 
                mang uri = mang uri cat bo phan tu dau tien
            */
            //in mang uri de kiem tra xem ket qua
            header("Location:../../catList/".$_SESSION['page']);//.$pagecat
        }
        function statusPrd($id, $status){
            $this->model->status("products", $id, $status);
            header('Location:../../prdList/'.$_SESSION['page']);
        }
        function statusOrd($id, $status){
            $this->model->status("orders", $id, $status);
            header('Location:../../orderList/1');
        }
        function statusUser($id, $status){
            $this->model->status("users", $id, $status);
            header('Location:../../userList/'.$_SESSION['page']);
        }
        function statusNv($id, $status){
            $this->model->status("users", $id, $status);
            header('Location:../../nvList/1');
        }
        function statusNew($id, $status){
            $this->model->status("news", $id, $status);
            header('Location:../../NewList/'.$_SESSION['page']);
        }

       
    }
?>
