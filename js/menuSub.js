$(document).ready(function(){

    $('.content_kinh').on('contextmenu', function(event){
        //event.stopPropagation();
        $('#menu_sub').show();
        var posi_x = event.pageX,
            posi_y = event.pageY;
        $('#menu_sub').css({
            top: (posi_y + 10)+'px',
            left: (posi_x + 15)+'px'
        });
        return false;
    });
    $('html, body').click(function(){
        $('#menu_sub').hide();
    });
    var txt = '';
    $('#menu_sub li a').on('click', function(event){
        //event.stopPropagation();
        if(typeof window.getSelection != 'undefined'){           
            var selec = window.getSelection();

           
            if(selec.rangeCount){
                var content = document.createElement('div');
                var range = window.getSelection().getRangeAt(0);
                range.insertNode(content);

                var ThuTu = content.parentNode.parentNode.getAttribute("thutu");
				if(ThuTu == null){
					ThuTu = content.parentNode.parentNode.parentNode.getAttribute("thutu");	
				  if(ThuTu == null) { 				 
					ThuTu = content.parentNode.parentNode.parentNode.parentNode.getAttribute("thutu");					
					if(ThuTu == null) { 					
							ThuTu = content.parentNode.parentNode.parentNode.parentNode.parentNode.getAttribute("thutu");							
							
							if(ThuTu == null) { 							
									ThuTu = content.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.getAttribute("thutu");									
							}
					}
				  }
				}						
                for(var i = 0, len = selec.rangeCount; i < len; i++){
                    content.appendChild(selec.getRangeAt(i).cloneContents());
                }
                txt = content;
            }
        }else if(typeof document.selection != 'undefined'){        
            if(document.selection.type = 'Text'){
                txt = document.selection.createRange().htmlText;
            }
        }
 
        if(txt != '' && $('.popup_block').css('display') == 'none'){
            var idPopup = $('.popup_block'),
                ten_sach = $('#ten_sach').val(),
                ten_tacgia = $('#ten_tacgia').val(),
				ten_mucluc = $('#ten_mucluc').val(),
                nhaxuatban = $('#nxb').val(),
                namxb = $('#namxb').val();				
            $('#ten_tacgia_pu').text(ten_tacgia);
			$('#ten_mucluc_pu').text(ten_mucluc);
			$('#ten_sach_pu').text(ten_sach);
            $('#nhaxuatban').text(nhaxuatban);
            $('#namsanxuat').text(namxb);
			$('#current_page_pu').text(ThuTu);
            idPopup.find('.content_select').html('');           
            idPopup.find('.content_select').append(txt);
            showPopup('.popup_block');
            $('#menu_sub').hide();
        }
        return false;
    });
    setTimeout(function() {
        //set path
        ZeroClipboard.setMoviePath('js/ZeroClipboard.swf');
        //create client
        var clip = new ZeroClipboard.Client();
        //event
        clip.addEventListener('mousedown',function() {		
			var html = '"';
			html += $('.content_select *').text() ;
			html += '"' + "\r\n\r\n";
			html += $('#ten_tacgia_pu').text() + ', ' + $('#ten_sach_pu').text() + ', ' +  $('#ten_mucluc_pu').text() + ', ';
			html += $('#nhaxuatban').text() + ', ' ;
			html += $('#namsanxuat').text() + ', ' +'trang ' + $('#current_page_pu').text() +'.';			
            clip.setText(html);
        });
        clip.addEventListener('complete',function(client,text) {
            alert('Sao chép thành công! (Ctrl + V) để paste vào văn bản.');
			$('#btn_close').click();
        });
        //glue it to the button
        clip.glue('copyclipboard');
    }, 2000);
    $('#btn_close, #btn_cancel').on('click', function(){
        hidePopup('.popup_block');
    });
});
function showPopup(id){
    var wbody = $('body').width(),
        hbody = $('body').height(),
        $overlay = $('<div class="overflow"></div>'),
        wPopup = $(id).width(),
        hPopup = $(id).height(),
        ww = $(window).width(),
        hw = $(window).height(),
        centerTopPopup = hw/2 - hPopup/2 - 10,
        centerLeftPopup = ww/2 - wPopup/2 - 10,
        scrollBody = $('html, body').scrollTop();
    $overlay.css({
        position : 'absolute',
        width : wbody,
        height : hbody,
        background : 'url(./css/images/graphics/bg_opacity.png)',
        'z-index' : 99901,
        top : 0,
        left : 0
    });
    $overlay.appendTo('body');
    $(id).css({
        top : centerTopPopup + scrollBody,
        left : centerLeftPopup,
        position : 'fixed'
    });
    $(id).fadeIn();
}
function hidePopup(id){
    $('.overflow').fadeOut().remove();
    $(id).fadeOut();
}