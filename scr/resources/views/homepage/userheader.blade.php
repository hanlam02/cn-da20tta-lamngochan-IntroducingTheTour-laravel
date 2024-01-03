<!DOCTYPE html>
<html lang="en">
<head>
  <title>My tour</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets')}}/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="{{asset('assets')}}/css/style">
  <link rel="stylesheet" href="{{asset('assets')}}/css/styleapp.css">
  <style>

  </style>
</head>
<body>

<nav class="navbar navbar-inverse" style="background-color: #0064d2; font-size: 18px">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav" style="margin-top: 10px">
        <li ><a href="{{route('homepage')}}" style="color: white" >Home</a></li>
        <li>
          <a href="{{route('interfacetour')}}" class="dropdown-toggle" data-toggle="dropdown" style="color: white">Tour
            <ul class="dropdown-menu">
              <li><a href="{{ route('interfacetour', ['domain' => 'Miền Trung']) }}">Miền Trung</a></li>
              <li><a href="{{ route('interfacetour', ['domain' => 'Miền Bắc']) }}">Miền Bắc</a></li>
              <li><a href="{{ route('interfacetour', ['domain' => 'Miền Nam']) }}">Miền Nam</a></li>
              <li><a href="{{route('interfacetour')}}">Tất cả</a></li>
            </ul>
          </a>
        </li>
        <li><a href="#" style="color: white">Liên hệ</a></li>
        <li><a href="#" style="color: white">Giới thiệu</a></li>
        <li><a href="{{route('seach')}}" style="color: white">Tra cứu</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a > <div class="box-tools" style="width: 300px;">
          <form action="{{ route('detail.search') }}" method="get" class="input-group">
            <input type="text" name="search" class="form-control pull-right" placeholder="Search">
            <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
        </form>
        </div></a></li>
      </ul>
    </div>
  </div>
</nav>