<?php
    class Controller
    {
        function __construct()//chay ham khi tao doi tuong trong class Controller
        {
            $this->load = new View();//
        }
        function loadModel($name)
        {
            $path = "models/".$name."_model.php";
            if(file_exists($path))
            {
                require $path;
                $modelName = $name."_Model";
                $this->model = new $modelName;
            }
            else {
                echo "Model không tồn tại";
            }
        }
    }
?>