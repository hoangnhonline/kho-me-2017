
<div id="admin_navigation">
    <div>
        <h3>tác giả : មើលបញ្ជី</h3>
    </div>

    <div class="clr"></div>
</div>
<div id="main_admin">

    <div>    	
        <div style="text-align: center">                     
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th  align="left">相册名称</th>                                
                        <th >回復更新</th>
                        <th>刪除</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $mucluc = $tg->TacGia_List();
                    while ($row = mysql_fetch_assoc($mucluc)) {
                        ?>	
                        <tr>
                            <td><input type="checkbox" name="chon" idTG="<?php echo $row['idTG'] ?>"></td>  

                            <td align="left"><?php echo $row['TacGia'] ?></td>  

                            <td><a href="index.php?com=tacgia_edit&amp;idTG=<?php echo $row['idTG'] ?>"><img src="../img/icons/user_edit.png" alt="" title="" border="0"></a></td>
                            <td><img class="linkxoa" idTG="<?php echo $row['idTG'] ?>" src="../img/icons/trash.png" alt="" title="" border="0"></td>
                        <?php } ?>
                </tbody>
            </table>
        </div>

    </div>


    <div class="clr"></div>
</div>
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