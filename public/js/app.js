// Default Color Palate
if(window.localStorage.getItem('color1')){
    document.documentElement.style.setProperty('--color1', window.localStorage.getItem('color1'));
    document.documentElement.style.setProperty('--color1-11', window.localStorage.getItem('color111'));
    document.documentElement.style.setProperty('--color1-33', window.localStorage.getItem('color133'));
    document.documentElement.style.setProperty('--color1-88', window.localStorage.getItem('color188'));
    document.documentElement.style.setProperty('--color1-cc', window.localStorage.getItem('color1cc'));
}
// end default Color Palate

$(document).ready(function(){
    $(document).mouseup(function(e){
        var container = $(".sub-menu");
        // if the target of the click isn't the container nor a descendant of the container
        if ((!container.is(e.target) && container.has(e.target).length === 0))
        {
            container.removeClass('show');
        }
    });
    
    
    $('.card.collapsable .card-header').click(function(){
        if($(this).parent().children('.card-body').css('display') == 'none'){
            $(this).parent().children('.card-body').slideDown(300);
            $(this).children('.arrow').removeClass('down');
        }else{
            $(this).parent().children('.card-body').slideUp(300);
            $(this).children('.arrow').addClass('down');
        }
    });

    // Slide Down Menu
    $('.ico-menu input[type="checkbox"]:checked').parents('li').find('ul').slideDown(300);
    $('.ico-menu input[type="checkbox"]').change(function(){
        if($(this).is(':checked')){
            $(this).parents('li').find('ul').slideDown(300);
        }else{
            $(this).parents('li').find('ul').slideUp(300);
        }
    });

    // HASH CHANGE MASTER
    $('.side-nav li a[href="'+ window.location+'"]').parent().addClass('active').siblings().removeClass('active');
    $('.side-nav li a[href="'+ window.location+'"]').parents('.drop-menu').addClass('m-active').find('.submenu').removeClass('collapse')
    $(window).on('hashchange', function() {
        $('.side-nav li').removeClass('active');
        $('.side-nav li a[href="'+ window.location +'"]').parent().addClass('active');
    });

    // p.alert
    setTimeout(function(){
         $('p.alert, div.alert').slideUp(300);
    }, 3000);

    // Color Palate
    $('.clr').click(function(){
        var color = $(this).attr('fill');
        window.localStorage.setItem('color1',color);
        window.localStorage.setItem('color111',color+'11');
        window.localStorage.setItem('color133',color+'33');
        window.localStorage.setItem('color188',color+'88');
        window.localStorage.setItem('color1cc',color+'cc');
        document.documentElement.style.setProperty('--color1', color);
        document.documentElement.style.setProperty('--color1-11', color+'11');
        document.documentElement.style.setProperty('--color1-33', color+'33');
        document.documentElement.style.setProperty('--color1-88', color+'88');
        document.documentElement.style.setProperty('--color1-cc', color+'cc');
    });
    //end Color Palate
   
    // Slick Slider
    if($('.slider-1').length > 0){
        $('.slider-1').slick({
            autoplay: true,
            arrows  : false,
            fade    : true,
            pauseOnHover: false,
            speed   : 1000,
            autoplaySpeed: 5000
        });
    }

    // data-coppier
    $('[data-copy-trigger]').click(function(){
        $(this).parents('[data-coppier]').find('[data-copy]').each(function(){
            var cpy = $(this).data('copy');
            $(this).parents('[data-coppier]').find('select[data-paste="'+cpy+'"]').html($(this).html());
            $(this).parents('[data-coppier]').find('[data-paste="'+cpy+'"]').val($(this).val());
        });
    });

    //settings-content
    var dashboardSetting = localStorage.getItem('dashboardSetting') || '';
    console.log(dashboardSetting);
    var dSArr = dashboardSetting.split(',');
    $('body').addClass(dSArr.join(' '));
    $('.settings-content [type="checkbox"]').each(function(){
        if(dSArr.indexOf($(this).data('cls')) > -1){
            $(this).attr('checked', true);
        }
    });
    $('.settings-content [type="checkbox"]').change(function(){
        let index = dSArr.indexOf($(this).data('cls'));
        if($(this).is(':checked')){
            $('body').addClass($(this).data('cls'));
            if (index < 0) {
                dSArr.push($(this).data('cls'));
            }
        }else{
            $('body').removeClass($(this).data('cls'));
            if (index > -1) {
                dSArr.splice(index, 1); // 2nd parameter means remove one item only
            }
        }
        localStorage.setItem('dashboardSetting',dSArr);
        console.log(dSArr);
    });

    

});
function openMenu(a){
    $('#menu-'+a).addClass('show').siblings().removeClass('show');
}

function nextForm(d){
    var cur = $(d).parents('.form-section');
	let	nextStep = $(d).parents('.form-section').next();
		$("#progressbar li").eq($(".form-section").index(nextStep)).addClass("active current").siblings().removeClass("current");
		nextStep.show();
		cur.hide();
}
function prevForm(d){
    var cur = $(d).parents('.form-section');
	let	prevStep = $(d).parents('.form-section').prev();
		$("#progressbar li").eq($(".form-section").index(cur)).removeClass("current").prev().addClass('active current');
		prevStep.show();
		cur.hide();
}
function gotoForm(d){
    if($(d).hasClass("active")){
        $(d).addClass("current").siblings().removeClass("current");
        $(".form-section").eq($("#progressbar li").index($(d))).show().siblings().hide();
    }
}
function getField(d){
    let showBtn = false;
    if(d.value.trim() != ""){
        $(d).parents('.repeat-div').find('.ttl').removeClass('collapse').find('span').text(d.value);
        $(d).parents('.repeat-container').find('.repeat-div .ttl').each(function(){
            showBtn = $(this).hasClass('collapse')?showBtn:true;
        });
        if(showBtn){
            $(d).parents('.repeat-container').find('.add-new').removeClass('collapse');
        }else{
            $(d).parents('.repeat-container').find('.add-new').addClass('collapse');
        }
    }
}
function addNewLand(d,div,addHere){
    $(div).clone().appendTo(addHere).removeClass('clone').addClass('collapse').prepend('<i class="priya-close" onclick="removeParent(this)"></i>').find("input, textarea").val("").parents('.repeat-div').slideDown(300);
    
}
function removeParent(d){
    $(d).parent().slideUp(300, function(){
        $(this).remove();
    });
}
function repeatAccordion(d){
    $(d).parents('.repeat-container').find('.repeat-accordion').hide(300);
    $(d).parents('.repeat-div').find('.repeat-accordion').show(300);
}
function addClassTo(slctr,clses){
    $(slctr).addClass(clses)
}
function removeClassFrom(slctr,cls){
    $(slctr).removeClass(cls)
}
function toggleCls(d,slctr,cls){
    if($(slctr).hasClass(cls)){
        $(slctr).removeClass(cls);
        $(d).removeClass('priya-close').addClass('priya-edit');
    }else{
        $(slctr).addClass(cls);
        $(d).removeClass('priya-edit').addClass('priya-close');
    }
}
function showPassword(d){
    var input = $(d).parents('.input-group').find('input');
    if(input.attr('type') == 'password'){
        input.attr('type','text');
        $(d).removeClass('priya-eye-slash').addClass('priya-eye');
        setTimeout(function(){
            input.attr('type','password');
            $(d).removeClass('priya-eye').addClass('priya-eye-slash');
        }, 1500);
    }
}
function hidePassword(d){
    var input = $(d).parents('.input-group').find('input');
    setTimeout(function(){
        input.attr('type','password');
        $(d).removeClass('priya-eye').addClass('priya-eye-slash');
    }, 300);
}

// PR ALERT
function prAlert(msg,options){
    var id = new Date().getTime();
    msg = msg || '-- No Message --';
    options = options || {};
    var prAlert = `<div class="prAlert-wrapper" id="`+id+`"> <div class="prAlert-box"><i onclick="prAlertCancel(this)">&times;</i>`;
    if(options.header){
        prAlert +=`<header>`+options.header+`</header>`;
    }
    
    prAlert +=`<div class="body">`+msg+`</div> <footer>`;
    if(options.confirm && options.callback == 'link'){
        var link = options.ele.href;
        var target = options.ele.target || '_self';
        
        $(options.ele).removeAttr('href');
        if($(options.ele).attr('data-href')){
            link = $(options.ele).attr('data-href');
        }else{
            $(options.ele).attr('data-href',link);
        }
        prAlert +=` <span class="btn" onclick="prAlertCancel(this);window.open('`+ link +`', '`+target+`')">Ok</span>
                <span class="btn btn-cancel" onclick="prAlertCancel(this)">Cancel</span>`;
    }else if(options.confirm){
        prAlert +=` <span class="btn" onclick="prAlertCancel(this);$(`+options.callback+`)">Ok</span>
                <span class="btn btn-cancel" onclick="prAlertCancel(this)">Cancel</span>`;
    }else{
        prAlert +=` <span class="btn" onclick="prAlertCancel(this);$(`+options.callback+`)">Ok</span>`;
    }
    prAlert +=`</footer></div><div class="prAlert-bg"></div></div>`;
    $('body').append(prAlert);
    setTimeout(function(){
        $('#'+id).addClass('show');
    },100);
    
}
function prAlertCancel(dis){
    $(dis).parents('.prAlert-wrapper').removeClass('show');
    setTimeout(function(){
        $(dis).parents('.prAlert-wrapper').remove();
    },500);
}

function helpModal(s){
    $(s).show(0,function(){
        $(this).addClass('popin');
    });
}
function helpModalHide(s){
    $(s).parents('.help-modal').removeClass('popin');
    setTimeout(function(){
        $(s).parents('.help-modal').hide();
    },1500);
}
function toggleSubmenu(d){
    if($(d).parent().hasClass('m-active')){
        $(d).parent().removeClass('m-active');
        $(d).parent().children('ul').slideUp(300);
    }else{
        $(d).parent().addClass('m-active');
        $(d).parent().children('ul').slideDown(300);
        $(d).parent().siblings().removeClass('m-active');
        $(d).parent().siblings().children('ul').slideUp(300);
    }
}
function prToast(msg,opt){
    msg = msg || '';
    opt = opt || {};
    opt.type = opt.type || 'info';
    opt.delay = opt.delay || 5000;
    opt.left = opt.left || 'auto';
    opt.top = opt.top || 0;
    opt.right = opt.right || 0;
    opt.bottom = opt.bottom || 'auto';
    if($('.pr-toast-container').length < 1){
        $('body').append('<div class="pr-toast-container" style="padding: 15px; position: fixed; z-index: 10000; top:'+opt.top+'; right:'+opt.right+'; bottom:'+opt.bottom+'; left:'+opt.left+'"></div>');
    }
    var t = Date.now();
    var alert = '<section id="'+t+'" class="alert collapse alert-'+ opt.type +'" style="position:static; margin:0 0 5px">'+ msg +'</section>';
    if(opt.bottom == 'auto'){
        $('.pr-toast-container').prepend(alert);
        $('#'+t).slideDown(500);
    }else{
        $('.pr-toast-container').append(alert);
        $('#'+t).slideDown(500);
    }
    setTimeout(function(){
        $('#'+t).slideUp(300, function(){$(this).remove();})
    }, opt.delay);
}

function toggleNoti(d){
    $(d).parent().find('.notification-details').addClass('active');
    $(d).parent().find('.noti-bg').fadeIn(300);
    $('body').css({'overflow':'hidden','padding-right':'0.4em'});
    let cnt = 1; 
    $(d).parent().find('.notification-details .noti-single').each(function(){
        let timeDelay = 200;
        let dis = $(this);
        setTimeout(function(){
            dis.addClass('in');
        }, timeDelay*cnt );
        cnt++;
    });
}
function closeNoti(){
    $('.notification-details').removeClass('active');
    $('.noti-bg').fadeOut(300);
    $('body').css({'overflow':'','padding-right':''});
    $('.notification-details .noti-single').removeClass('in');
}

// function composeMsg(){
//     if($('.notification-details .compose').css('display') == 'none'){
//         $('.notification-details .msgs').slideUp(300);
//         $('.notification-details .compose input:not([type="hidden"])').val('');
//         $('.notification-details .compose input').attr('readonly',false);
//         $('.notification-details .compose').slideDown(300);
//     }else{
//         $('.notification-details .msgs').slideDown(300);
//         $('.notification-details .compose').slideUp(300);
//     }
// }

function replyTo(s){
    composeMsg();
    $('#users_list').val(s.label).attr('readonly',true);
    $('#users_id').val(s.id);
}

function previewImg(d){
    if($('preview-img').length){
        $('preview-img').remove();
    }else{
        $('body').prepend('<preview-img><close>X</close><img src="'+d.src+'" /></preview-img>');
        setTimeout(function(){
            $('preview-img').addClass('in');
        },100);
        $('preview-img close').click(function(){
            $(this).parent().fadeOut(300, function(){
                $(this).remove();
            });
        });
    }
}

$(document).ready(function(){
    if($('.datatable').length > 0){
        $('.datatable').DataTable({
            // scrollY: 100,
            "language": {
                "paginate": {
                  "previous": "<i class='priya-chevron-left'></i>",
                  "next": "<i class='priya-chevron-right'></i>"
                }
              },
            "drawCallback": function () {
                $('.card .paginate_button').addClass('btn');
            },
            "initComplete": function(settings, json) {
                $('table.datatable').wrap('<div class="table-responsive"></div>');
            }
        });
    }
});