  <script type="text/javascript">
    {{-- Ajax Brand Insert --}}
    $("#commonAddForm").submit(function(event) {
      event.preventDefault();

      let commonPost = $("#commonPost").val();
      let commonPosi = $("#commonPosi").val();
      let commonCompany = $("#commonCompany").val();
      let commonSdate = $("#commonSdate").val();
      let commonEdate = $("#commonEdate").val();
      let _token = $("input[name=_token]").val();
      
       // console.log(commonSdate);
      // console.log(_token);

      $.ajax({
        url: "{{ route('ajaxAddExperience') }}",
        type: "POST",
        data:{
          commonPost:commonPost,
          commonPosi:commonPosi,
          commonCompany:commonCompany,
          commonSdate:commonSdate,
          commonEdate:commonEdate,
          _token:_token
        },
        success:function(response)
        {
          if (response) {
            $("#commonAddForm")[0].reset();

            $("#datatable tbody").prepend('<tr><td>'+"New"+'</td><td>'+response.expPost+'</td><td>'+response.expPosition+'</td><td>'+response.expCopN+'</td><td>'+response.expStartingDate+'</td><td>'+response.expEndingDate+'</td><td>'+"Added"+'</td></tr>');

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

      let commonId = $("#updatecommonId").val();
      let commonPost = $("#updatecommonPost").val();
      let commonPosi = $("#updatecommonPosi").val();
      let commonCompany = $("#updatecommonCompany").val();
      let commonSdate = $("#updatecommonSdate").val();
      let commonEdate = $("#updatecommonEdate").val();
      let _token = $("input[name=_token]").val();
      
       // console.log(commonPost);
      // console.log(_token);

      $.ajax({
        url: "{{ route('ajaxUpdateExp') }}",
        type: "POST",
        data:{
          commonId:commonId,
          commonPost:commonPost,
          commonPosi:commonPosi,
          commonCompany:commonCompany,
          commonSdate:commonSdate,
          commonEdate:commonEdate,
          _token:_token
        },
        success:function(response)
        {
          if (response) {

              //console.log(response);

              $("#commonId"+response.expId+' td:nth-child(2)').text(response.expPost);
              $("#commonId"+response.expId+' td:nth-child(3)').text(response.expPosi);
              $("#commonId"+response.expId+' td:nth-child(4)').text(response.expCopN);
              $("#commonId"+response.expId+' td:nth-child(5)').text(response.expStartingDate);
              $("#commonId"+response.expId+' td:nth-child(6)').text(response.expEndingDate);
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
       // console.log("id = "+id);

       $.get('expfindByIdAjax/'+id, function(responce) {
        // console.log(id);
        $('#updatecommonId').val(responce.expId);
        $('#updatecommonPost').val(responce.expPost);
        $('#updatecommonPosi').val(responce.expPosition);
        $('#updatecommonCompany').val(responce.expCopN);
        $('#updatecommonSdate').val(responce.expStartingDate);
        $('#updatecommonEdate').val(responce.expEndingDate);
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
      url: "ajaxDeleteexp/"+commonId,
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