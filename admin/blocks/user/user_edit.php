<?php
$idUser = (int) $_GET['idUser'];
$chitiet = $u->user_chitiet($idUser);
$row = mysql_fetch_assoc($chitiet);
if (isset($_POST['btnSubmit'])) {
    $u->user_edit($idUser);
    header("location:index.php?com=user_list");
}
?>
<form action="" method="post" name="form_add_dm_ks">
    <div>
        <div>
            <h3>Manage User : update</h3>
        </div>
        <div class="clr"></div>
    </div>
    <div id="main_admin">

        <div id="main_left">

            <table>
                <tr class="left">
                    <td width="150px">Group</td>
                    <td>
                        <select name='group' id="group">
                            <option value='0'>Chosse group</option>
                            <option value='1' <?php if ($row['group'] == 1) echo "selected"; ?>>Editor</option>
                            <option value='2' <?php if ($row['group'] == 2) echo "selected"; ?>>Admin</option>
                        </select>
                    </td>
                </tr>
                <tr class="left">
                    <td>Full name:</td>
                    <td><input type="text" name="fullname" id="fullname" class="tf" value="<?php echo $row['fullname']; ?>" style="width: 300px" />
                    </td>
                </tr>
                <tr class="left">
                    <td>Email:</td>
                    <td><input type="text" name="email" id="email" class="tf" value="<?php echo $row['email']; ?>" style="width: 300px" />                            
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>

                        <input type="submit" class="save" name="btnSubmit" value="重置"/>		                               

                        <input type="reset" class="cancel" name="btnCancel" value="上载"/>                                                      


                    </td>

                </tr>  


            </table>
        </div>


        <div class="clr"></div>
    </div>
</form>