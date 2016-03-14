<HTML>
<?php
/*
The MIT License (MIT)

Copyright (c) <2016> <Carlos Alberto Garcia Cobo - carlosgc4@gmail.com>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

	Fecha creacion		= 12-05-2015
	Desarrollador		= CAGC
    Fecha modificacion	= 14-03-2016
	Usuario Modifico	= CAGC

*/

	include "../Class/NabuEvent.php";
?>
<head>
        <meta charset="utf-8">
        <title>Evento Guardar</title>
        <link rel="stylesheet" href="../Styles/nabu.css">
        <link rel="stylesheet" href="../Framework/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../Framework/Datagrid/lib/js/themes/cobo/jquery-ui.custom.css">
        
      
        <link rel="stylesheet" href="../Framework/font-awesome/css/font-awesome.min.css">
        <script src="../Framework/jquery/dist/jquery.min.js"></script>
        <script src="../Framework/jquery-ui/jquery-ui.min.js"></script>
        <script src="../Framework/bootstrap/dist/js/bootstrap.min.js"></script>
    
        
     
    </head>
   
<body>
    
    <header>
			<table width="100%">
				<tr>
					<td colspan="1">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="../Images/logo.png" ></td>
				</tr>
				<tr>
					<td class="slogan">&nbsp&nbsp Semilla de innovacion que da vida a tus ideas</td>
				</tr>
			</table>
   </header>
   
<script src="../Framework/notie/notie.js"></script>
            
 <?php

    $accion=$_GET['accion'];
    
    
    $nabuEvent = new NabuEvent($_GET['p'], $_POST);
	$result=$nabuEvent->getEventSql($accion);
    
    $pos = strpos($_GET['p'], '_m_pg');
    
    if ($pos == true)
        $pagelink=$nabuEvent->getpagelink($_GET['p']);
    else
        $pagelink=$_GET['p'];
    
    if ($result== 1){
        
        $tipomensaje=1;
            
        if ($accion== 0 or $accion== 2)
            $mensaje='Guardado Exitoso';
        else
            if ($accion== 1 or $accion== 3)
                $mensaje='Actualizacion Exitosa';
    }
    else{
        $tipomensaje=3;
        $mensaje='Problemas al realizar la Operacion';
    }
 ?>                

    <script languaje="javascript">
        var message = "<?php echo $mensaje;?>" ;
        var link = "<?php echo $pagelink ;?>" ;
        var tipo = <?php echo $tipomensaje;?>;
        
        notie.alert(tipo,message, 5);
        setTimeout ('document.location = "../Pages/nabu.php?p="+link;',1000); 
    </script> 
    
    <footer class="footer">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-google-plus"></i></a>
        <a href="#"><i class="fa fa-youtube"></i></a>    
        <a href="http://cagc4.github.io/Nabu/" TARGET="_blank"><i class="fa fa-github"></i></a>
        <p>Nabu &copy; 2015</p>
    </footer>
</body>
</html>