<?php
session_start();
if(!$_SESSION['bkstg_login']) {
    header("HTTP/1.1 403 Forbidden");
    exit;
}
header("Content-Type: text/html; charset=utf-8");
require_once("../../php/functions.php");
$db=db_connect();
$result=mysqli_query($db,"SELECT * FROM confreg");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>北航模联v2.0-后台管理</title>
    <link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../images/buaamun_logo.JPG" />
    <link href="http://cdn.bootcss.com/jquery-toggles/2.0.4/toggles.css" rel="stylesheet" >

    
    <script src="http://cdn.bootcss.com/jquery-toggles/2.0.4/toggles.js"></script>    
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      function logout(){
        $.ajax({
          type: "POST",
          url: '../../php/login.php',
          dataType: 'json',
          data: {
            action: "logout"
          },
          success: function(data) {
            if(data['status']==0){
              window.location="../login.php";
            }
            else {
              alert(data['msg']);
            }
          }
        });
      }
    </script>

  </head>
<FONT style="FONT-FAMILY: 微软雅黑;">
  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../">北航模联网站后台管理系统</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <li class="dropdown active">
              <a href="../index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">网站设置<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="../index.php">全局设置</a></li>
                <li><a href="../#">通知栏</a></li>
              </ul>
            </li>
            <li><a href="../enroll/">招新报名</a></li>
            <li class="dropdown">
              <a href="index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">参会报名<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="index.php">报名管理</a></li>
                <li><a href="conference.php">会议管理</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="../munc/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">模联大会<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="../munc/index.php">网页内容</a></li>
                <li><a href="../munc/add_comm.php">委员会设置</a></li>
                <li><a href="../munc/delegation.php">代表团管理</a></li>
                <li><a href="../munc/delegate.php">代表管理及席位分配</a></li>
              </ul>
            </li> 
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" onclick="logout()">注销</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <br /><br /><br />

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="page-header">
            <h3>参会报名情况 <a role="button" align="right" class="btn btn-success btn-lg" href="download.php"><span class="glyphicon glyphicon-save"></span>导出报名信息</a></h3>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <table class="table table-striped">
          <thead>
          <tr>
            <th><b>学号</b></th>
            <th><b>姓名</b></th>
            <th><b>性别</b></th>
            <th><b>手机</b></th>
            <th><b>邮箱</b></th>
            <th><b>QQ</b></th>
            <th><b>模联经历</b></th>
            <th><b>报名会议</b></th>
            <th><b>委员会意向</b></th>
          </tr>
        </thead>
        <tbody>
        <?php
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){  
        ?>
          <tr>
            <td><?php echo $row['id'] ?> </td>
            <td><?php echo $row['name'] ?> </td>
            <td><?php echo $row['gender'] ?> </td>
            <td><?php echo $row['contact'] ?> </td>
            <td><?php echo $row['email'] ?> </td>
            <td><?php echo $row['qq'] ?> </td>
            <td><?php echo $row['exp'] ?> </td>
            <td><?php echo $row['conference'] ?> </td>
            <td><?php echo $row['committee'] ?> </td>
          </tr>
        <?php
          }
        ?>
        </tbody>
        </table>
      </div>
    </div>

    <footer><hr />
      <p align="center">Model United Nations Association, Beihang University<br />&copy; 2014-2015 All Rights Reserved.</p>
    </footer>

</body>
</FONT>	
</html>