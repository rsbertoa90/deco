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




    //EVENTOS 

    


})


