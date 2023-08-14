

    
<?php
    class Frontend_Model extends Model
    {
        function __construct()
        {
            parent::__construct();//dong nay ha dan den xuat ra 2 dong
            echo "Đây là frontend model";
        }
        public function m_getNewProducts(){
            $sql = "SELECT * FROM products WHERE status = 1 ORDER BY created_at DESC LIMIT 0,6";
            $result = $this->getQueryAll($sql);
            return $result;

        }

        public function m_getSaleProducts(){
            $sql = "SELECT * FROM products WHERE status = 1 and sale = 1 LIMIT 0,6";
            $result = $this->getQueryAll($sql);
            
            return $result;

        }

        public function m_getBestsallerProducts(){
            $sql = "SELECT product_id, product_name, image, price, sum(qty) as total_amount 
            FROM products, order_details WHERE products.id = order_details.product_id 
            GROUP BY product_id ORDER BY total_amount DESC LIMIT 0,6";
            $result = $this->getQueryAll($sql);
            
            return $result;

        }


        
        public function m_getDetail($id){
            $sql = "SELECT * FROM products WHERE status = 1 and id = $id";
            $result = $this->getQueryOne($sql);
            return $result;
        }

        public function m_getDetailnew($id){
            $sql = "SELECT * FROM news WHERE status = 1 and id = $id";
            $result = $this->getQueryOne($sql);
            return $result;

        }

        public function m_getCategory(){
            $sql = "SELECT * FROM category WHERE status = 1 and trash = 0";
            $result = $this->getQueryAll($sql);
            
            return $result;

        }

        function m_getProductsByCatId($CatId){
            $sql = "SELECT * FROM products WHERE status = 1 and trash = 0 and product_category = $CatId";
            $result = $this->getQueryAll($sql);
            
            return $result;

        }
        function m_getProductsByCatIdparent($CatId){
            $sql = "SELECT * FROM products WHERE product_category in (select id FROM category where parent = $CatId) and  status = 1 and trash = 0";
            $result = $this->getQueryAll($sql);
            return $result;
        }
        // function m_getProductsByParent($parent){
        //     $sql = "SELECT * FROM products WHERE status = 1 and trash = 0 and id = $parent";
        //     $result = $this->getQueryAll($sql);
        //     return $result;
        // }

        function doRegister(){
            $user = array(
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'address' => $_POST['address'],
                'password' => sha1($_POST['pass']),
                // 
                'created_at' => date("Y-m-d H:i:s")
            );
            $_SESSION['check'] = 1;
            $returnname = null;
            $ktname = "SELECT * FROM users WHERE name = "."'".$user['name']."'";            
            $returnname = $this->getQueryAll($ktname);
            // echo $returnname;
            // print_r($returnname);
            // var_dump($returnname);
            if($returnname!=null){
                ?>
                <script>
                    alert("Tên của bạn đã bị trùng vui lòng nhập lại tên mới!")
                    window.location = "<?= URL ?>index.php/frontend/register";
                </script>
                <?php
                $_SESSION['check'] = 0;
            }
            $returnemail = null;
            $ktname = "SELECT * FROM users WHERE email = "."'".$user['email']."'";     
            // echo $ktname;       
            $returnemail = $this->getQueryAll($ktname);
            // echo $returnname;
            // print_r($returnname);
            // var_dump($returnname);
            if($returnemail!=null){
                ?>
                <script>
                    alert("Email của bạn đã được đăng ký!")
                    window.location = "<?= URL ?>index.php/frontend/register";
                </script>
                <?php
                 $_SESSION['check'] = 0;

            }
            $returnphone = null;
            $ktname = "SELECT * FROM users WHERE phone = "."'".$user['phone']."'";            
            $returnphone = $this->getQueryAll($ktname);
            // echo $returnname;
            // print_r($returnname);
            // var_dump($returnname);
            if($returnphone!=null){
                ?>
                <script>
                    alert("Số điện thoại của bạn đã có người đăng ký!")
                    window.location = "<?= URL ?>index.php/frontend/register";
                </script>
                <?php
                $_SESSION['check'] = 0;
            }
            // $returnname = null;
            $re_pass = sha1($_POST['pass-repeat']);
            if($user['password']!=$re_pass){
                ?>
                <script>
                    alert("Password không khớp! Vui lòng nhập lại");
                    window.location = "<?= URL ?>index.php/frontend/register";
                </script>
                <?php
                $_SESSION['check'] = 0;
            }
            if($_SESSION['check']!=0){
                ?>
                    <script>
                    alert("Đăng ký tài khoản thành công!");
                    window.location = "<?= URL ?>index.php";
                </script>
                <?php
                $this->addRecord("users", $user);
            }
        }

        
        public function runlogin(){
            $u = $_POST["user"];
            $p = $_POST["pass"];
            $sql = "SELECT * FROM user WHERE status = 1 AND email = '$u' AND password = '".sha1($p)."'";
            $r = $this->getQueryOne($sql);
        }
        

        public function m_getAllProducts(){
            $sql = "SELECT * FROM products WHERE status = 1";
            $result = $this->getQueryAll($sql);
            
            return $result;
        }
        function testFrontendModel()
        {
            $a = array("hello", "xin chào", "ciao");
            return $a;
        }
        function doLogin(){
            $e = $_POST['email'];
            $p = $_POST['pass'];
            $sql = "SELECT * FROM users WHERE status = 1 AND email = '$e' AND password = '".sha1($p)."'";
            $result = $this->getQueryOne($sql);
            return $result;
        }
        // public function m_Cart(){
        //     $c = array();
        //     $n = count($_SESSION['cart']);
        //     $_SESSION['cart'] = array_values($_SESSION['cart']);
        //     // print_r($_SESSION['cart']) ;
        //     $_SESSION['amount'] = array_values($_SESSION['amount']);
        //     for($i = 0; $i <$n; $i++){
        //         // echo $i;echo $n;
        //         $sql = "SELECT * FROM products WHERE id = ".$_SESSION['cart'][$i];
        //         echo $sql;
        //         $list = $this->getQueryOne($sql);
        //         array_push($c, $list);
        //     }
        //     return $c;
        // }
        function m_cart()
        {

            $c=array();
            if($_SESSION['cart']!=null){
                $n=count($_SESSION['cart']);
                $_SESSION['cart']=array_values($_SESSION['cart']);
            }else{$n = 0;}
            $_SESSION['amuont']=array_values($_SESSION['amount']);
            for($i=0;$i<$n;$i++)
            {
                // if($i == 1){
                //     continue;
                // }
                $sql=" SELECT * from products where id=".$_SESSION['cart'][$i];
                $danhsach=$this->getQueryOne($sql);
                array_push($c,$danhsach);
                
            }
            return $c;
        }
        function mAddCartToOrder(){
            $catorder = array(
                'fullname' => $_SESSION['fullname'],
                'address' => $_SESSION['address'],
                'email' => $_SESSION['email'],
                'phone' => $_SESSION['phone']
            );
            print_r($catorder);
            $this->addRecord('orders', $catorder);
        }
        public function m_saveCart(){
            $order = array();
            $order['order_date'] = Date('Y-m-d H:i:s');
            $order['fullname'] = $_POST['name'];
            $order['address'] = $_POST['address'];
            $order['email'] = $_POST['email'];
            $order['phone'] = $_POST['phone'];
            $this->addRecord("orders", $order);
            $lastId = $this->getLastId("orders");
            $cart = $_SESSION['cart'];
            for($i = 0; $i<count($cart);$i++){
                $order_detail = array();
                $order_detail['order_id'] = $lastId['id'];
                $order_detail['product_id'] = $_SESSION['cart'][$i];
                $order_detail['qty'] = $_SESSION['amountcart'][$i];
                $this->addRecord("order_details", $order_detail);
            }
            unset($_SESSION['cart']);
            header("Location:../frontend/cart");
        }
    }
?>