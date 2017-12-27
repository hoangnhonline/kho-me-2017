<script type="text/javascript">
    $(document).ready(function(){		
        $(".linkxoa").live('click',function(){			
            var flag = confirm("確定");
            if(flag == true){
                var idDM = $(this).attr("idDM");
                $.get('xoa.php',{loai:"danhmuc",id:idDM},function(data){
                    window.location.reload();			
                });	
            }
        })
        
    })
</script>

<div>
    <div>
        <h3>類目 : 詳見清單</h3>
    </div>    
    <div class="clr"></div>
</div>
<div id="main_admin">

    <div>

        <div style="text-align: center">                     
            <table id="rounded-corner" summary="2007 Major IT Companies&#39; Profit">
                <thead>
                    <tr>
                        <th scope="col" class="rounded-company"></th>       

                        <th scope="col" class="rounded">Tên sách </th>
                        <th scope="col" class="rounded">Tên 類目 </th>                                
                        <th scope="col" class="rounded">回復更新</th>
                        <th scope="col" class="rounded-q4">刪除</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $sach = $dm->DanhMuc_List();
                    while ($row = mysql_fetch_assoc($sach)) {
                        ?>	
                        <tr>
                            <td><input type="checkbox" name="chon" idDM=<?php echo $row['idDM'] ?>></td>                                    
                            <td align="left"><?php echo $row['TenSach'] ?></td>  
                            <td align="left"><?php echo $row['DanhMuc'] ?></td>  

                            <td><a href="index.php?com=danhmuc_edit&amp;idDM=<?php echo $row['idDM'] ?>"><img src="../img/icons/user_edit.png" alt="" title="" border="0"></a></td>
                            <td><img class="linkxoa" idDM="<?php echo $row['idDM'] ?>" src="../img/icons/trash.png" alt="" title="" border="0"></td>
                        <?php } ?>
                </tbody>
            </table>
        </div>

    </div>


    <div class="clr"></div>
</div>
