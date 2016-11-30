$(document).on('click','.pagination a',function(e){
    e.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    getdata(page, $('#search').val());
})

function getdata(page, search){
    var url  = window.location;
    
    $.ajax({
        type  : 'get',
        url   : url+'?page='+page,
        data  : {'search': search}
    }).done(function(data){
      $('.result').html(data);
    })
}