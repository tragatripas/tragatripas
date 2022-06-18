<?php  
  error_reporting(0);
  require 'php/head.php'; 
  setlocale(LC_MONETARY, "es_ES");
  $curr = 'EUR';

  function moneyFormat($price,$curr) {
        $currencies['EUR'] = array(2, ',', '.'); // Euro
        $currencies['ESP'] = array(2, ',', '.'); // Euro
        $currencies['USD'] = array(2, '.', ','); // US Dollar
        $currencies['COP'] = array(2, ',', '.'); // Colombian Peso
        $currencies['CLP'] = array(0, '', '.'); // Chilean Peso

        return number_format($price, ...$currencies[$curr]);
   }

  function cortarFrase($frase, $maxPalabras = 7, $noTerminales = []) {
         $palabras = explode(" ", $frase);
         $numPalabras = count($palabras);
           if ($numPalabras > $maxPalabras) {
              $offset = $maxPalabras - 1;
               while (in_array($palabras[$offset], $noTerminales) && $offset < $numPalabras) { $offset++; } return implode(" ",      array_slice($palabras, 0, $offset + 1));
            }
              return $frase;
        }
 
$cantidad = 0;
foreach($_SESSION['arrcarrito'] as $pro){
  $cantidad += $pro['cantidad'];

}

 if($cantidad > 0){
     $verCanti = ' activo ';
 }else if($cantidad < 1 || $_SESSION['arrcarrito'] == null || $_SESSION['arrcarrito'] == "" || empty($_SESSION['arrcarrito'])){
     $verCanti = '';
     
 }


?>
   
    <div class="content_general" id="content_general">
        
        <div class="content_form_news" id="content_form_news">
            <h2 class="h_news">Subscribe Newsletter</h2>
            <input type="text" class="i_news_latter" id="i_first_name_news" value="" placeholder="First Name">
            <input type="text" class="i_news_latter" id="i_last_name_news" value="" placeholder="Last Name">
            <input type="mail" class="i_news_latter" id="i_mail_news" value="" placeholder="E-Mail">
            <div class="div_acpetar_terminos" id="div_aceptar_terminos"></div>
            <label for="" class="l_teminos" id="l_teminos">I have read and accept the terms.</label>
            <div class="alerta_news" id="alerta_news">
                <h3 class="h_error_news"></h3>
            </div>
            <label for="" class="l_btn_news">Subscribe</label>
        </div>
        
        <div class="content_login" id="content_login">
            <h2 class="h_news">Login</h2>
            <input type="mail" class="i_news_latter" id="i_mail_login" value="" placeholder="E-Mail">
            <input type="password" class="i_news_latter" id="i_pass_login" value="" placeholder="Password">
            <div class="alerta_login" id="alerta_login">
                <h3 class="h_error_login"></h3>
            </div>
            <label for="" class="l_btn_login" id="l_btn_login">Enter</label>
            <label for="" class="recuperar" id="recuperar">Forgot your password?</label>
            <label for="" class="recuperar" id="reactivar_cuenta">Reactivate Account</label>
        </div>
        
        <div class="content_register" id="content_register">
            <h2 class="h_news">Register</h2>
            <input type="text" class="i_news_latter" id="i_first_name_regis" value="" placeholder="First Name">
            <input type="text" class="i_news_latter" id="i_last_name_regis" value="" placeholder="Last Name">
            <input type="mail" class="i_news_latter" id="i_mail_regis" value="" placeholder="E-Mail">
            <input type="text" class="i_news_latter" id="i_dni_regis" value="" placeholder="European identity card">
            <input type="password" class="i_news_latter" id="i_pass_regis1" value="" placeholder="Password">
            <input type="password" class="i_news_latter" id="i_pass_regis2" value="" placeholder="Repet Password">
            <div class="div_acpetar_terminos_registros" id="div_aceptar_terminos_registros"></div>
            <label for="" class="l_teminos_registros" id="l_teminos_registros">I have read and accept the terms.</label>
            <div class="alerta_login" id="alerta_regis">
                <h3 class="h_error_login" id="h_error_regis"></h3>
            </div>
            <label for="" class="l_btn_login l_btn_register" id="l_btn_register">Register</label>
        </div>
        
        <div class="content_perfil" id="content_perfil">
            <label for="" class="l_menu_perfil" id="abrir_micuenta"><i class="fas fa-user-circle"></i> My Account</label>
            <label for="" class="l_menu_perfil" onclick="abrirCarrito()"><i class="fas fa-shopping-cart"></i> Shopping Cart</label>
            <label for="" class="l_menu_perfil" onclick="abrirPedidos('<?= $id_cliente ?>')"><i class="fas fa-dolly-flatbed"></i> My Order</label>
            <label for="" class="l_menu_perfil" onclick="abrirLista('<?= $id_cliente ?>')"><i class="fas fa-list-ol"></i> Your Lists</label>
            <label for="" class="l_menu_perfil" onclick="abrirDescargas('<?= $id_cliente ?>')"><i class="fas fa-cloud-download-alt"></i> My Downloads</label>
            <label for="" class="l_menu_perfil" onclick="cerrarSesion()"><i class="fas fa-sign-out-alt"></i> Logout</label>
        </div>
        
        <div class="content_faqs" id="content_faqs"></div>
        
        <div class="content_logo" id="content_logo"  onclick="quitatodo();">
            <a href="<?= URL ?>">
                <img class="img_magos_artesanos" src="recursos/MagosArtesanos.png" alt="logo magos artesanos">
                <img class="img_murphys" src="recursos/Murphys-Magic-Logo.png" alt="logo magos murphys">
            </a>
        </div>
        
        <div class="div_olivide_contra" id="div_olvide_contra">
            <label for="" class="cerrar_recu"><i class="fas fa-times"></i></label>
            <h2 class="h_recovery">Recovery password</h2>
            <input type="mail" class="i_recu_contra" id="i_recu_contra" placeholder="Type your E-Mail">
            <label for="" class="btn_recuperar" id="btn_recuperar">Send</label>
            <span class="s_aviso">Wrong mail format</span>
        </div>
        
        <div class="div_olivide_contra" id="div_activate_account">
            <label for="" class="cerrar_recu"><i class="fas fa-times"></i></label>
            <h2 class="h_recovery">Reactivate Account</h2>
            <input type="mail" class="i_recu_contra" id="i_recu_cuenta" placeholder="Type your E-Mail">
            <label for="" class="btn_recuperar" id="btn_recuperar_cuenta">Send</label>
            <span class="s_aviso">Wrong mail format</span>
        </div>
        
        <div class="div_nav_murphy" onclick="quitatodo();">
           <nav class="nav_murphys" id="nav_murphys">
               <label for="" onclick="volverTienda()">Return to the store </label> 
               
           </nav>
           
           
        </div>
        
        <div class="div_categorias" id="div_categorias">
           <?php
            $menu_cat = 1;
            $estado_cat = 1;
            $sql_categorias = "SELECT * FROM categorias WHERE menu_cat_mostrar = ? AND estado_categoria = ? ORDER BY orden ASC";
            $sqlcategorias = $db->prepare($sql_categorias);
            $sqlcategorias->execute([$menu_cat, $estado_cat]);
            $categorias = $sqlcategorias->fetchAll();
            
            foreach($categorias as $categoria){
                $nombre_categoria = $categoria['nombre_categoria'];
                ?>
                  <label for="" class="l_cate" onclick="filtrarCat('<?= $nombre_categoria; ?>')"><?= $nombre_categoria; ?></label>  
                
                <?php } ?>
        </div>
        
        <div class="div_content_product" id="div_content_product"  onclick="quitatodo();">
               
            <div class="div_content_publi_derecha" id="div_content_publi_derecha">
               
               <?php
                    $lugar_derecha = "L";
                    $status = 1;

                    $sql_banner_derecha = "SELECT * FROM banner_promo WHERE lugar LIKE ? AND status = ?";
                    $sqlbannerderecha = $db->prepare($sql_banner_derecha);
                    $sqlbannerderecha ->execute(["%$lugar_derecha%", $status]);

                    while($bannerderecha = $sqlbannerderecha->fetch()){
                        $url_derecha = $bannerderecha['url'];

                        if($url_derecha != ""){ ?>
                            <img src="<?= $url_derecha ?>" alt="">
                        
                <?php } } ?>
               
            </div>
               
            <div class="div_productos" id="div_productos">
              <h1 class="h_privacy">About?</h1>
              
              
             <p class="p_conten_cookies">Magos Artesanos is a company located in Madrid, Spain, specialized in the distribution of magic tricks for beginners, amateurs and the professionals.</p><br>

             <p class="p_conten_cookies">Serious, committed people with high knowledge in magic.</p><br><br>

             <p class="p_conten_cookies">They have been working since 2007 and, currently, thanks to this new European project in collaboration with Murphys Magic Inc, they are opening the market to Europe by offering what is probably the largest catalog of magic in the world...</p>
             

             <p class="p_conten_cookies">Will you join us on this travel?</p>


            </div>
            
            
            <div class="div_content_publi_izquierda" id="div_content_publi_izquierda">
                 <?php
                    $lugar_izquierda = "R";
                    $status = 1;

                    $sql_banner_izquierda = "SELECT * FROM banner_promo WHERE lugar LIKE ? AND status = ?";
                    $sqlbannerizquierda = $db->prepare($sql_banner_izquierda);
                    $sqlbannerizquierda ->execute(["%$lugar_izquierda%", $status]);

                    while($bannerizquierda = $sqlbannerizquierda->fetch()){
                        $url_izquierda = $bannerizquierda['url'];

                        if($url_izquierda != ""){ ?>
                            <img src="<?= $url_izquierda ?>" alt="">

                 <?php } } ?>
            </div>
            
        </div>
        
        <div class="div_content_descripcion" id="div_content_descripcion">
            <div class="content_descripcion" id="content_descripcion">
            </div>
        </div>
        
        <div class="div_avisos" id="div_avisos">
            <i class="fas fa-check i_avisos"></i>
            <label for="" class="l_avisos">Product added to cart</label>
        </div>
        
        <div class="div_conten_micuenta" id="div_conten_micuenta">
            <div class="div_micuenta" id="div_micuenta">
               <label for="" class="cerrar_micuenta" id="cerrar_micuenta"><i class="fas fa-times"></i></label>
               <div class="div_agregar_nueva_direccion" id="div_agregar_nueva_direccion">
                   <input type="hidden" id="id_usu" value="<?= $id_cliente ?>">
                   <label class="l_cerrar_agregar_direccion" id="l_cerrar_agregar_direccion"><i class="fas fa-times"></i></label>
                  
                   <select name="" id="pais_con" class="nueva_direccion" onchange="buscarComunidad()">
                       <option value="???">Select a country</option>
                       <?php 
                       $continente = "Europe";
                       $sql_pais = "SELECT * FROM pais_con WHERE PaisContinente = ? ORDER BY PaisNombre ASC";
                       $sqlpais = $db->prepare($sql_pais);
                       $sqlpais->execute([$continente]);
                       $paises = $sqlpais->fetchAll();
                       
                       foreach($paises as $pais){
                           $pais_codigo = $pais['PaisCodigo'];
                           $pais_nombre = $pais['PaisNombre'];
                           ?>
                           <option value="<?= $pais_codigo ?>"><?= $pais_nombre ?></option>
                           <?php } ?>
                   </select>
                   
                   <select name="" id="estado" class="nueva_direccion">
                       <option value="???">Select Province / State</option>
                   </select>
                   
                   <input type="text" class="nueva_direccion" id="ciudad" placeholder="Enter City">
                   
                   <input type="text" class="nueva_direccion" id="calle" placeholder="Enter Street">
                   
                   <input type="text" class="nueva_direccion" id="numero" placeholder="Enter Number">
                   
                   <input type="text" class="nueva_direccion" id="planta" placeholder="Enter Floor">
                   
                   <input type="text" class="nueva_direccion" id="codigo_postal" placeholder="Enter Zip Code">
                   
                   <label for="" class="l_aviso_direccion" id="l_aviso_direccion"></label>
                   
                   <label for="" class="btn_agregar_direccion" id="btn_agregar_direccion">Enter Address</label>
               </div>
               
                <div class="cabecera_micuenta" id="cabecera_micuenta"></div>
                
                <div class="agrega_direccion" id="agregar_direccion"></div>
                
                <div class="ajustes_micuenta" id="ajustes_micuenta">
                    <h1 class="h_ajustes">Settings</h1>
                    
                    <?php
                    
                        if($news == 0){
                           $activo = " noactivo";
                           $no_news = " No ";
                        }else if($news == 1){
                           $activo = " activo";
                           $no_news = "";
                        }
                    
                        if($notificaciones == 0){
                           $activo_noti = " noactivo";
                           $no_noti = " No ";
                        }else if($notificaciones == 1){
                           $activo_noti = " activo";
                           $no_noti = "";
                        }
                    
                        if($news == 0 && $notificaciones == 0){
                           $activo_vaca = " activo";
                        }else if($news == 1 && $notificaciones == 1){
                           $activo_vaca = " noactivo";
                        }

                        if($status == 1){
                           $activo_status = " noactivo";
                        }else if($status == 0){
                           $activo_status = " activo";
                        }
                    ?>
                    
                    <label for="" class="l_programar_publi_admin <?= $activo ?>" id="l_programar_publi_admin"><?= $no_news ?> Receive Newsletter: </label><span class="s_btn_status <?= $activo ?>" id="s_btn_status<?= $id_cliente ?>" onclick="EstadoActivo('<?= $id_cliente ?>')"></span>
                    
                    <label for="" class="l_programar_notificaciones <?= $activo_noti ?>" id="l_programar_notificaciones"><?= $no_noti ?> Receive Notifications: </label><span class="s_btn_noti <?= $activo_noti ?>" id="s_btn_noti<?= $id_cliente ?>" onclick="notiActivo('<?= $id_cliente ?>')"></span>
                    
                    <label for="" class="l_programar_vacaciones <?= $activo_vaca ?>" id="l_programar_vacaciones">Holiday Mode: </label><span class="s_btn_vacaciones <?= $activo_vaca ?>" id="s_btn_vacaciones<?= $id_cliente ?>" onclick="vacaionesActivo('<?= $id_cliente ?>')"></span>
                    
                    <label for="" class="l_programar_estado <?= $activo_status ?>" id="l_programar_estado">Deactivate Account: </label><span class="s_btn_estado <?= $activo_status ?>" id="s_btn_estado<?= $id_cliente ?>" onclick="abrirStatus()"></span>
                </div>
                
                <div class="div_aviso_cuenta" id="div_aviso_cuenta">
                    <i class="fas fa-exclamation-triangle i_warning_aviso"></i>
                    <h2 class="h_aviso_cuenta">Are you sure to deactivate the account?</h2>
                    <label for="" class="btn_aviso_cuenta" onclick="statusActivo('<?= $id_cliente ?>')">Ok</label>
                    <label for="" class="btn_aviso_cuenta btn_cancel" onclick="cerrarAviso()">Cancel</label>
                </div>
                
            </div>
        </div>
        
    </div>
    
<?php require 'php/footer.php'; ?>
