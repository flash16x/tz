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
    <link href="//cdn.datatables.net/2.2.1/css/dataTables.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <script src="//code.jquery.com/jquery-3.7.1.js"></script>
    <script src="//cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
    <script src="//code.jquery.com/ui/1.14.1/jquery-ui.js"></script>

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
                        <p>Date From: <input type="text" id="datepicker1" class="datepicker"> Date To: <input type="text" id="datepicker2" class="datepicker"></p>
                        <table id="table" class="table datatable-basic">
                            <thead class="thead-default">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">ftd</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
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

    let table_data;
    $(document).ready(function () {
        table_data = new DataTable('#table', {
            columns: [
                { data: 'id' },
                { data: 'email' },
                { data: 'status' },
                { data: 'ftd' }
            ],
            ajax: {
                type: 'post',
                url: 'get_leads.php',
                data: function (data) {
                    data.dateFrom = $('#datepicker1').val();
                    data.dateTo = $('#datepicker2').val();
                    return data;
                }
            },
            processing: true,
            serverSide: true,
            paging: false
        });

        $( ".datepicker" ).datepicker({
            showButtonPanel: true,
            dateFormat: 'yy-mm-dd',
            minDate: -60,
            setDate: new Date(),
            onSelect: function() {
                table_data.ajax.reload()
            },
        });
    });
</script>
</body>
</html>