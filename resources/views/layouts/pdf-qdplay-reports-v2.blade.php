<html>
<head>
    <style>
    /** Define the margins of your page **/
    * {
        font-family: 'Montserrat', sans-serif;
        font-size: 13px;
    }
    @page {
        margin: 150px 0px;
    }

    header {
        position: fixed;
        top: -150px;
        left: 0px;
        right: 0px;
        height: 150px;

        /** Extra personal styles **/
        background-image: url(http://prod.querido-dinero.develop/etapa1/pdf/img-header.png);
        background-size: 100%;
        background-repeat: no-repeat;
        color: white;
        text-align: center;
        line-height: 35px;
    }

    footer {
        position: fixed;
        bottom: -150px;
        left: 0px;
        right: 0px;
        height: 150px;

        /** Extra personal styles **/
        /*background-color: #90d06b;*/
        background-image: url(http://prod.querido-dinero.develop/etapa1/pdf/img-footer.png);
        background-size: 100%;
        color: white;
        text-align: center;
        line-height: 35px;
    }
    table, tr, td {
        margin: 5px 2px;
        padding: 0;
    }

    table {
        border-collapse: collapse;
    }

    tr {
        border-bottom: 1pt solid rgb(27, 27, 27);
        margin-top: 10px;
    }

    td {
        margin: 10px 0px;
        padding: 4px;
    }
    .space-60{
        margin-bottom: 200px;
    }
    .page-break{
        page-break-after: auto;
    }
    </style>
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        <br><br><br>
        Header document
    </header>

    <footer>
        <a href="https://www.queridodinero.com/" style="color:#fff; font-style: italic;">www.<b>queridodinero</b>.com</a>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main style="margin: 50px 50px;">

    @yield('content')

    </main>
</body>

</html>
{{--dd('print')--}}
