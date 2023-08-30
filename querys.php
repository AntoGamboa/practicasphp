<?php
    class querys
    {
        private $instConnection;
        
        public function __construct()
        {   
            require_once "dateconnect.php";
            $this->instConnection=new mysqli($host_name,$user,$password,$NameBD);
            if($this->instConnection->connect_errno)
            {
               echo" <script>alert('Error al conectarse')</script>";
            }
            $this->instConnection->set_charset("utf8");
            $this->instConnection->select_db("$NameBD") or die("no se ah encontrado la base de datos");
        }
        public function Create(autor $register)
        {
            $codaut=$register->getCod_autor();
            $nameaut=$register->getNombre();
            $nacion=$register->getNacion();
            $query="insert into autor (cod_autor,nombre,nacion) values('$codaut','$nameaut','$nacion')";
           
            if(mysqli_query($this->instConnection,$query))
            {
                echo "<script>alert('registro realizado con exito')</script>";
            }
            else
            {
                
                echo "<script>alert('Error al realizar el registro')</script>";

            }
            
        }
        public function Read($codefind)
        {
            $query = "select * from autor where cod_autor = '$codefind'";
            $request = mysqli_query($this->instConnection, $query);
            if($requestreturned = mysqli_fetch_array($request, MYSQLI_ASSOC))
            {
                return $requestreturned;
            }
            else
            {
                echo "<script>alert('registro inexistente')</script>";

            }
           
        }
        public function update(autor $update)
        {
            $codeaut=$update->getCod_autor();
            $nameautor=$update->getNombre();
            $nacion=$update->getNacion();
            $query=<<<eot
                update autor set nombre='$nameautor',nacion='$nacion' where cod_autor='$codeaut'
            eot;
            
            if(mysqli_query($this->instConnection,$query))
            {
                echo "<script>alert('actualizacion exitosa')</script>";
                
            }

        }
        public function Delete($codedelete)
        {
            $query=<<<eot
                delete from autor where cod_autor = '$codedelete'
            eot;
            if(mysqli_query($this->instConnection,$query))
            {
                $resultado=mysqli_affected_rows($this->instConnection);
                echo "<script>alert('eliminacion exitosa filas afectadas $resultado')</script>";
                
            }

        }


    }

?>