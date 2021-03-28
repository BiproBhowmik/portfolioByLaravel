  <script type="text/javascript">
    {{-- Ajax Brand Insert --}}
    $("#addCommonForm").submit(function(event) {
      event.preventDefault();

      let profileTitle = $("#profileTitle").val();
      let profileLink = $("#profileLink").val();
      let _token = $("input[name=_token]").val();
      
      //  console.log(profileTitle);
      // console.log(_token);

      $.ajax({
        url: "{{ route('ajaxAddProfile') }}",
        type: "POST",
        data:{
          profileTitle:profileTitle,
          profileLink:profileLink,
          _token:_token
        },
        success:function(response)
        {
          if (response) {
            $("#addCommonForm")[0].reset();

            $(".langTable tbody").prepend('<tr><td>'+"New"+'</td><td>'+response.prlTitle+'</td><td>'+response.prlLink+'</td><td>'+"Added"+'</td></tr>');

              // Toste
              var x = document.getElementById("successTost");
              x.style.display = "block";
          // Toste

        }
      }
    });
    });
    {{-- Ajax Brand Insert --}}


    {{-- Ajax Brand Delete --}}
    $(".commonDelete").click(function(){

      $confirm = confirm("Delete!");

      if ($confirm) {
        var commonId = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");

    // console.log(token);
    
    $.ajax(
    {
      url: "ajaxDeleteProfile/"+commonId,
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