  <script type="text/javascript">
    {{-- Ajax Brand Insert --}}
    $("#commonAddForm").submit(function(event) {
      event.preventDefault();

      let commonName = $("#commonName").val();
      let commonBg = $("#commonBg").val();
      let commonGpa = $("#commonGpa").val();
      let commonInstitute = $("#commonInstitute").val();
      let commonSdate = $("#commonSdate").val();
      let commonEdate = $("#commonEdate").val();
      let _token = $("input[name=_token]").val();
      
       // console.log(commonName);
      // console.log(_token);

      $.ajax({
        url: "{{ route('ajaxAddEducation') }}",
        type: "POST",
        data:{
          commonName:commonName,
          commonBg:commonBg,
          commonGpa:commonGpa,
          commonInstitute:commonInstitute,
          commonSdate:commonSdate,
          commonEdate:commonEdate,
          _token:_token
        },
        success:function(response)
        {
          if (response) {
            $("#commonAddForm")[0].reset();

            $("#datatable tbody").prepend('<tr><td>'+"New"+'</td><td>'+response.eduTitle+'</td><td>'+response.eduBacg+'</td><td>'+response.eduGpa+'</td><td>'+response.eduInsti+'</td><td>'+response.eduStartingDate+'</td><td>'+response.eduEndingDate+'</td><td>'+"Added"+'</td></tr>');

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
      let commonName = $("#updatecommonName").val();
      let commonBg = $("#updatecommonBg").val();
      let commonGpa = $("#updatecommonGpa").val();
      let commonInstitute = $("#updatecommonInstitute").val();
      let commonSdate = $("#updatecommonSdate").val();
      let commonEdate = $("#updatecommonEdate").val();
      let _token = $("input[name=_token]").val();
      
       // console.log(commonName);
      // console.log(_token);

      $.ajax({
        url: "{{ route('ajaxUpdateEdu') }}",
        type: "POST",
        data:{
          commonId:commonId,
          commonName:commonName,
          commonBg:commonBg,
          commonGpa:commonGpa,
          commonInstitute:commonInstitute,
          commonSdate:commonSdate,
          commonEdate:commonEdate,
          _token:_token
        },
        success:function(response)
        {
          if (response) {

              //console.log(response);

              $("#commonId"+response.eduId+' td:nth-child(2)').text(response.eduTitle);
              $("#commonId"+response.eduId+' td:nth-child(3)').text(response.eduBacg);
              $("#commonId"+response.eduId+' td:nth-child(4)').text(response.eduGpa);
              $("#commonId"+response.eduId+' td:nth-child(5)').text(response.eduInsti);
              $("#commonId"+response.eduId+' td:nth-child(6)').text(response.eduStartingDate);
              $("#commonId"+response.eduId+' td:nth-child(7)').text(response.eduEndingDate);
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

     $.get('edufindByIdAjax/'+id, function(responce) {
        // console.log(id);
        $('#updatecommonId').val(responce.eduId);
        $('#updatecommonName').val(responce.eduTitle);
        $('#updatecommonBg').val(responce.eduBacg);
        $('#updatecommonGpa').val(responce.eduGpa);
        $('#updatecommonInstitute').val(responce.eduInsti);
        $('#updatecommonSdate').val(responce.eduStartingDate);
        $('#updatecommonEdate').val(responce.eduEndingDate);
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
      url: "ajaxDeleteedu/"+commonId,
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