<?php
    class Uri
    {
        function __construct()//ham tu dong thuc hien khi khoi tao oject cua class Uri
        {
            $uri=$_SERVER['REQUEST_URI'];//lay duong dan tren thanh tim kiem
            $uri=rtrim($uri,'/');//xoa dau / o cuoi duong dan
            $uri=explode('/',$uri);//chia chuoi dia chi thanh mang moi phan tu cach nhau boi dau /
            while(count($uri)>0 && $uri[0] != "index.php")
            {
                $uri=array_slice($uri,1);
            }
            /*
                vong lap chay khi mang uri > 0 va uri0 khac index.php; 
                mang uri = mang uri cat bo phan tu dau tien
            */
            print_r($uri);//in mang uri de kiem tra xem ket qua

            if(!isset($uri[1]))// kiem tra ko ton tai uri1 tuc la chi co index.php hoac ko
            {
                require "controllers/frontend.php";//nhun file frontend.php trong controllers vao
                require "models/frontend_model.php";//nhun file frontend_model.php trong models vao
                $controller = new Frontend;//khoi tao object vs class Frontend
                
                $controller->index();//goi phuong thuc trong class Frontend
                return false;//dung de dung trong truong hop dieu kien dung, neu ko co return se loi dong 31
            }
            /*
                dung de chay lenh khi nguoi dung nhap dia chi co index.php hoac ko;
            */

            $file="controllers/".$uri[1].".php";//tao bien file voi dia chi truyen vao dung de truy cap phuong thuc uri1
            if(file_exists($file))//kiem tra file co ton tai hay ko
            {
                require $file;//neu co se nhun file uri1.php vao trang uri
            }
            else //neu ko ton tai file 
            {
                require "controllers/error.php";//nhun file loi vao trang uri
                $controller=new _Error();//tao doi tuong controller trong class loi
                return false;//neu ko co file va tao loi cac lenh sau se ko duoc chay
            }
            /*
                truong hop tiep theo la co class uri1 va phuong thuc cua uri1 
            */
            $controller=new $uri[1];//khoi tao doi tuong trong class #uri1
            $controller->loadModel($uri[1]);
            if(isset($uri[2])){
                 if($uri[1] == "backend"  && $uri[2]!="doLogin" && $uri[2]!="login" && !isset($_SESSION['admin']))
                {
                    header("Location:http://localhost/doan/index.php/backend/login");
                }
            }

            if(isset($uri[3]))
            {
                if(method_exists($controller,$uri[2]))
                {
                    call_user_func_array(array($controller,$uri[2]),array_slice($uri,3));
                }
                else {
                    echo "Phương thức không tồn tại";
                    echo "1";
                }
            }
            else 
            {
                if(isset($uri[2]))
                {
                   
                    $f = $uri[2];
                    if(method_exists($controller,$f))
                    {  
                        
                        $controller->$f();
                    }
                    else 
                    {
                        echo "Phương thức không tồn tại";
                        echo "2";
                    }
                }
                else 
                {
                    $controller->index();
                }
            }
        }
    }
?>