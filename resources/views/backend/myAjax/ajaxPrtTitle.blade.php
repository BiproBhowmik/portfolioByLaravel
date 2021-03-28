  <script type="text/javascript">
    {{-- Ajax Brand Insert --}}
    $("#addprtTitleForm").submit(function(event) {
      event.preventDefault();

      let prtName = $("#prtName").val();
      let prtTitle = $("#prtTitle").val();
      let profPicture = $("#profPicture").val();
      let covPicture = $("#covPicture").val();
      let _token = $("input[name=_token]").val();
        
       console.log(profPicture);
      // console.log(_token);

        $.ajax({
        url: "{{ route('ajaxAddPetTitle') }}",
          type: "POST",
          data:{
            prtName:prtName,
            prtTitle:prtTitle,
            //profPicture:profPicture,
            covPicture:covPicture,
            _token:_token
          },
          success:function(response)
          {
            if (response) {

              console.log("inserted");

            }
          }
        });
      });
    {{-- Ajax Brand Insert --}}

    {{-- Ajax Brand Insert --}}
    $("#updateprtTitleForm").submit(function(event) {
      event.preventDefault();

      let prtId = $("#prtId").val();
      let prtTitle = $("#prtTitle").val();
      let _token = $("input[name=_token]").val();
        
      // console.log(prtTitle);
      // console.log(_token);

        $.ajax({
        url: "{{ route('ajaxUpdatePetTitle') }}",
          type: "POST",
          data:{
            prtId:prtId,
            prtTitle:prtTitle,
            _token:_token
          },
          success:function(response)
          {
            if (response) {

              console.log("Updated");

            }
          }
        });
      });
    {{-- Ajax Brand Insert --}}


  </script>