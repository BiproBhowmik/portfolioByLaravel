  <script type="text/javascript">
    {{-- Ajax Brand Insert --}}
    $("#addPerInfoForm").submit(function(event) {
      event.preventDefault();

      let fullName = $("#fullName").val();
      let phone = $("#phone").val();
      let email = $("#email").val();
      let location = $("#location").val();
      let dob = $("#dob").val();
      let _token = $("input[name=_token]").val();

      $.ajax({
        url: "{{ route('ajaxAddPerInfo') }}",
        type: "POST",
        data:{
          fullName:fullName,
          phone:phone,
          email:email,
          location:location,
          dob:dob,
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
    $("#updatePerInfoForm").submit(function(event) {
      event.preventDefault();

      let piId = $("#piId").val();
      let fullName = $("#fullName").val();
      let phone = $("#phone").val();
      let email = $("#email").val();
      let location = $("#location").val();
      let dob = $("#dob").val();
      let _token = $("input[name=_token]").val();

      $.ajax({
        url: "{{ route('ajaxUpdatePerInfo') }}",
        type: "POST",
        data:{
          piId:piId,
          fullName:fullName,
          phone:phone,
          email:email,
          location:location,
          dob:dob,
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