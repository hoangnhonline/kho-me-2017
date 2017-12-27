var DateDiff = { 
    inDays: function(d1, d2) {
        var t2 = d2.getTime();
        var t1 = d1.getTime();
 
        return parseInt((t2-t1)/(24*3600*1000));
    },
 
    inWeeks: function(d1, d2) {
        var t2 = d2.getTime();
        var t1 = d1.getTime();
 
        return parseInt((t2-t1)/(24*3600*1000*7));
    },
 
    inMonths: function(d1, d2) {
        var d1Y = d1.getFullYear();
        var d2Y = d2.getFullYear();
        var d1M = d1.getMonth();
        var d2M = d2.getMonth();
 
        return (d2M+12*d2Y)-(d1M+12*d1Y);
    },
 
    inYears: function(d1, d2) {
        return d2.getFullYear()-d1.getFullYear();
    }
}
function format_number(pnumber,decimals){
    if (isNaN(pnumber)) { return 0};
    if (pnumber=='') { return 0};
    var snum = new String(pnumber);
    var sec = snum.split('.');
    var whole = parseFloat(sec[0]);
    var result = '';
    if(sec.length > 1){
        var dec = new String(sec[1]);
        dec = String(parseFloat(sec[1])/Math.pow(10,(dec.length - decimals)));
        dec = String(whole + Math.round(parseFloat(dec))/Math.pow(10,decimals));
        var dot = dec.indexOf('.');
        if(dot == -1){
            dec += '.';
            dot = dec.indexOf('.');
        }
        while(dec.length <= dot + decimals) { dec += '0'; }
        result = dec;
    } else{
        var dot;
        var dec = new String(whole);
        dec += '.';
        dot = dec.indexOf('.');
        while(dec.length <= dot + decimals) { dec += '0'; }
        result = dec;
    }
    return result;
}
$.fn.ForceNumericOnly =function(){
    return this.each(function()
    {
        $(this).keydown(function(e)
        {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
            return (
                key == 8 || 
                key == 9 ||
                key == 46 ||
                (key >= 37 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        })
    })
};

function setMeter(i){
    cash = Math.ceil((i-1)*400/16);
        
    $('#cash').val(cash);
    caculateRepay();
}

function caculateRepay(){
    cash = parseInt(document.getElementById('cash').value);
    
    if (cash> parseInt(max_cash)){
        cash = max_cash;
        $('#cash').val(cash);
    }   
    else if (cash < parseInt(min_cash)){
        cash = min_cash;
        $('#cash').val(cash);
    }   
    
    days = parseInt($('#days').val());
    if (days > parseInt(max_day)){
        days = max_day;
        $('#days').val(days);
    }
    else if (days < parseInt(min_day)){
        days = min_day;
        $('#days').val(days);
    }
    
/*
Example 1:
       Loan amount: 100
       Period: 20 days
       100 x 390% = 390
       Interest charge = 390 / 365 x 20 = 21.37
       Admin Fee = 5.50 per loan
       Total cost = 21.37 + 5.50 = 26.87
Example 2: 
       Loan amount: 207
       Period: 30 days
       207 x 390% = 807.30
       Interest charge = 807.30 / 365 x 30 = 66.35
       Admin Fee = 5.50 per loan
       Total cost = 66.35 + 5.50 = 71.85
*/
       
    fees = cash * interest_rate/100/365*days + admin_fee;
    
    totaldate = new Date();    
    totaldate.setDate(totaldate.getDate() + days);   
    
    /////
    milestone = Math.floor(cash/400*16);
    $("#hands img").attr('src', baseUrl + "/images/cash/meters/"+milestone+".png");
    $('.calendar').datepicker("setDate", totaldate );
    ////    
    total = format_number(cash + parseFloat(fees), 2);    
    $('#totalvalue').val(currency + ' ' + total);    
    $('#totalcash').val(currency + ' ' + cash); 
    $('#totaldays').val(days); 
    $('#totalfees').val(currency + ' ' + format_number(admin_fee, 2)); 
    $('#totaldate').val(dateFormat(totaldate, "dd mmmm yyyy")); 
    
    $(".pre-cash").val($('#cash').val());
    $("#pre-totalvalue").val($('#totalvalue').val());
    $("#pre-fees").val($('#totalfees').val());
    $("#pre-days").val($('#days').val());
    
    //update APR
    //$.ajax({
    //    url: baseUrl + "/index.php/home/caculate?cash="+cash+"&total="+total+"&paydate="+dateFormat(totaldate, "yyyy-mm-dd"),
    //    success: function(html){
    //        $('#apr').val('APR '+html+'%');
    //    }
    //});
}
function plusNumber(obj, max, step){
    current = parseInt($(obj).val());
    if (current + step > max){
        $(obj).val(current);
    }
    else{
        value = current + step;
        value = parseInt(value/step)*step;
        $(obj).val(value);
    }
}
function minusNumber(obj, min, step){
    current = parseInt($(obj).val());
    if (current - step < min){
        $(obj).val(min);
    }
    else{
        value = current - step;
        value = parseInt(value/step)*step;
        $(obj).val(value);
    }
}

$(document).ready(function(){
    $(".defaultText").focus(function(srcc){
        if ($(this).val() == $(this)[0].title) {
            $(this).removeClass("defaultTextActive");
            $(this).val("");
        }
    });
    
    $(".defaultText").blur(function() {
        if ($(this).val() == "") {
            $(this).addClass("defaultTextActive");
            $(this).val($(this)[0].title);
        }
    });
    
    $(".defaultText").blur();     
    
    $('.mainmenu ul li.active').addClass('active_'+$('.mainmenu ul li.active').index());
})