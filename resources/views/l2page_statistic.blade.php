@extends('layouts.l2templatefolder.l2templatepages')

@section("title" , "Server statistic")
@section("page-title" , "Server statistic")
@section('inside_info')
    <script src="{{asset('/js/statistics.js?v=1') }}"></script>
    <script src="{{asset('/js/alertsMessages.js') }}"></script>

    <h1 style="margin-top: 5%;padding-left:0px;" class="page-title"><p>{{ __('messages.static') }}</p></h1>
    <div style="margin: auto;width: 100%;" class="contentHomeStatic">

        <div class="message"></div>

        <!--<div id="show_alert" class="alert info">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong id="text_alert">{{ __('messages.info_first_page_static') }}</strong>
        </div>-->

        <div style="margin-bottom: 1%;margin-right: 95%;" id="loading_reg"></div>
        <div class="container">
            <div style="display:block; float: left;" class="body_ts">

                <div style="display:inline-block;">
                    <div class="select">
                        <select name="sel_server" id="select_server" onchange="GetSelectedServer(this)" >
                            <option selected disabled>{{ __('messages.select_server') }}</option>
                            @foreach ($arrayNameServers as $arr)
                                <option value={{$arr[0]}}>{{$arr[1]}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div style="display:inline-block;">
                    <div class="select">
                        <select name="sel_static" id="select_static" onchange="GetSelectedTop(this)">
                            <option selected disabled>{{ __('messages.select_static') }}</option>
                            @foreach ($arrayNameStatistic as $multiArr)
                                @foreach ($multiArr as $arr)
                                    <option value={{$arr['id']}}>{{ $arr['name'] }}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

            <div style="clear:both;"></div>
            <div style="margin-top: 20px;">
                <table id="customers" class="table_top">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>NAME</th>
                        <th>CLASS</th>
                        <th>CLAN</th>
                        <th>LVL</th>
                        <th>PVP</th>
                        <th>PK</th>
                        <th>ONLINE</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr align="center">
                        <td colspan="8">{{ __('messages.no_data') }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div style="margin-top: 20px;">
                <table id="customers_clan" class="table_top" style="display:none;">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>C.NAME</th>
                        <th>C.LEVEL</th>
                        <th>REP.</th>
                        <th>CASTLE</th>
                        <th>ALLY</th>
                        <th>MEMBER</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr align="center">
                        <td colspan="7">{{ __('messages.no_data') }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div class="main-article__content">
        <h2 class="main-article__header"></h2>
        <p class="main-article__paragraph"></p>
    </div>

    <div class="copy">
        <footer class="footer">
            <div class="footerTopBlock">
                <div class="container2">
                    <p><a href="{{ route('privacypolicy') }}" class="link-white">{{ __('messages.privacy_policy_title') }}</a></p>
                    <p><a href="{{ route('useragreement') }}" class="link-white">{{ __('messages.useragreement_title') }}</a></p>
                </div>
            </div>
        </footer>
        <p>© Draconic-Legacy.com</p>
        <p>All rights reserved</p>
    </div>

    <script>
        var select_server_id;

        function GetSelectedServer(education) {
            var sleTex = education.options[education.selectedIndex].innerHTML;
            var selVal = education.value;
            select_server_id = selVal;
        }

        function GetSelectedTop(education) {
            var sleTex = education.options[education.selectedIndex].innerHTML;
            var id_static = education.value;
            getStatistics(select_server_id, id_static);
        }
    </script>

    <style>
        /* Общие стили для таблицы */
        .table_top th, .table_top td {
            padding: 10px;
            text-align: center;
            font-size: 14px; /* Уменьшаем размер шрифта */
        }

        /* Увеличиваем ширину таблицы для мобильных устройств */
        @media screen and (max-width: 768px) {
            .table_top th, .table_top td {
                padding: 5px;
                font-size: 12px; /* Еще немного уменьшаем шрифт */
            }

            /* Оставляем все колонки видимыми */
            .table_top th, .table_top td {
                display: table-cell;
            }

            /* Подгоняем ширину колонок, чтобы все влезло */
            .table_top th:nth-child(2), /* C.NAME */
            .table_top td:nth-child(2)
            .table_top th:nth-child(3), /* REP. */
            .table_top td:nth-child(3),
            .table_top th:nth-child(4), /* CASTLE */
            .table_top td:nth-child(4),
            .table_top th:nth-child(5), /* ALLY */
            .table_top td:nth-child(5),
            .table_top th:nth-child(6), /* MEMBER */
            .table_top td:nth-child(6)
        }
    </style>

@endsection
