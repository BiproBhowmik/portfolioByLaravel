  <script type="text/javascript">
    {{-- Ajax Brand Insert --}}
    $("#addAboutForm").submit(function(event) {
      event.preventDefault();

      let aboutText = $("#summernote").val();
      let _token = $("input[name=_token]").val();
        
      // console.log(aboutText);
      // console.log(_token);

        $.ajax({
        url: "{{ route('ajaxAddAboutText') }}",
          type: "POST",
          data:{
            aboutText:aboutText,
            _token:_token
          },
          success:function(response)
          {
            if (response) {

              var x = document.getElementById("successTost");
                x.style.display = "block";

            }
          }
        });
      });
    {{-- Ajax Brand Insert --}}

    {{-- Ajax Brand Insert --}}
    $("#updateAboutForm").submit(function(event) {
      event.preventDefault();

      let abtId = $("#abtId").val();
      let aboutText = $("#summernote").val();
      let _token = $("input[name=_token]").val();
        
      console.log(abtId);
      console.log(aboutText);
      console.log(_token);

        $.ajax({
        url: "{{ route('ajaxUpdateAboutText') }}",
          type: "POST",
          data:{
            abtId:abtId,
            aboutText:aboutText,
            _token:_token
          },
          success:function(response)
          {
            if (response) {

              var x = document.getElementById("successTost");
                x.style.display = "block";

            }
          }
        });
      });
    {{-- Ajax Brand Insert --}}

    
  </script>