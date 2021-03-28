  <script type="text/javascript">
    {{-- Ajax Brand Insert --}}
    $("#addLangForm").submit(function(event) {
      event.preventDefault();

      let langName = $("#langName").val();
      let _token = $("input[name=_token]").val();

      console.log(langName);
      // console.log(_token);

      $.ajax({
        url: "{{ route('ajaxAddLanguage') }}",
        type: "POST",
        data:{
          langName:langName,
          _token:_token
        },
        success:function(response)
        {
          if (response) {
            $("#addLangForm")[0].reset();

            $(".langTable tbody").prepend('<tr><td>'+"New"+'</td><td>'+response.lanName+'</td><td>'+"Added"+'</td></tr>');

            var x = document.getElementById("successTost");
            x.style.display = "block";

          }
        }
      });
    });
    {{-- Ajax Brand Insert --}}



    function editLanuese(id) {
     console.log("id = "+id);

     $.get('langfindByIdAjax/'+id, function(languese) {
        // console.log(id);
        $('#updatelangName').val(languese.lanName);
        $('#updatelangId').val(languese.lanId);
        $('#langUpdateModal').modal("toggle");
      });
   }

   {{-- Ajax Brand Insert --}}
   $("#updateLangForm").submit(function(event) {
    event.preventDefault();

    let langId = $("#updatelangId").val();
    let langName = $("#updatelangName").val();
    let _token = $("input[name=_token]").val();

    console.log(langName);
      // console.log(_token);

      $.ajax({
        url: "{{ route('ajaxUpdateLanguage') }}",
        type: "POST",
        data:{
          langId:langId,
          langName:langName,
          _token:_token
        },
        success:function(response)
        {
          if (response) {

            $("#langId"+response.lanId+' td:nth-child(2)').text(response.lanName);
            $("#langUpdateModal").modal('toggle');
            $("#updateLangForm")[0].reset();

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
   $(".langDelete").click(function(){

    $confirm = confirm("Delete Languese!");

    if ($confirm) {
      var langId = $(this).data("id");
      var token = $("meta[name='csrf-token']").attr("content");

    // console.log(token);
    
    $.ajax(
    {
      url: "ajaxDeleteLanguage/"+langId,
      {{-- url: "{{ route('brDeleteAjax', "brId") }}", --}}
      type: 'DELETE',
      data: {
        langId:langId,
        _token:token,
      },
      success:function(response)
      {
        $('#langId'+langId).remove();

        // Toste
          var x = document.getElementById("successTost");
          x.style.display = "block";
          // Toste

      }
    });
  }

});


</script>