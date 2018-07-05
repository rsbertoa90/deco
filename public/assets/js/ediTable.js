$(window).on('load',function()
{
    
    // GUARDAR DATOS - TABLA DE SEMINARIOS
    $('#seminars-table').editableTableWidget();
    var saveData = function(data){
        var dataId = $(data).parent().attr('data-id');
        
        var value = $(data).text();
        var field = $(data).attr('data-field');
        // console.log(value);
        
        if(value !=''){
            $.ajax({
                method:'put',
                url: `/api/seminar/edit`,
                data: {
                    dataId : dataId,
                    value : value,
                    field : field,
                },
                success: function(response){
                   
                    // console.log(response);
                    
                }
            });
        }
    }

    $('[data-editable]').each(function(){
        $(this).on('change',function(){
            console.log(this);
            saveData(this);
        });
    });
    
    
//     // BORRAR SEMINARIO

//     $('.delete-seminar').each(function(){
//         $(this).on('click',function(){
//             dataId = $(this).parent().parent().parent().attr('data-id');
//             console.log(dataId);
            
//             var removeRow =  function()
//             {
//                 var row = $('#seminars-table').find(`tr [data-id=${dataId}]`);
//                 console.log(row);
//                 $('#seminars-table').remove(row);
//             }
//             $.ajax({
//                 method:'delete',
//                 url: `/api/seminar/delete/${dataId}`,
//                 success: function(){
//                     removeRow();
//                 }
//             });
//         });
//     });

// });


// CREAR SEMINARIO

    $('#create-seminar').on('click',function()
    {
        var div = '<div id="create-form-container"></div>';
        $('#tables-container').append(div);
        $('#create-form-container').load('/api/seminar/create-form');
    });

    //CREAR EVENTO
    var afterLoad = function(){
        // console.log('afterLoad');
        poblateCitySelectors();    
        // Esconder ciudad/provincia si el seminario sera online
        $('#mode-select').on('change',function(){
            if($(this).val()=='online'){
                $('#state-row').hide();
                $('#city-row').hide();
                
            }
            else
            {
                $('#state-row').show();
                $('#city-row').show();
                
            }
        });

    }
   
    $('#create-event').on('click',function()
    {
        var div = '<div id="create-form-container"></div>';
        $('#event-tables-container').append(div);
        $('#create-form-container').load('/api/event/create-form',afterLoad);
    });
    $('#online-create-event').on('click',function()
    {
        var div = '<div id="create-form-container"></div>';
        $('#online-event-tables-container').append(div);
        $('#create-form-container').load('/api/event/create-form',afterLoad);
    });




    //EVENTOS 
    dateSelectors = $('[name="date"]');
    dateSelectors.each(function(){
        $(this).on('change',function(){
            var id = $(this).parent().parent().attr('data-id');
            // console.log(id);
            var date =$(this).val();

            // console.log(date);
            
            $.ajax({
                data : {date:date, id:id},
                url : 'api/event/updateDate',
                method : 'PUT'
            });

        });
    });

    timeSelectors = $('[name="time"]');
    timeSelectors.each(function(){
        $(this).on('change',function(){
            var id = $(this).parent().parent().attr('data-id');
            // console.log(id);
            var time =$(this).val();
            console.log(time);
            
            $.ajax({
                data : {time:time, id:id},
                url : 'api/event/updateTime',
                method : 'PUT'
            });

        });
    });
    
    
    editableFields = $('[contenteditable]');
    $(editableFields).each(function(){
        $(this).keydown(function(e){
            if(e.which == 13){
                $(this).blur();
            }
        });

        $(this).on('blur',function(){
            value = $(this).text().trim();
            if($.isNumeric(value))
            {
               field = $(this).attr('data-field');
               id =  $(this).parent().parent().attr('data-id');
             
               $.ajax({
                data : {field:field, id:id, value:value},
                url : 'api/event/updateNumericField',
                method : 'PUT'
            });
            }
        });

        
       
    });
    

})


