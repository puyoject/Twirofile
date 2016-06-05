<?php
require_once "config.php";

$nick = $_POST['nick'];
$id = $_POST['id'];
$i_profile = $_FILES['img-profile'];
$i_header = $_FILES['img-header'];
$st1 = $_POST['stat1'];
$st1v = $_POST['stat1-value'];
$st2 = $_POST['stat2'];
$st2v = $_POST['stat2-value'];
$st3 = $_POST['stat3'];
$st3v = $_POST['stat3-value'];

$updir_root = './img/';
$updir_profile = $updir_root.'profile/';
$updir_header = $updir_root.'header/';

$uploadprofile = $updir_profile.basename($i_profile['name']);
move_uploaded_file($i_profile['tmp_name'], $uploadprofile);

$uploadheader = $updir_header.basename($i_header['name']);
move_uploaded_file($i_header['tmp_name'], $uploadheader);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php if($dev){echo "/puyoo.me";} ?>/twitter/bootstrap.min.css"  charset="utf-8">
    <link rel="stylesheet" href="<?php if($dev){echo "/puyoo.me";} ?>/twitter/style.css" charset="utf-8">
    <title>@<?=$id?>의 프로필</title>
  </head>
  <body style="background-color: #fff;">
    이미지 파일을 생성하는 중입니다. 잠시만 기다려주세요.<br>

    미리보기
    <div id="result" style="width: 256px; height: 201px;">
    <div class="panel panel-default" style="margin: 0 auto; width: 253px; height: 198px;">
      <div class="panel-body" style="padding: 0;">
        <div class="profile-background" style="background-image: url('<?=$updir_header.$i_header['name']?>')"></div>
        <div class="profile-info">
          <a href="#" class="profile-link">
            <img src="<?=$updir_profile.$i_profile['name']?>" class="profile-image">
          </a>
          <div class="profile-nick"><?=$nick?></div>
          <div class="profile-id">@<?=$id?></div>
        </div>
        <div class="stats">
          <ul>
            <li>
              <div class="stats-name"><?=$st1?></div>
              <div class="stats-value"><?=$st1v?></div>
            </li>
            <li>
              <div class="stats-name"><?=$st2?></div>
              <div class="stats-value"><?=$st2v?></div>
            </li>
            <li>
              <div class="stats-name"><?=$st3?></div>
              <div class="stats-value"><?=$st3v?></div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
    <div style="margin-top: 15px; text-align: center;">
    </div>
    <script src="./dti.js" charset="utf-8"></script>
    <script src="<?php if($dev){echo "/puyoo.me";} ?>/twitter/jquery-1.12.4.min.js" charset="utf-8"></script>
    <script type="text/javascript">

    $(document).ready(function() {
      var node = document.getElementById('result');
      domtoimage.toPng(node)
        .then(function (dataUrl) {
            var img = new Image();
            img.src = dataUrl;
            window.open(img.src);

           if (window.name !== 'window_id') {
            window.open('about:blank','_self');
            opener=window;
            window.close();
            }
        })
        .catch(function (error) {
            alert('예상치 못한 에러가 발생했습니다! 나중에 다시 시도해주세요.');
            console.log(error);
        });
    });
    </script>
  </body>
</html>
