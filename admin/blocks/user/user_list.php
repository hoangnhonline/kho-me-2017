<?php
$user_list = $u->user_list();
?>
<script type="text/javascript">
    $(document).ready(function(){		
        $(".linkxoa").live('click',function(){			
            var flag = confirm("確定");
            if(flag == true){
                var idUser = $(this).attr("idUser");
                $.get('xoa.php',{loai:"users",id:idUser},function(data){
                    window.location.reload();			
                });	
            }
        })
        
    })
</script>

<div>
    <div>
        <h3>User list</h3>
    </div>   
    <div class="clr"></div>
</div>
<div id="main_admin">

    <div>                     
        <table>
            <thead>              

                <tr>
                    <th width="1%"></th>       
                    <th width="1%">User ID</th>
                    <th align="left">Full Name</th> 
                    <th align="left"> Email </th>
                    <th align="left"> Group </th>               
                    <th width="150px">移動</th>
                </tr>
            </thead>

            <tbody>

                <?php
                $i = 0;
                while ($row = mysql_fetch_assoc($user_list)) {
                    $i++;
                    ?>	
                    <tr <?php if ($i % 2 == 0) echo "bgcolor='#CCC'"; ?>>
                        <td><input type="checkbox" name="chon" idUser=<?php echo $row['idUser'] ?>></td>
                        <td align="left"><?php echo $row['idUser'] ?></td> 
                        <td align="left"><?php echo $row['fullname'] ?></td> 
                        <td align="left"><?php echo $row['email'] ?></td>  
                        <td align="left"><?php echo ($row['group'] == 2) ? "Admin" : "Editor"; ?></td>                                                                                    
                        <td style="white-space: nowrap" align="center">                              
                            <a href="index.php?com=user_edit&amp;idUser=<?php echo $row['idUser'] ?>">
                                <img src="../img/icons/user_edit.png" alt="回復更新" title="回復更新" border="0">
                            </a>&nbsp;&nbsp;
                            <img class="linkxoa" idUser="<?php echo $row['idUser'] ?>" src="../img/icons/trash.png" alt="刪除 user" title="刪除 user" border="0">
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>




    <div class="clr"></div>
</div>