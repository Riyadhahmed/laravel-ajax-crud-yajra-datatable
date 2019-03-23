<form id='create' action="" enctype="multipart/form-data" method="post"
      accept-charset="utf-8">
    <div class="box-body">
        <div id="status"></div>
        <div class="form-group col-md-4 col-sm-12">
            <label for=""> First Name </label>
            <input type="text" class="form-control" id="first_name" name="first_name" value=""
                   placeholder="" required>
            <span id="error_first_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-4 col-sm-12">
            <label for=""> last Name </label>
            <input type="text" class="form-control" id="last_name" name="last_name" value=""
                   placeholder="" required>
            <span id="error_last_name" class="has-error"></span>
        </div>
        <div class="form-group col-md-4 col-sm-12">
            <label for=""> Username </label>
            <input type="text" class="form-control" id="username" name="username" value=""
                   placeholder="" required>
            <span id="error_username" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-md-4 col-sm-12">
            <label for=""> Gender </label>
            <input type="text" class="form-control" id="gender" name="gender" value=""
                   placeholder="" required>
            <span id="error_gender" class="has-error"></span>
        </div>
        <div class="form-group col-md-4 col-sm-12">
            <label for=""> Password </label>
            <input type="password" class="form-control" id="password" name="password" value=""
                   placeholder="" required>
            <span id="error_password" class="has-error"></span>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-md-12">
            <input type="submit" id="submit" name="submit" value="Save" class="btn btn-primary">
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- /.box-body -->
</form>


<script>
    $(document).ready(function () {
        $('#loader').hide();
        $('#create').validate({// <- attach '.validate()' to your form
            // Rules for form validation
            rules: {
                username: {
                    required: true
                }
            },
            // Messages for form validation
            messages: {
                first_name: {
                    required: 'please enter name'
                }
            },
            submitHandler: function (form) {

                var myData = new FormData($("#create")[0]);
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                myData.append('_token', CSRF_TOKEN);

                $.ajax({
                    url: 'contacts',
                    type: 'POST',
                    data: myData,
                    dataType: 'json',
                    cache: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('#loader').show();
                        $("#submit").prop('disabled', true); // disable button
                    },
                    success: function (data) {

                        $("#status").html(data.html);
                        reload_table();
                        $('#loader').hide();
                        $("#submit").prop('disabled', false); // disable button
                        $("html, body").animate({scrollTop: 0}, "slow");
                        $('#modalUser').modal('hide'); // hide bootstrap modal
                    }
                });
            }
            // <- end 'submitHandler' callback
        });                    // <- end '.validate()'

    });
</script>