$(function () {
 $('#link_news').click(function(){
 $.ajax({
     url: '/ajax',
     data:'?find=news',
     success: function(data){
         $('#news').html(data);
     },
     error: function(data){
         $('#news').html(data);
     }
 });
 });
});