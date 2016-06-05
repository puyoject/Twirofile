<?php
require_once "config.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="keywords" content="트위터, 트위터 프로필, 트위터 프로필 생성기, twitter, profile, 프로필">
    <meta name="description" content="공식 트위터 웹클라이언트 스타일의 프로필을 이미지형식으로 만들어 줍니다.">
    <meta name="author" content="malangpuyo">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php if($dev){echo "/puyoo.me";} ?>/twitter/bootstrap.min.css"  charset="utf-8">
    <link rel="stylesheet" href="<?php if($dev){echo "/puyoo.me";} ?>/twitter/style.css" charset="utf-8">
    <style>
    p,
    h1,
    h2,
    h3,
    footer {
      text-align: center;
    }
    .input-group {
      margin: 0 auto;
      margin-bottom: 10px;
    }
    </style>
    <title>트위터 프로필 생성기</title>
  </head>
  <body id="home">
    <nav class="navbar navbar-twitter navbar-fixed-top">
      <div class="container">
        <div class="navbar-center navbar-brand" href="#"><a class="navbar-brand" href="#home"><i class="fa fa-twitter"></i>프로필 생성기</a></div>
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="nav navbar-nav">
            <li><a href="#home">홈</a></li>
            <li><a href="#generate">생성하기</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <!-- <li><a href="https://twitter.com/intent/tweet?text=자신만의 트위터프로필을 만들어보세요!%26url=http://puyoo.me/u/twirofile" target="_blank">공유하기</a></li> -->
            <li><a href="<?php if($dev){echo "/puyoo.me";}?>/">메인으로 →</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container" id="content" style="margin-top: 0;">
      <h1 style="margin-top: 76px;">트위터 프로필 생성기</h1>
      <p>트위터 프로필 생성기는 공식 <a href="https://twitter.com">웹 트위터</a>의 프로필 카드모양의 프로필을 png파일로 제작해줍니다.</p>

      <h2>라이센스</h2>
      <h3>이미지 라이센스</h3>
      <p>
        이 프로필 생성기로 만들어지는 이미지의 저작권은 저작권자가 저작물에 대한 권리를 포기한 CC0 라이센스로 저작권자가 저작물에 대한 권리를 포기했습니다.<br>
        저작권자는 이 저작물을 사용하는 당사자에게 어떠한 보증이나 책임을 지지않으며 저작물을 사용하면서 생기는 모든 책임은 사용자에게 있습니다.<br>
        CC0 라이센스에 관한 자세한 사항은 <a href="https://creativecommons.org/publicdomain/zero/1.0/deed.ko">CC0 1.0라이센스 홈페이지</a>를 참고해 주세요.<br>
      </p>
      <h3>코드 라이센스</h3>
      <p>
        이 프로필 생성기를 구성하는 모든 코드는 MIT라이센스를 따릅니다. 자세한 내용은 <a href="./license.txt">MIT 라이센스 전문</a>을 참고해주세요.
      </p>
      <h3>사용하는 오픈소스</h3>
      <p>
        프로필 생성기는 아래의 오픈소스 프로젝트를 사용하고 있습니다.
        <ol style="text-align: center;">
          <li><a href="https://jquery.com/">Jquery</a>(MIT License)</li>
          <li><a href="http://getbootstrap.com">Twitter Bootstrap</a>(MIT License)</li>
          <li>Bootstrap file input js</li>
          <li><a href="https://github.com/tsayen/dom-to-image">Dom to images</a>(MIT License)</li>
        </ol>
      </p>
    </div>
    <div class="container" id="gen" style="margin-top: 30px;">
      <h2 id="generate">생성하기</h2>
      <form action="gen.php" enctype="multipart/form-data" method="post" style="margin-top: 30px;">
        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">1. 닉네임, 아이디 적기</div>
            <div class="panel-body">
              <div class="input-group">
                <span class="input-group-addon" id="ip_nick">닉네임</span>
                <input type="text" class="form-control" name="nick" aria-describedby="ip_nick" size="3" required>
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="ip_id">아이디</span>
                <input type="text" class="form-control" name="id" aria-describedby="ip_id" size="3" required>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">2. 프로필, 헤더 이미지 업로드</div>
            <div class="panel-body">
              <!-- <div class="input-group"> -->
                <!-- <span class="input-group-addon" id="ip_profile">프로필 </span> -->
                <!-- <input type="file" name="img-profile" aria-describedby="ip_profile" size="3" required> -->
              <!-- </div> -->

              <input type="file" data-filename-placement="img-profile" name="img-profile" title="프로필" required> <br><br>
              <input type="file" data-filename-placement="img-header" name="img-header" title="헤더" required>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">3. 상태표 적기</div>
            <div class="panel-body">
              <div class="input-group">
                <span class="input-group-addon" id="ip_st1">능력치1</span>
                <input type="text" class="form-control" name="stat1" aria-describedby="ip_st1" size="3" required>
                <span class="input-group-addon" id="ip_st1v">값</span>
                <input type="text" class="form-control" name="stat1-value" aria-describedby="ip_st1v" size="3" required>
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="ip_st2">능력치2</span>
                <input type="text" class="form-control" name="stat2" aria-describedby="ip_st2" size="3" required>
                <span class="input-group-addon" id="ip_st2v">값</span>
                <input type="text" class="form-control" name="stat2-value" aria-describedby="ip_st2v" size="3" required>
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="ip_st3">능력치3</span>
                <input type="text" class="form-control" name="stat3" aria-describedby="ip_st3" size="3" required>
                <span class="input-group-addon" id="ip_st3v">값</span>
                <input type="text" class="form-control" name="stat3-value" aria-describedby="ip_st3v" size="3" required>
              </div>

            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="panel panel-default">
            <div class="panel-heading">4. 만들기!</div>
            <div class="panel-body">
              <input type="submit" class="btn btn-default" value="생성하기">
            </div>
          </div>
        </div>
    </div>

  <footer style="position: static; bottom: 0; margin-top: 120px;">
    Copyright (c) 2016 <a href="http://puyoo.me">puyoo.me</a> All Rights Reserved.
  </footer>

  <script src="<?php if($dev){echo "/puyoo.me";} ?>/twitter/jquery-1.12.4.min.js" charset="utf-8"></script>
  <script src="<?php if($dev){echo "/puyoo.me";} ?>/twitter/bootstrap.min.js" charset="utf-8"></script>
  <script src="./bootstrap.file-input.js" charset="utf-8"></script>
  <script>
  $(document).ready(function(){
    $('input[type=file]').bootstrapFileInput();
    $('.file-inputs').bootstrapFileInput();

    $(".navbar a").on('click', function(event) {

    event.preventDefault();

    var hash = this.hash;

    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 900, function(){

      window.location.hash = hash;
      });
    });
  });
  </script>
  </body>
</html>
