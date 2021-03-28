  <script type="text/javascript">
    {{-- Ajax Brand Insert --}}
    $("#commonAddForm").submit(function(event) {
      event.preventDefault();

      let commonName = $("#commonName").val();
      let commonSkill = $("#commonSkill").val();
      let _token = $("input[name=_token]").val();
      
       // console.log(commonName);
      // console.log(_token);

      $.ajax({
        url: "{{ route('ajaxAddPerSkill') }}",
        type: "POST",
        data:{
          commonName:commonName,
          commonSkill:commonSkill,
          _token:_token
        },
        success:function(response)
        {
          if (response) {
            $("#commonAddForm")[0].reset();

            $("#datatable tbody").prepend('<tr><td>'+"New"+'</td><td>'+response.perSName+'</td><td>'+response.perSper+'</td><td>'+"Added"+'</td></tr>');

              // console.log(response);
              // Toste
              var x = document.getElementById("successTost");
              x.style.display = "block";
          // Toste

        }
      }
    });
    });
    {{-- Ajax Brand Insert --}}


    {{-- Ajax Brand Insert --}}
    $("#updateCommonForm").submit(function(event) {
      event.preventDefault();

      let commonId = $("#updateCommonId").val();
      let commonName = $("#updateCommonName").val();
      let commonSkill = $("#updateCommonSkill").val();
      let _token = $("input[name=_token]").val();
      
       // console.log(commonName);
      // console.log(_token);

      $.ajax({
        url: "{{ route('ajaxUpdatePerSkill') }}",
        type: "POST",
        data:{
          commonId:commonId,
          commonName:commonName,
          commonSkill:commonSkill,
          _token:_token
        },
        success:function(response)
        {
          if (response) {

              //console.log(response);

              $("#commonId"+response.perSId+' td:nth-child(2)').text(response.perSName);
              $("#commonId"+response.perSId+' td:nth-child(3)').text(response.perSper);
              $("#commonUpdateModal").modal('toggle');
              $("#updateCommonForm")[0].reset();

          // Toste
          var x = document.getElementById("successTost");
          x.style.display = "block";
          // Toste

        }
      }
    });
    });
    {{-- Ajax Brand Insert --}}



    function editCommon(id) {
     console.log("id = "+id);

     $.get('perSfindByIdAjax/'+id, function(responce) {
        // console.log(id);
        $('#updateCommonId').val(responce.perSId);
        $('#updateCommonName').val(responce.perSName);
        $('#updateCommonSkill').val(responce.perSper);
        $('#commonUpdateModal').modal("toggle");
      });
   }

   {{-- Ajax Brand Delete --}}
   $(".commonDelete").click(function(){

    $confirm = confirm("Delete!");

    if ($confirm) {
      var commonId = $(this).data("id");
      var token = $("meta[name='csrf-token']").attr("content");

    // console.log(token);
    
    $.ajax(
    {
      url: "ajaxDeletePerSkill/"+commonId,
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