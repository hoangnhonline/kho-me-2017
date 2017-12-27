$(function() {
	$('#mycarousel').jcarousel();	
	$('.title_phapam').click(function(){
		$('#nut_hien_list').show();
		$('#hien_phap_am').load('get_phap_am.php?idPA=' + $(this).attr('idPA'));
		$('#hien_phap_am').show();
		$('#list_phap_am').hide();
	});	
	$('#nut_hien_list').click(function(){
		
		$('#list_phap_am').show();
		$('#hien_phap_am').hide();
		$('#nut_hien_list').hide();			
	})
	$(".load_trang, #page_pre ,#page_next, #mucluc_next,#mucluc_pre,.danhmuc a,.pagination_h,.link_search").live("click",function(){
		var obj=$(this);
		processAjax(obj);
	})
	$('.ad-gallery').adGallery();
	$('#btnLoc').click(function(){
		$.getJSON("ajax/json.php", {
			com: 'mucluc',
			idSach:$('#idSach_loc').val(),
			idML:$('#idML_loc').val(),
			idDM:$('#idDM_loc').val()
		}, function(response){
			$(".content_kinh").html(response.noidung);
			$('#page_next,#page_pre').remove();
			$(".content_kinh").parent().parent().append(response.page_next);
			$(".content_kinh").parent().parent().append(response.page_pre);
			$('#mucluc_next,#mucluc_pre').remove();
			$("#bottom_box").html('');
			$("#bottom_box").append(response.mucluc_pre);
			$("#bottom_box").append(response.strPhanTrang);
			$("#bottom_box").append(response.mucluc_next);
			$("#idDM_loc").val(response.idDM);
			$("#idSach_loc").val(response.idSach);
			$("#idML_loc").val(response.idML);	
				$('.baotrang').hide();							
				$('.danhmuc a[idML=' + response.idML +']').parent().next().show();
				$('.danhmuc a').css('font-weight',"normal");		
				$('.danhmuc a[idML=' + response.idML +']').css('font-weight','bold');
				$('.load_trang').css('font-weight',"normal");
				$('.load_trang[idTrang=' + response.idTrang +']').css('font-weight','bold');	
			});
		})
		
	$('#btnFind').click(function(){
		if($('#textKeyword').val =='' || $('#textKeyword').val == 'Nhập từ tìm kiếm') {
			alert('Vui lòng nhập từ tìm kiếm');
			return false;
		}else{
			$.post("blocks/ajax_find.php",{keyword:$('#textKeyword').val()}, function(response){
				$('#result_find').html(response);
			});
		}
	})	

});
function processAjax(obj){
	$("#bottom_box").html('');
	$.getJSON("ajax/json.php", {
		com: 'mucluc',
		idTrang:obj.attr('idTrang'),
		idML:obj.attr('idML')
	}, function(response){
		$(".content_kinh").html(response.noidung);
		$('#page_next,#page_pre').remove();
		$(".content_kinh").parent().parent().append(response.page_next);
		$(".content_kinh").parent().parent().append(response.page_pre);
		$('#mucluc_next,#mucluc_pre').remove();
		$("#bottom_box").html('');
		$("#bottom_box").append(response.mucluc_pre);
		$("#bottom_box").append(response.strPhanTrang);
		$("#bottom_box").append(response.mucluc_next);
		$("#idDM_loc").val(response.idDM);
			$("#idSach_loc").val(response.idSach);
			$("#idML_loc").val(response.idML);	
		$('.baotrang').hide();							
		$('.danhmuc a[idML=' + response.idML +']').parent().next().show();
		$('.danhmuc a').css('font-weight',"normal");		
		$('.danhmuc a[idML=' + response.idML +']').css('font-weight','bold');
		$('.load_trang').css('font-weight',"normal");
		$('.load_trang[idTrang=' + response.idTrang +']').css('font-weight','bold');	
	});
}
$(document).ready(function(){
		
	$('a.tabmenu').click(function(){
		var idML = $(this).attr('idML');
		$.post('ajax/getMenu.php',{idML:idML},function(data){
			$('#menuContainer').html(data);
			$('.baodanhmuc').hide();
			$('a.tabmenu').removeClass('active');
			$('a.tabmenu[idML='+idML+']').addClass('active');
		})
	});				
	$('.mucluc').live('click',function(){
		$(this).next().slideToggle();
	})
	$('.sach').live('click',function(){
		var obj = $(this);
		var idSach = obj.attr('idSach');
		//alert(obj.next().html());
		if($.trim(obj.next().html())==''){
			$.post('ajax/getDM.php',{idSach:idSach},function(data){
				$('.baodanhmuc').hide();
				obj.next().html(data).slideToggle();	
			});
		}else{
			obj.next().slideToggle();
		}
		//$(this).next().slideToggle();
	})
	$('.danhmuc').live('click',function(){			
		$(this).next().slideToggle();
	});	
	$('#idSach_loc').change(function(){
		$('#idML_loc').load('ajax/ajax_loaddanhmuc.php?idSach=' + $(this).val());
	});
	$('.trang').live('click',function(){
		$('#data').load('load_data.php?idTrang=' + $(this).attr('idTrang'));
	})
})
$("#reset").click(function(){
	
})
$(function(){
	$('#idDM_loc').change(function(){
		var idML = $(this).val();
		$('#idSach_loc').load('ajax/ajax_loadsach.php?idML=' + $(this).val());
	})	
	$('.float_item .btn_control_float').toggle(
		function(){
			$(this).parents('.float_item').stop(true, true).animate({width:'225px'}, 500)
		},
		function(){
			$(this).parents('.float_item').animate({width:'25px'},500);
		}
	)
	$('.float_top_item .btn_control_float').toggle(
		function(){
			$(this).parents('.float_top_item').stop(true, true).animate({height:'240px'}, 500)
		},
		function(){
			$(this).parents('.float_top_item').animate({height:'30px'},500);
		}
	)
})