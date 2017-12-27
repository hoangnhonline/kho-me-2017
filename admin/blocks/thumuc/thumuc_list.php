<script type="text/javascript">
    $(document).ready(function(){		
        $(".linkxoa").live('click',function(){			
            var flag = confirm("確定");
            if(flag == true){
                var idML = $(this).attr("idML");
                $.get('xoa.php',{loai:"mucluc",id:idML},function(data){
                    window.location.reload();			
                });	
            }
        })
        
    })
</script>
<div>
    <div>
        <h3>thư mục : 詳見清單</h3>
    </div>   
    <div class="clr"></div>
</div>
<div id="main_admin">

    <div>
            
            <div style="text-align: center">                     
                <table>
                    <thead>
                        <tr>
                            <td colspan="6">
                                <form method="get" action="" name="formTim" id="formTim">

                                    Người tạo
                                    <select name='idUser'>
                                        <option value='0'>Chọn người tạo</option>
                                        <option <?php if ($_GET['idUser'] == 1) echo "selected"; ?> value='1'>Bé Bé</option>

                                    </select>

                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

                                    <input type="submit" name="btnSubmit" id="btnSubmit" value="  Xem " />
                                    <br /><br />
                                    <input type="hidden" name="com" value="thumuc_list"  />
                                </form>                                 
                            </td>
                        </tr>
                        <tr>
                            <th width="1%"></th>       
                            <th align="center" width="1%">ID</th>
                            <th align="left">Tên thư mục</th> 
                            <th align="left">Người tạo</th>                                  
                            <th>回復更新</th>
                            <th>刪除</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $mucluc = $ml->MucLuc_List();
                        $i = 0;
                        while ($row = mysql_fetch_assoc($mucluc)) {
                            $i++;
                            ?>	
                            <tr <?php if ($i % 2 == 0) echo "bgcolor='#CCC'"; ?>>
                                <td><input type="checkbox" name="chon" idML=<?php echo $row[idML] ?>></td>  
                                <td><?php echo $row[idML] ?></td> 
                                <td align="left"><?php echo $row[TenMucLuc] ?></td> 
                                <td align="left"><?php echo ($row[idUser] == 1) ? "Bé Bé " : "Chưa rõ "; ?></td>  

                                <td><a href="index.php?com=thumuc&amp;idML=<?php echo $row[idML] ?>"><img src="../img/icons/user_edit.png" alt="" title="" border="0"></a></td>
                                <td><img class="linkxoa" idML=<?php echo $row[idML] ?> src="../img/icons/trash.png" alt="" title="" border="0"></td>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
      
    </div>


    <div class="clr"></div>
</div>
