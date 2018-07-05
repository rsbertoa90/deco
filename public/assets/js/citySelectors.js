$(window).on('load',function(){

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
   
var countrysUrl = 'http://pilote.techo.org/?do=api.getPaises';
var statesUrl = 'http://pilote.techo.org/?do=api.getRegiones?idPais=';
var citysUrl = 'http://pilote.techo.org/?do=api.getCiudades?idRegionLT=';

var fetchData  = function(url,selectors,callback) {
	fetch(url)
		.then(function (response) {
			return response.json();
		})
		.then(function (dataa) {
            // console.log(dataa.contenido);
            callback(selectors,dataa.contenido);
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
       $.each(withdata, function(key,value){
               var opt = `<option data-code="${value}" value="${key}">${key}</option>`;
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
            dataId = $(this).parent().parent().attr('data-id'); 
            // console.log(dataId);
            
            selected = $(this).val();
            code=$(this).find('option:selected').attr('data-code');
            url=statesUrl+code;
            $(stateSelectors).each(function(){ 
                if ($(this).attr('data-id').trim() == dataId.trim()){
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
                            if ($(this).attr('data-id').trim() == dataId.trim())
                            {
                                selector = this;
                                dataId = dataId.trim();
                                fetchData(url, selector,poblate);
                            }
                            $(this).on('change',function(){
                                $(this).parent().find('span').hide();
                                selectedCity = $(this).val();
                                updateCity(dataId,selectedState,selectedCity);

                            });
                        });
                        
                });
            
            });
        }
    }
       
    


    

});