<script>
    function reloadValidCode() {
        document.getElementById('Image1').src = 'checkcode_test.php?' + new Date().getTime();
    }
</script>
<div class="wrapper-login">
<div class="container">
<div class="jumbotron">
<div class="row">

<div id="content-form">
<h2>請輸入忘記密碼之帳號</h2>
	<div class="offset-2">
	<div class="well">
        <form id="form1" method="POST" action="Forget_pw1_.php">
                
            <div class="label" >請輸入忘記密碼之信箱帳號：</div><input type="text" id="email" placeholder="忘記密碼請在此輸入帳號，然後再去您註冊的信箱修改密碼。" CssClass="form-control" name="email"/> 
                <label class="label">
                    <div class="float-left form-inblock">請輸入右方驗證碼： 
                    <input ID="code" name="code" Width="68px" CssClass="form-control"> 
                    <img id="Image1" src="checkcode_test.php"></div>
                </label>
            <div class="offset-form">
                <div class="float-left form-inblock">
                    <input type="submit" id="click"  Text="確定！" CssClass="btn btn-lg m-btn" />
                    <input type="button" id="reflash" value="重整驗證碼" onclick="reloadValidCode()" class="btn btn-lg campus-btn">                    
                </div>				
            </div>
        </form>
    </div>
    </div>
</div>
</div>
</div>
</div>
</div>

<div id="left"></div>


<div id="clear">

</div>
