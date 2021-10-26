$(document).ready(function() {     

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $('i.glyphicon-thumbs-up, i.glyphicon-thumbs-down').click(function(){    
      var id = $(this).parents(".panel").data('id');
      var c = $('#'+this.id+'-bs3').html();
      var cObjId = this.id;
      var cObj = $(this);

      $.ajax({
         type:'POST',
         url:'/like',
         data:{id:id},
         success:function(data){
            if(jQuery.isEmptyObject(data.success.attached)){
              $('#'+cObjId+'-bs3').html(parseInt(c)-1);
              $(cObj).removeClass("like-post");
            }else{
              $('#'+cObjId+'-bs3').html(parseInt(c)+1);
              $(cObj).addClass("like-post");
            }
         }
      });

  });      

  $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
  });                                        
}); 