<?php
$link = "index.php?com=mucluc_list";
$idSachs = -1;
if (isset($_GET['idMLs']) && $_GET['idMLs'] > 0 ){
	$idMLs = $_GET['idMLs'];
	settype($idMLs,"int");
	$link.="&idMLs=$idMLs";
}else { $idMLs = -1;}
if (isset($_GET['idSachs']) && $_GET['idSachs'] > 0 ){
	$idSachs = $_GET['idSachs'];
	settype($idSachs,"int");
	$link.="&idSachs=$idSachs";
}else { $idSachs = -1;}

$page_show=5;

$limit = 10;

$sachs = $dm->DanhMuc_List($idMLs,$idSachs,-1,-1);

$total_record = mysql_num_rows($sachs);

$total_page = ceil($total_record/$limit);

if(isset($_GET['page'])==false){
	$page = 1;
}
else{ 
	$page=isset($_GET['page']) ? $_GET['page'] : 1;
	settype($page,"int");
}

$offset = $limit * ($page - 1);
$sach = $dm->DanhMuc_List($idMLs,$idSachs,$limit,$offset);
?>
<script>
$(function(){	
	$("#idMLs").change(function(){				
		$("select[name=idSachs]").load("blocks/ajax_laysach.php?idML="+ $(this).val());
	})
})
</script>
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

<div id="admin_navigation">
	<div style="float:left;width:80%">
		<h3>類目 : 詳見清單</h3>
    </div>
    <div style="float:left;width:5%;padding-top:5px">
        <a href="index.php?com=mucluc_add"><input type="button" class="new" name="btnNew" value=""/></a><br />		
        <span>New</span>
    </div>
	<div style="float:left;width:5%;padding-top:5px">
    	<input type="submit" class="save" name="btnSumit" value=""/><br />		
        <span>重置</span>
    </div>
    <div style="float:left;width:5%;padding-top:5px">
    	<input type="reset" class="cancel" name="btnCancel" value=""/><br />		
        <span>上载</span>
    </div>
    <div class="clr"></div>
</div>
<div id="main_admin">
	
	<div>
    	<fieldset>
        	<legend>++ Danh sách ++</legend>
            	<div style="text-align: center">                     
                    <table id="rounded-corner" summary="2007 Major IT Companies&#39; Profit">
                        <thead>
                        <tr>
                                <td colspan="9">
                            <form method="get" action="" name="formTim" id="formTim">
                                資料夾 
                                <select name='idMLs' id="idMLs">
                                    <option value='0'>選擇資料夾</option>
                                    <?php $MucLuc = $ml->MucLuc_List();
                                    while($row =  mysql_fetch_assoc($MucLuc)){
                                    ?>
                                    <option <?php if($_GET[idMLs]==$row[idML]) echo "selected"; ?> value='<?php echo $row[idML]?>'><?php echo $row['TenMucLuc']; ?></option>
                                    <?php } ?>
                                </select>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                書籍 
                                <select name='idSachs' id="isSach">
                                    <option value='0'>Chọn sách</option>
                                    <?php $sachsss = $s->Sach_List();
                                    while($row =  mysql_fetch_assoc($sachsss)){
                                    ?>
                                    <option <?php if($_GET['idSachs']==$row[idSach]) echo "selected=selected"; ?> value='<?php echo $row[idSach]?>'><?php echo $row['TenSach']; ?></option>
                                    <?php } ?>
								</select>
                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                               
                                 <input type="submit" name="btnSubmit" id="btnSubmit" value="  看 " />
                                                                  <br /><br />
                                    <input type="hidden" name="com" value="mucluc_list"  />
                                 </form>                                 
                                </td>
                        </tr>
                        <tr>
                                <td colspan="6"><?php echo $ml->phantrang($page,$page_show,$total_page,$link);?></td>
                            </tr>
                             <tr style="color:white;background-color:#06F;height:30px">
                                <th scope="col" class="rounded-company"></th>       
                               <th scope="col" class="rounded"> 類目 ID </th>
                                
								<th scope="col" class="rounded" align="left">Tên 類目 </th> 
                                <th scope="col" class="rounded">頁碼</th>                               
                                <th scope="col" class="rounded">回復更新</th>
                                <th scope="col" class="rounded-q4">刪除</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php                        
                       $i=0;
                        while($row=mysql_fetch_assoc($sach)) {                 
						$i++;   
						$idDM = $row[idDM];
							$sql = "SELECT count(idTrang) AS sotrang FROM trang WHERE idDM = $idDM";
							$rs_1 = mysql_query($sql);
							$row_1 = mysql_fetch_assoc($rs_1);          
                        ?>	
                           <tr <?php if($i%2==0) echo "bgcolor='#CCC'" ; ?>>
                                <td><input type="checkbox" name="chon" idDM=<?php echo $row[idDM]?>></td>                                <td align="center"><?php echo $row[idDM]?></td>                                
								<td align="left"><?php echo $row[DanhMuc]?></td>  
                               <td align="center"><?php echo $row_1[sotrang]?></td>
                                <td><a href="index.php?com=mucluc_add&amp;idDM=<?php echo $row[idDM]?>"><img src="../img/icons/user_edit.png" alt="" title="" border="0"></a></td>
                                <td><img class="linkxoa" idDM=<?php echo $row[idDM]?> src="../img/icons/trash.png" alt="" title="" border="0"></td>
      <?php } ?>
      <tr>
                                <td colspan="6"><?php echo $ml->phantrang($page,$page_show,$total_page,$link);?></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
        </fieldset>
    </div>

   
    <div class="clr"></div>
</div>
