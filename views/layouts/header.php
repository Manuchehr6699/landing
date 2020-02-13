<?php
/**
 * Created by PhpStorm.
 * User: IT_User-144
 * Date: 13.12.2019
 * Time: 15:40
 */

use app\widgets\SiteMenu;

?>

<header id="wm-header" class="wm-header-one">

   <!--// TopStrip \\-->
   <div class="wm-topstrip">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
                <div class="wm-language">
                    <ul>
                        <li>
                            <a href="/"><i class="wmicon-paper"></i> <?= Yii::$app->settings->get('Site', 'sitename') ?></a>
                        </li>
                    </ul>
                </div>
               <ul class="wm-adminuser-section">
                  <li>
                     <a href="/admin">login</a>
                  </li>
                  <li>
                     <a href="/main/contact">Contact</a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
   <!--// TopStrip \\-->

   <!--// MainHeader \\-->
   <div class="wm-main-header">
      <div class="container">
         <div class="row">
            <div class="col-md-3"><a href="/" class="wm-logo"><img src="/images/logo-1.png" alt=""></a></div>
            <div class="col-md-9">
               <!--// Navigation \\-->
               <nav class="navbar navbar-default">
                  <div class="navbar-header">
                     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="true">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                     </button>
                  </div>
                  <div class="collapse navbar-collapse" id="navbar-collapse-1">
                      <?= SiteMenu::getMenu() ?>
               </nav>
               <!--// Navigation \\-->
            </div>
         </div>
      </div>
   </div>
   <!--// MainHeader \\-->

</header>

