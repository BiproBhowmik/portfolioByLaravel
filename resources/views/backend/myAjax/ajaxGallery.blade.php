  <script type="text/javascript">
  {{-- Ajax Brand Delete --}}
    $(".commonDelete").click(function(){

      $confirm = confirm("Delete!");

      if ($confirm) {
        var commonId = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");

     console.log(commonId);
     console.log(token);
    
    $.ajax(
    {
      url: "ajaxDeleteGalleryImage/"+commonId,
      {{-- url: "{{ route('brDeleteAjax', "brId") }}", --}}
      type: 'DELETE',
      data: {
        commonId:commonId,
        _token:token,
      },
      success:function(response)
      {
        $('#commonId'+commonId).remove();
        // console.log(response);

        // Toste
        var x = document.getElementById("successTost");
        x.style.display = "block";
          // Toste

      }
    });
  }

});

      </script>