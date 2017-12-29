<?php
if (isset($_GET['idTG'])) {
    $idTG = $_GET['idTG'];
    settype($idTG, "int");
    $chitiet = $tg->TacGia_ChiTiet($idTG);
    $row = mysql_fetch_assoc($chitiet);
}
if (isset($_POST['btnSumit'])) {
    if (isset($_GET['idTG'])) {
        $thanhcong = $tg->TacGia_Sua($idTG, $loi);
    } else {
        $thanhcong = $tg->TacGia_Them($loi);
    }
    if ($thanhcong == true) {
        header("location:?com=tacgia");
    }
}
?>
<script type="text/javascript">
    $(document).ready(function(){		
        $(".linkxoa").live('click',function(){			
            var flag = confirm("確定");
            if(flag == true){
                var idTG = $(this).attr("idTG");
                $.get('xoa.php',{loai:"tacgia",id:idTG},function(data){
                    window.location.reload();			
                });	
            }
        })
        
    })
</script>
<form action="" method="post" name="form_add_dm_ks">
    <div>
        <div>
            <h3>譯者-作者 : <?php echo (isset($_GET['idTG']) ? "回復更新" : "新加") ?></h3>
        </div>    
        <div class="clr"></div>
    </div>
    <div id="main_admin">

        <div id="main_left">

            <table>
                <tr class="left">
                    <td style="width: 150px">譯者-作者</td>
                    <td><input type="text" name="TacGia" id="TacGia" class="tf" value="<?php echo isset($row['TacGia']) ? $row['TacGia'] : ""; ?>" style="width: 400px;height: 25px" />
                        <span class="error"><?php echo isset( $loi['TacGia']) ? $loi['TacGia'] : ""; ?></span>
                    </td>                        
                </tr>  
                <tr class="left">
                    <td>URL Details</td>
                    <td><input type="text" name="UrlDetail" id="UrlDetail" class="tf" value="<?php echo isset($row['UrlDetail']) ? $row['UrlDetail'] : ""; ?>" style="width: 400px;height: 25px" />
                        <span class="error"><?php echo isset( $loi['UrlDetail']) ? $loi['UrlDetail'] : ""; ?></span>
                    </td>                        
                </tr>   
                <tr>
                    <td colspan="2">
                        <div style="padding-left:200px">                           
                            <input type="submit" class="save" name="btnSumit" value="重置" onclick="return validate();"/>		                               

                            <input type="reset" class="cancel" name="btnCancel" value="上载"/>                                                      

                        </div>
                    </td>

                </tr>   
            </table>            

        </div>	
        <div class="clear"></div>

        <div>    	
            <div style="text-align: center">                     
                <table>
                    <thead>
                        <tr>
                            <th scope="col" class="rounded-company"></th>       

                            <th  align="left">譯者-作者</th>                                <th scope="col" align="left">URL Details</th>
                            <th >回復更新</th>
                            <th scope="col" class="rounded-q4">刪除</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $mucluc = $tg->TacGia_List();
                        $i = 0;
                        while ($row = mysql_fetch_assoc($mucluc)) {
                            $i++;
                            ?>	
                            <tr <?php if ($i % 2 == 0) echo "bgcolor='#CCC'"; ?>>
                                <td><input type="checkbox" name="chon" idTG=<?php echo $row[idTG] ?>></td>  

                                <td align="left"><?php echo $row[TacGia] ?></td> 
                                <td align="left"><?php echo $row[UrlDetail] ?></td> 

                                <td><a href="index.php?com=tacgia&amp;idTG=<?php echo $row[idTG] ?>"><img src="../img/icons/user_edit.png" alt="" title="" border="0"></a></td>
                                <td><img class="linkxoa" idTG=<?php echo $row[idTG] ?> src="../img/icons/trash.png" alt="" title="" border="0"></td>
                            <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="clr"></div>
    </div>
</form>