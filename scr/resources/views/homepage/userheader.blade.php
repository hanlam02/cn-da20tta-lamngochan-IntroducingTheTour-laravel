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

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="#">Home</a></li>
        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tour
            <ul class="dropdown-menu">
              <li><a href="#">Miền trung</a></li>
              <li><a href="#">Miền Bắc</a></li>
              <li><a href="#">Miền Nam</a></li>
              <li><a href="#">Miền Tây</a></li>
              <li><a href="#">Tất cả</a></li>
            </ul>
          </a>
        </li>
        <li><a href="#">Liên hệ</a></li>
        <li><a href="#">Giới thiệu</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{route('login.login')}}"> Đăng Nhập</a></li>
      </ul>
    </div>
  </div>
</nav>