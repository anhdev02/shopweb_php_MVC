<?php
    class Frontend extends Controller// class Frontend ke thua tu class Controller
    {
        public function __construct()
        {
            parent::__construct();
            echo "Day la controller frontend";
            // require "template/template.html";
            // $index = "template/template.html";
            // echo $index;
        }
        function index()
        {
            $this->model = new Frontend_Model;
            $data = array();
            $data['category'] = $this->model->m_getCategory();
            $data['page'] = "frontend/pages/home";
            $data['new_products'] = $this->model->m_getNewProducts();
            $data['saleProduct'] = $this->model->m_getSaleProducts();
            $data['bestsellerProduct'] = $this->model->m_getBestsallerProducts();



            echo "<br>";
            
			//print_r($data['new_products']);

            $this->load->view("frontend/index", $data);


        }
        

        function detail($id){
            $data = array();
            $data['detail'] = $this->model->m_getDetail($id);
            $data['category'] = $this->model->m_getCategory();
            $data['page'] = "frontend/pages/detail";
            $this->load->view("frontend/index", $data);
        }
        function detailnew($id){
            $data = array();
            $data['detailnew'] = $this->model->m_getDetailnew($id);
            $data['category'] = $this->model->m_getCategory();
            $data['page'] = "frontend/pages/detailnew";
            $this->load->view("frontend/index", $data);
        }

        function listProducts($catId){

            $data['category'] = $this->model->m_getCategory();
            $data['products'] =  $this->model->m_getProductsByCatId($catId);
            $data['page'] = "frontend/pages/listProducts";
            $this->load->view("frontend/index", $data);

        }
        function listProductsparent($catId){
            $data['category'] = $this->model->m_getCategory();
            $data['products'] =  $this->model->m_getProductsByCatIdparent($catId);
            $data['page'] = "frontend/pages/listProducts";
            $this->load->view("frontend/index", $data);

        }

        // function list($parent){
        //     $data['category'] = $this->model->m_getCategory();
        //     $data['products'] =  $this->model->m_getProductsByParent($parent);
        //     $data['page'] = "frontend/pages/list";
        //     $this->load->view("frontend/index", $data);
        // }

        function register(){
            $data = array();
            $data['category'] = $this->model->m_getCategory();
            $data['page'] = "frontend/pages/register";
            $this->load->view("frontend/index", $data);
        }

        function doRegister(){
            // $data['page'] = "frontend/pages/register";
            // $data['category'] = $this->model->m_getCategory();
            // $this->load->view("frontend/index", $data);
            $this->model->doRegister();
            // if($_SESSION['check']!=0){
            //     header("location:../frontend/index");
            // }
        }

        function greeting($name,$age)
        {
            echo "Xin chào".$name."Tuoi: ".$age;
        }

        function getFrontendModel()
        {
            $data['list'] = $this->model->testFrontendModel();
            print_r($data['list']);
        }
        function news(){
            $data = array ();
            $data['page'] = "frontend/pages/news";
            $data['all_new'] = $this->model->getData1('news');
            $data['category'] = $this->model->m_getCategory();
            $this->load->view("frontend/index", $data);
        }
        function  products(){
            $data = array ();
            $data['page'] = "frontend/pages/products";
            $data['all_product'] = $this->model->m_getAllProducts();
            $data['category'] = $this->model->m_getCategory();
            $this->load->view("frontend/index", $data);
        }
        function gioithieu(){
            $data = array ();
            $data['page'] = "frontend/pages/gioithieu";
            $data['category'] = $this->model->m_getCategory();
            $this->load->view("frontend/index", $data);
        }
        public function login(){
            $data = array(
                // 'mainmenu' => $this->model->getAllMenu(),
                'category' => $this->model->m_getCategory(),
                "page" => "frontend/pages/login"
            );
            $this->load->view("frontend/index", $data);
        }
        public function doLogin(){
            $user = $this->model->doLogin();
            $u = $_POST['email'];
            $p = $_POST['pass'];
            if(isset($_POST['remember'])){
                setcookie("email", $u, time()+3600);
                setcookie("pass", $p, time()+3600);
            }
            // print_r($user);
            if($user!=null){
                $_SESSION['user'] = $user['name'];
                $_SESSION['fullname'] = $user['name'];
                $_SESSION['address'] = $user['address'];
                $_SESSION['phone'] = $user['phone'];
                $_SESSION['email'] = $user['email'];
                // print_r($user); ?>
                <script>
                     alert("Đăng nhập thành công!");
                    window.location = "<?= URL ?>index.php";
                </script>
                <?php
                // header('Location:../frontend/index');
            }
            else{
                ?>
                <script>
                     alert("Tài khoản hoặc mật khẩu không chính xác!");
                    window.location = "<?= URL ?>index.php/frontend/login";
                </script>
                <?php
                // header('Location:../frontend/login');
            }
        }
        public function logout(){
            unset($_SESSION['user']);
            header('Location:../frontend/index');
        }
        // public function addToCart($id){
        //     if(!isset($_SESSION["cart"])){
        //         $_SESSION['cart'] = array();
        //         $_SESSION['amount'] = array();
        //         $_SESSION['number_of_item'] = 0;
        //     }
        //     $k = array_search($id, $_SESSION['cart']);
        //     print_r($k) ;
        //     if($k == false){
        //         array_push($_SESSION['cart'], $id);
        //         array_push($_SESSION['amount'], 1);
        //         $_SESSION['number_of_item']++;
        //     }
        //     else{
        //         $_SESSION['amount'][$k]++;
        //     }
        //     $data = array();
        //     // $data['mainmenu'] = $this->model->getAllMenu();
        //     $data['cart'] = $this->model->m_Cart();
        //     $data['category'] = $this->model->m_getCategory();
        //     $data['page'] = "frontend/pages/cart/cart";
        //     $this->load->view("frontend/index", $data);

        // }
        // public function cart(){
        //     // $data = array();
        //     if(!isset($_SESSION['cart'])){
        //         $data['cart'] = null;
        //     }else{
        //         $data['cart'] = $this->model->m_Cart();
        //     }
        //     // $data['mainmenu'] = $this->model->getAllMenu();
        //     $data['category'] = $this->model->m_getCategory();
        //     $data['page'] = "frontend/pages/cart/cart";
        //     $this->load->view("frontend/index", $data);

        // }
        function addToCart($id)
        {
            if(!isset($_SESSION['cart']))
            {
                $_SESSION['cart']=array();
                $_SESSION['amount']=array();
                $_SESSION['number_of_item']=0;
                // print_r($_SESSION['cart']);
                // echo "<br>";
                print_r($_SESSION['amount']);
                // echo "<br>";
                // print_r($_SESSION['number_of_item']);
                // echo "<br>";
            }
            $k=array_search($id,$_SESSION['cart']);
            // echo "test";
            // echo $k;
            if($k===false)
            {
                array_push($_SESSION['cart'],$id);
                array_push($_SESSION['amount'],1);
                $_SESSION['number_of_item']++;
                // print_r($_SESSION['cart']);
                // echo "<br>";
                print_r($_SESSION['amount']);
                // echo "<br>";
                // print_r($_SESSION['number_of_item']);
                // echo "<br>";
            }
            else
            {
                $_SESSION['amount'][$k]++;
                // echo  $_SESSION['amount'][$k];
            }
            $data["category"] = $this->model->m_getCategory();
            $data['cart'] = $this->model->m_cart(); 
            $data['page']="frontend/pages/cart/cart";
            header('Location:../index');
            $this->load->view("frontend/index",$data);
        }
        function cart()
        {
            if(!$_SESSION['user'])
            {
                header("Location:../frontend/login");
            }
            else
            {
                if(!isset($_SESSION['cart']))
                {
                    $data['cart']=null;
                }else
                {
                    $data['cart']=$this->model->m_cart();
                }
            $data['category']=$this->model->m_getCategory();
            $data['page']="frontend/pages/cart/cart";
            $this->load->view("frontend/index",$data);
            }
        }
        function AddCartToOrder(){
            $this->model->mAddCartToOrder();
            header('Location:../frontend/delCartfull');
        }
        function cartpay(){
            $data['page']="frontend/pages/cart/cartpay";
            $this->load->view("frontend/pages/cart/cartpay",$data);
        }
        public function delCart($id){
            for($i = 0; $i<count($_SESSION['cart']); $i++){
                if($_SESSION['cart'][$i]==$id){
                    unset($_SESSION['cart'][$i]);
                }
            }
            header("Location:../cart");
        }
        public function delCartfull(){
            unset($_SESSION['cart']);
            header("Location:../frontend/cart");
        }
        public function infoCart(){
            $data = array();
            $data['cart'] = $this->model->m_Cart();
            $data['category'] = $this->model->m_getCategory();
            $data['page'] = "frontend/pages/cart/info_cart";
            $this->load->view("frontend/index", $data);
        }
        public function saveCart(){
            $this->model->m_saveCart();
            $data = array();
            $data['category'] = $this->model->m_getCategory();
            $data['page'] = "frontend/pages/cart/cart";
            $this->load->view("frontend/index", $data);
        }
    }
?>