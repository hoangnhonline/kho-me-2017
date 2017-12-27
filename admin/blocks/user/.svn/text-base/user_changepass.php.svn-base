<?php
if(isset($_POST['btnSubmit'])){
	$u->user_changepass();
	header("location:index.php?com=user_success");
}
?>
<form action="" method="post" name="form_add_dm_ks">
<div>
	<div>
		<h3>Manage User : Change password</h3>
    </div>
    <div class="clr"></div>
</div>
<div id="main_admin">

	<div id="main_left">

            	<table>
                    <tr class="left">
                    	<td width="150px">Old password:</td>
                        <td><input type="password" name="oldpass" id="oldpass" class="tf" style="width: 300px" />
                        </td>
                    </tr>
                    <tr class="left">
                    	<td>New password:</td>
                        <td>
                            <input type="password" name="newpass" id="newpass" class="tf" style="width: 300px"/>
                        </td>
                    </tr>
                    <tr class="left">
                    	<td>Retype New password:</td>
                        <td><input type="password" name="renewpass" id="renewpass" class="tf" style="width: 300px"/>
                            <input type="hidden" name="idUser" id="idUser" value="<?php echo $_SESSION['user_id']; ?>" />
                        </td>
                    </tr>
                    <tr class="left">
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" name="btnSubmit" id="btnSumit" value="Save" onclick="return checksubmit();" />
                        </td>
                    </tr>



                </table>
    </div>


    <div class="clr"></div>
</div>
</form>
<script type="text/javascript">
    $(function(){
       $('#oldpass').blur(function(){
           validate();
       });
    });
    function checksubmit(){
        validate();
        var newpass = $.trim($('#newpass').val());
        var renewpass = $.trim($('#renewpass').val());
        if(newpass!=renewpass){
            alert('New password and re-type new password not same!');
            return false;
        }else{
            return true;
        }
    }
    function validate(){
        var idUser = $('#idUser').val();
        var password = $.trim($('#oldpass').val());
        $.ajax({
            url:"checkpass.php",
            type:"POST",
            async:false,
            data:{"idUser":idUser, "password":password},
            success:function (data) {
                if($.trim(data)=='error'){
                    alert('Old password wrong!');
                    return false;
                }
            }
        });
    }
</script>