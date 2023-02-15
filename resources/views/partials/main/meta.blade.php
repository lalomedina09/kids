<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="content-language" content="es-MX">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="description" content="{{ $metadata->description }}" />
<meta name="keywords" content="{{ $metadata->keywords }}" />
<meta name="author" content="{{ $metadata->author }}" />

<meta itemprop="name" content="{{ $metadata->title }}">
<meta itemprop="description" content="{{ $metadata->description }}">
<meta itemprop="image" content="{{ $metadata->image }}">

<meta name="twitter:card" content="{{ $metadata->twitter->card }}" />
<meta name="twitter:site" content="{{ $metadata->twitter->site }}" />
<meta name="twitter:title" content="{{ $metadata->title }}" />
<meta name="twitter:description" content="{{ $metadata->description }}" />
<meta name="twitter:creator" content="{{ $metadata->twitter->creator }}" />
<meta name="twitter:image:src" content="{{ $metadata->image }}" />

<meta property="og:type" content="article" />
<meta property="og:site_name" content="{{ $metadata->name }}" />
<meta property="og:title" content="{{ $metadata->title }}" />
<meta property="og:description" content="{{ $metadata->description }}" />
<meta property="og:url" content="{{ $metadata->url }}" />
<meta property="og:image" content="{{ $metadata->image }}" />
<meta property="article:published_time" content="" />
<meta property="article:modified_time" content="" />
<meta property="article:section" content="" />
<meta property="article:tag" content="" />
<meta property="fb:admins" content="" />

@if(request()->getSession())
  <meta name="jwt-token" content="{{ request()->session()->get('qd-jwt') }}">
@endif

<link rel="canonical" href="{{ $metadata->url }}"/>

<!-- Metas para eliminar la cache-->
<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
<meta http-equiv="Pragma" content="no-cache">

<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 1 Jul 2022 05:00:00 GMT"); // Fecha en el pasado
?>

@stack('meta')
