var updateCity = function(dataId,state,city){
    var data = {id:dataId,state:state,city:city};
    $.ajax({
        method: 'PUT',
        url:'/api/event/updateCity',
        data:data,
        success: function(response){
            // console.log(response);
            
        }
    });
}


var poblateCitySelectors = function(){

    

var countrysUrl = '/api/countrys/';
var statesUrl = '/api/states/';
var citysUrl = '/api/citys/';

var fetchData  = function(url,selectors,callback) {
	fetch(url)
		.then(function (response) {
			return response.json();
		})
		.then(function (dataa) {
            // console.log(dataa);
            callback(selectors,dataa);
		})
		.catch(function (error) {
			console.error(`ERROR: ${error}`);
		});
};

var poblate =  function(selectors, withdata){
    $(selectors).each(function(){
       var selector = this;
    //    console.log('poblate this',this);
       $(this).empty();
       var opt = `<option value="">Cambiar</option>`;
       $(selector).append(opt);
       $.each(withdata, function(el){
          el = withdata[el];   
               var opt = `<option data-code="${el.id}" value="${el.name}">${el.name}</option>`;
               $(selector).append(opt);    
            });
    });


    
    
}

var countrySelectors = $('.country-selector');

    if ($(countrySelectors).length)
    { 
       fetchData(countrysUrl,countrySelectors,poblate);
       $(countrySelectors).each(function(){
        var stateSelectors = $('.state-selector');

        $(this).on('change',function(){
            $(this).parent().find('span').hide();
            if($(this).attr('data-id') > 0 ){
                dataId = $(this).parent().parent().attr('data-id'); 
            } else { dataId = 0 ;}

            // console.log(dataId);
            
            selected = $(this).val();
            code=$(this).find('option:selected').attr('data-code');
            url=statesUrl+code;
            $(stateSelectors).each(function(){ 
                if (typeof dataId == 'undefined'){dataId = "0";}
                if ( $(this).attr('data-id').trim() == dataId.trim()){
                    selector = this;
                    fetchData(url, selector,poblate);

                    $(this).on('change',function(){
                        $(this).parent().find('span').hide();
                        var citySelectors = $('.city-selector');
                        dataId = $(this).parent().parent().attr('data-id'); 
                        selected = $(this).val();
                        code=$(this).find('option:selected').attr('data-code');
                        url = citysUrl+code;
                        
                        $(citySelectors).each(function()
                        { 
                            if (typeof dataId == 'undefined'){dataId = "0";}
                            if ($(this).attr('data-id').trim() == dataId.trim())
                            {
                                selector = this;
                                fetchData(url, selector,poblate);
                            }
                            $(this).on('change',function(){

                                $(this).parent().find('span').hide();
                            });
                            
                        });
                        
                });
            }
            });
                   
        });
    });
    }
    else
    {
        // console.log('NO COuntrYS');
        var stateSelectors = $('.state-selector');

        if($(stateSelectors).length > 0){

            statesUrl+=1;
            fetchData(statesUrl, stateSelectors,poblate);
            
            $(stateSelectors).each(function(){ 
                $(this).on('change',function(){
                        $(this).parent().find('span').hide();
                        

                        var citySelectors = $('.city-selector');
                        dataId = $(this).parent().parent().attr('data-id'); 
                        selectedState = $(this).val();
                        code=$(this).find('option:selected').attr('data-code');
                        url = citysUrl+code;
                        
                        $(citySelectors).each(function()
                        { 
                            // console.log(dataId);
                            if (typeof dataId == 'undefined'){dataId = "0";}
                            if (  $(this).attr('data-id').trim() == dataId.trim())
                            {
                                selector = this;
                                dataId = dataId.trim();
                                fetchData(url, selector,poblate);
                            }
                            if(dataId>0){

                                $(this).on('change',function(){
                                    $(this).parent().find('span').hide();
                                    selectedCity = $(this).val();
                                    updateCity(dataId,selectedState,selectedCity);
                                });
                            }
                        });
                        
                });
            
            });
        }
    }
       
    


    

};

$(window).on('load',poblateCitySelectors);

// $('#create-event').on('click',function(){
//     poblateCitySelectors();
// });