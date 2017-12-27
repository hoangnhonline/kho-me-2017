 <table>
    <tr class="left">
        <td style="white-space: nowrap;width: 150px" valign="top">Ghi chú</td>
        <td><textarea id="GhiChu" name="GhiChu" style="width:600px;height: 40px">
            </textarea>
            <br />
        </td>
    </tr>
    <tr>
        <td style="white-space: nowrap;width: 150px" valign="top"> <br />Nội dung</td>
        <td> <br />
        </td>
    </tr>
    <tr>
        <td colspan="2" align="left">
            <div style="padding-left:200px">
                     <br /><input type="button" class="save" name="btnSumit" id="btnThemTrang" value="Save"/>

                    <input type="reset" class="cancel" name="btnCancel" value="Reset"/>

            </div>
        </td>
    </tr>
</table>
<script type="text/javascript">
    $(function(){
        $('#btnThemTrang').click(function(){
            $(this).attr("disabled", "disabled");
            var idML = $('#idML').val();
            var idDM = $('#idDM').val();
            var idSach = $('#idSach').val();
            var GhiChu = $('#GhiChu').val();
            var NoiDung = CKEDITOR.instances['NoiDung'].getData();
            if(idML == 0 || idDM ==0 || idSach == 0){
                alert('Chưa chọn đầy đủ thông tin của trang!');
                $("#load_add_trang").dialog('close');
                return false;
            }else{
                $.ajax({
                    url: "insertmucluc.php",
                    type: "POST",
                    async: false,
                    data: {'idML':idML,'idDM':idDM,'idSach':idSach,'GhiChu':GhiChu,'NoiDung':NoiDung},
                    success: function(data){
                        alert('Thêm trang thành công. ID : ' + $.trim(data));
                        $('#GhiChu').val('');
                        CKEDITOR.instances['NoiDung'].setData('');
                        $('#btnThemTrang').removeAttr("disabled");
                        //$("#load_add_trang").dialog('close');
                    }
                });
            }


        });

    });

</script>
