<html>
<head>
<style>
/** Define the margins of your page **/
@page {
margin: 100px 25px;
}

header {
position: fixed;
top: -60px;
left: 0px;
right: 0px;
height: 50px;

/** Extra personal styles **/
/*background-color: #03a9f4;*/
/*background-image: url('/etapa1/pdf/renglon-degradado.png');*/
background: {{ public_path('/etapa1/pdf/renglon-degradado.png') }};
background-repeat: no-repeat, repeat;
color: rgb(121, 17, 17);
text-align: center;
line-height: 35px;
}

footer {
position: fixed;
bottom: -60px;
left: 0px;
right: 0px;
height: 50px;

/** Extra personal styles **/
/*background-color: #03a9f4;*/
background-image: url('/etapa1/pdf/renglon-degradado.png');
background-size: 100%;
background-repeat: no-repeat;

color: white;
text-align: center;
line-height: 35px;
}
</style>
</head>
<body>
<!-- Define header and footer blocks before your content -->
<header>
    <img src="{{ asset('/etapa1/pdf/renglon-degradado.png')}}" alt="Renglon Degragado">
Cabecera del documento
</header>

<footer>
    <img src="{{ asset('/etapa1/pdf/renglon-degradado.png')}}" alt="Renglon Degragado">
Copyright © <?php echo date("Y");?>
</footer>

<!-- Wrap the content of your PDF inside a main tag -->
<main>
<p style="page-break-after: always;">
Content Page 1
</p>
<p style="page-break-after: never;">
Content Page 2
</p>
</main>
</body>

</html>
