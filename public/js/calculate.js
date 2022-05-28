/****************************************
	* CALCULATIONS IN FORM
	* Version: 0.2.0
	* Author: Priyabrata Senapati
****************************************/

function calculate(){
	//calculate = null;
	// CALCULATIONS
	//--------------------------
	var model={};
	if( $('[data-pr-app] [data-pr-val]').length > 0 ){
	
		$('[data-pr-app] [data-pr-val]').each(function(){
			var app = $(this).parents('[data-pr-app]').data('pr-app');
			$('[data-pr-app='+app+'] [data-model], [data-common][data-model]').each(function(){
				var v = $(this).val() || '_blank_';
				var f;
				model[$(this).attr('data-model')] = ((v=='_blank_')?'':v);
				if(!isNaN(v)){
					f = $(this).attr('data-model') +'=' + v;
				}else{
					f = $(this).attr('data-model') +'="'+ ((v=='_blank_')?'':v) +'"';
				}
				eval(f);
			});
		
			// $(this).val(eval($(this).attr('data-pr-val')));
			let res1 = eval($(this).attr('data-pr-val'));
			console.log(res1);
			let fres = (!isNaN(res1))?res1:0;
			$(this).val(fres);
		});
		console.log(model);
		///alert(a+b+c);
	}
	
	//TAG
	if( $('[data-pr-app] res').length > 0 ){
		$('[data-pr-app] res').each(function(){
			var app = $(this).parents('[data-pr-app]').data('pr-app');
			$('[data-pr-app'+app+'] [data-model], [data-common][data-model]').each(function(){
				var v = $(this).val() || '_blank_';
				var f;
				if(!isNaN(v)){
					f = $(this).attr('data-model') +'=' + v;
				}else{
					f = $(this).attr('data-model') +'="'+ ((v=='_blank_')?'':v) +'"';
				}
				eval(f);
			});
			$(this).attr('r', $(this).text()).text(eval($(this).text()));
		});
	}
	
	
	// CALCULATIONS on change
	//--------------------------
	if($('[data-pr-app]').length > 0 ){
		$('[data-pr-app] [data-model], [data-common][data-model]').on('keyup change', function(event){
			let dotCount = ($(this).val().match(/\./g) || []).length;
			let keycodes = [110,190,96,48];
			console.log(keycodes.indexOf(event.which));
			if(((keycodes.indexOf(event.which) < 0) && $(this).val() != '') || dotCount > 1){
				let v = parseFloat($(this).val());
				// let round2 = Math.round(v * 100) / 100;
				$(this).val(v);
			}
            var currentModel = $(this).data('model');
			var app = $(this).parents('[data-pr-app]').data('pr-app');
			if( $('[data-pr-app='+app+'] [data-model]').length > 0 ){
                // PRIORITY
                for(var i=1;i<=10;i++){
				    $('[data-pr-app='+app+'] [data-pr-val]').each(function(){
                        if($(this).data('model') != currentModel){
                            var priority = parseInt($(this).data('priority')) || 1;
                            if(priority == i){
                                $('[data-pr-app='+app+'] [data-model], [data-common][data-model]').each(function(){
                                    var v = $(this).val() || '_blank_';
                                    var f;
                                    if(!isNaN(v)){
                                        f = $(this).attr('data-model') +'=' + v;
                                    }else{
                                        f = $(this).attr('data-model') +'="'+ ((v=='_blank_')?'':v) +'"';
                                    }
                                    eval(f);
                                });

								let res1 = eval($(this).attr('data-pr-val'));
								let fres = (!isNaN(res1))?res1:0;
                                $(this).val(fres);
                            }
                        }
                    });
                }
			}
			
			//TAG
			if( $('[data-pr-app] res').length > 0 ){
				$('[data-pr-app] res').each(function(){
					$('[data-pr-app] [data-model], [data-common][data-model]').each(function(){
						var v = $(this).val() || '_blank_';
						var f;
						if(!isNaN(v)){
							f = $(this).attr('data-model') +'=' + v;
						}else{
							f = $(this).attr('data-model') +'="'+ ((v=='_blank_')?'':v) +'"';
						}
						eval(f);
					});
					$(this).text(eval($(this).attr('r')));
				});
			}
		});
	}
	//-------------------------
	// END CALCULATIONS
	
}

$(document).ready(function(){
    
	//Date Range
    /*if($('[data-range-name]').length > 0){
        $('[data-range-name] [data-range]').change(function(){
            let dt = $(this).val();
            let stt = $(this).data('range-start');
            let end = $(this).data('range-end');
            $(this).parents('[data-range-name]').find('[data-range='+end+']').attr('min',dt);
            $(this).parents('[data-range-name]').find('[data-range='+stt+']').attr('max',dt);

            let toDate = $(this).parents('[data-range-name]').find('[data-range-start]').val();
            let fromDate = $(this).parents('[data-range-name]').find('[data-range-end]').val();
            
            let diff = new Date(toDate).getTime() - new Date(fromDate).getTime();
            let diffDays = diff / (1000*60*60*24) || 0;
            $(this).parents('[data-range-name]').find('[data-diff]').val(parseInt(diffDays)+1);
            calculate();
        });
    }*/

	if($('[data-pr-app]').length > 0){
        calculate();
    }

});