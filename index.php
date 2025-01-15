<!DOCTYPE html>
<html lang="uk">
<head>
    <style>
        html {
            scroll-behavior: smooth;
        }
        body * {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        a, button, input, textarea, select {
            -webkit-touch-callout: initial !important;
            -webkit-user-select: initial !important;
            -khtml-user-select: initial !important;
            -moz-user-select: initial !important;
            -ms-user-select: initial !important;
            user-select: initial !important;
        }
        span#toform {
            width: 0;
            height: 0;
            overflow: hidden;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }
    </style>
    <meta charset="UTF-8">
    <title>Отправка лидов</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link href="b_assets/styles.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

<body>

<div class="site">
    <div class="site-wrap">
        <div class="site-header">
            <div class="site-wrap">
                <div class="site-header-wrp">
                    <header class="header" role="banner" >
                        <div class="wrap wrap-bg">
                            <div class="hdr-tabl">
                                <div class="hdr-row">
                                    <div class="hdr-r">
                                        <div class="hdr-date-social clearfix">
                                            <div class="wrap">
                                                <div class="hdr-date clearfix">
                                                    <div class="hdr-date-day valign-middle">
                                                            <span>
                                                                <script type="text/javascript">
                                                                    d = new Date();
                                                                    p = new Date(d.getTime() + 0 * 86400000);
                                                                    monthA = "01,02,03,04,05,06,07,08,09,10,11,12".split(",");
                                                                    document.write(
                                                                        p.getDate() + "." + monthA[p.getMonth()] + "." + p.getFullYear()
                                                                    );
                                                                  </script>
                                                            </span>
                                                    </div>
                                                    <div class="hdr-date-time valign-middle">
                                                            <span id="current-time">
                                                                <script>
                                                                    const currentTime = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                                                                    document.getElementById("current-time").textContent = currentTime;
                                                                  </script>
                                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <nav class="navigation" role="navigation">
                        <div class="navigation-block" role="menu">
                            <div class="navigation-tv">
                                <div class="navigation-tv-wrp">
                                    <div class="navigation-tv-scroll">
                                        <div class="navigation-chnnl">
                                            <div class="wrap">
                                                <div class="navigation-chnnl-block clearfix">
                                                    <ul class="hdr-chnnl-menu clearfix">
                                                        <li class="hdr-chnnl-menu-itm" role="menuitem">
                                                            <a class="hdr-chnnl-menu-lnk valign-middle" href="/">
                                                                    <span class="hdr-chnnl-menu-lbl watching">
                                                                        <span>ФОРМА</span>
                                                                        <span class="icon">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60">
                                                                                <use xlink:href="#watching"></use>
                                                                            </svg>
                                                                        </span>
                                                                    </span>
                                                            </a>
                                                        </li>
                                                        <li class="hdr-chnnl-menu-itm" role="menuitem">
                                                            <a class="hdr-chnnl-menu-lnk valign-middle" href="/leads.php">
                                                                <span class="hdr-chnnl-menu-lbl">СТАТУСЫ ЛИДОВ</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="content">

            <div class="wrap wrap-bg">
                <div class="content-block clearfix">
                    <center class="centr-form">
                        <form id="order_form" action="#" method="post">
                            <div id="order_form_place" style="display:block;">
                                <div style="margin:15px 10px -5px 10px;border:2px solid #0299ff;padding:10px;">
                                    <span><b>Форма для отправки данных</b></span>
                                </div>
                                <div class="order_form_pole">
                                    <label>Имя:</label>
                                    <input type="text" class="name-black" name="firstName" placeholder="Ваше имя" required="" autocomplete="name" maxlength="50">
                                </div>
                                <div class="order_form_pole">
                                    <label>Фамилия:</label>
                                    <input type="text" class="name-black" name="lastName" placeholder="Ваша фамилия" required="" autocomplete="name" maxlength="50">
                                </div>
                                <div class="order_form_pole">
                                    <label>E-mail:</label>
                                    <input type="text" class="name-black" name="email" placeholder="Ваш E-mail" required="" autocomplete="email" maxlength="50">
                                </div>
                                <div class="order_form_pole">
                                    <label>Ваш контактний телефон:</label>
                                    <input class="input phone" name="phone" type="tel" onclick="(function(event){if (!event.target.value.length){event.target.value='+38';}})(event)"
                                           oninput="(function(event){const x=event.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0})(\d{0,3})(\d{0,3})(\d{0,2})(\d{0,2})/);
                                        event.target.value='+38' + (x[4] ? ' (' + x[3] + ') ' : '' + x[3]) + x[4] + (x[5] ? '-' + x[5] : '') + (x[6] ? '-' + x[6] : '');})(event)"
                                           pattern="^\+38\s[\(]?0(39|67|68|96|97|98|50|66|95|99|63|73|93|91|92|94)[\)]\s\d{3}[\-]\d{2}[\-]\d{2}$"
                                           title="Формат: +38 (0XX) XXX-XX-XX. Проверьте правильность кода оператора."
                                           placeholder="Ваш телефон">
                                </div>
                                <div class="btn-sub" style="margin-bottom:20px;">
                                    <button type="submit">ОТПРАВИТЬ</button>
                                </div>
                            </div>

                            <input type="hidden" name="country" value="">
                        </form>
                    </center>

                </div>
            </div>
        </div>
        <footer class="footer" role="contentinfo">

                    <section class="ftr-social clearfix">
                        <h3 class="ftr-social-title font-add">Шепель Роман</h3>
                    </section>
        </footer>
<script type="text/javascript">
    $(document).ready(function () {
        $('#order_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url: 'newlead.php',
                type: 'post',
                dataType: 'json',
                data: $('#order_form').serialize(),
                success: function(data) {
                    if(data.status == 'success'){
                        if('data' in data)
                            alert("Лид успешно добавлен. ID: " + data.data.toString());
                        else
                            alert('Лид успешно добавлен');
                        $('#order_form :input').val('');
                    }
                    else{
                        alert(data.data);
                    }
                }
            });

        });
    });
</script>
</body>
</html>
