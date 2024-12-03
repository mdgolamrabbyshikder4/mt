  <!-- Jquery JS-->
    <script src="{{url('public/admin')}}/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="{{url('/public/admin')}}/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="{{url('/public/admin')}}/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="{{url('/public/admin')}}/vendor/slick/slick.min.js">
    </script>
    <script src="{{url('/public/admin')}}/vendor/wow/wow.min.js"></script>
    <script src="{{url('/public/admin')}}/vendor/animsition/animsition.min.js"></script>
    <script src="{{url('/public/admin')}}/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="{{url('/public/admin')}}/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="{{url('/public/admin')}}/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="{{url('/public/admin')}}/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="{{url('/public/admin')}}/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{url('/public/admin')}}/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="{{url('/public/admin')}}/vendor/select2/select2.min.js">
    </script>

    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <!-- Main JS-->
    <script src="{{url('/public/admin')}}/js/main.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>
    <script>

      $(document).ready( function () {
    $('#myTable').DataTable();
} );

// profile picture auto upload;
$(document).ready(function(){
    $('#upload').change(function(){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#profile-img').attr('src', e.target.result);
        };
        reader.readAsDataURL(this.files[0]);
    });
});

// nid image verification auto upload
$(document).ready(function(){
    $('#nid_img').change(function(){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#nid-image').attr('src', e.target.result);
        };
        reader.readAsDataURL(this.files[0]);
    });
});

// service image auto upload
$(document).ready(function(){
    $('#newimg').change(function(){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#service_image').attr('src', e.target.result);
        };
        reader.readAsDataURL(this.files[0]);
    });
});

// service image auto upload
$(document).ready(function(){
    $('#product_image').change(function(){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#product_show_image').attr('src', e.target.result).css('display', 'block');
        };
        reader.readAsDataURL(this.files[0]);
    });
});

// service image auto upload
$(document).ready(function(){
    $('#input_partner_img').change(function(){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#partner_img').attr('src', e.target.result).css('display', 'block');
        };
        reader.readAsDataURL(this.files[0]);
    });
});

// service image auto upload
$(document).ready(function(){
    $('#input_img').change(function(){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#show_input_img').attr('src', e.target.result).css('display', 'block');
        };
        reader.readAsDataURL(this.files[0]);
    });
});

$(document).ready(function(){
    // Function to make AJAX GET request
    function makeRequest() {
        $.ajax({
            url: '{{url('/client/order/count')}}/{{auth()->id()}}', // Laravel route URL
            method: 'GET',
            success: function(response) {
                $('#notif_order').html('<p>'+response+'</p>');
                if(response ==0){
                 var element = document.getElementById('notif_order');
                element.style.display = 'none';
                }else{
                  var element = document.getElementById('notif_order');
                element.style.display = 'inline';
                }
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
                console.log('{{url('/client/order/count')}}/{{auth()->id()}}');
            }
        });
    }



    // Call autoRefresh to start the auto-refresh process
    autoRefresh();
 
});
    $(document).ready(function(){
$('#action_menu_btn').click(function(){
    $('.action_menu').toggle();
});
    });
    function message_data(id){
                    var formData = new FormData(document.getElementById('message_form'));                    //var formData = new FormData(this);
                    $.ajax({
                        type:'POST',
                        url:'{{url("/send/message")}}'+'/'+id,
                        data: formData,
                        contentType: false,
                        processData: false,
                        success:function(response){
                            console.log(response);
                            $('#msg').val(response);
                            fetchData();
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            $('#msg').val(xhr.responseText);
                        }
                    });

            $("#up_msg_img").css("display", "none");
             $("#message_img").val('');
        
    }
    // missage data function end

        // message image upload
    $(document).ready(function(){
    $('#message_img').change(function(){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#up_msg_img').attr('src', e.target.result);
            $("#up_msg_img").css("display", "block");
        };
        reader.readAsDataURL(this.files[0]);
    });
});

    function fetchData() {
    $('#message_pass').empty(); // Clear the message container
     // Get the contact ID
     var contact_id = $('#contact_id').val();
    $.ajax({
        url: "{{url('/show/message')}}" + "/" + contact_id,  // Correct URL generation
        type: 'GET',
        success: function(response) {
            $('#message_pass').append(response);  // Append new messages to the container
            scrollToBottom();  // Scroll to the bottom after fetching new data
        },
        error: function(xhr, status, error) {
            console.error("Error: " + error);  // Log the error
            $('#message_pass').html("Error: " + xhr.status + " " + xhr.statusText);  // Display error message
        }
    });
}

function scrollToBottom() {
    var messageContainer = $('#message_pass');
    messageContainer.scrollTop(messageContainer[0].scrollHeight);  // Scroll to the bottom
}

$('#message_pass').scroll(function() {
    if ($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight && !isLoading) {
        fetchData();
    }
});

// Initial fetch
fetchData();

    // Call makeRequest initially
    
    function autoRefresh() {
        makeRequest();
        //msgcheckupdate();
        fetchData();
    }

setInterval(autoRefresh, 500);
   
    // icone clicd to image select in message box
    document.getElementById('message_img_select').addEventListener('click', function() {
    document.getElementById('message_img').click();
});

</script>
<style>
    #up_msg_img{
        display:none;
    }
</style>
  <script>
    // job post data table
    $(document).ready(function() {
         $('#jobPostsTable').DataTable({
            // Optional: Customize DataTable options
            "ordering": true,
            "searching": true,
            "paging": true,
            "info": true,
         });
     });
    // find pratnar data table
        $(document).ready(function() {
            $('#find-partners-table').DataTable({
                "pageLength": 10, // Number of records per page
                "order": [[0, "asc"]] // Order by ID ascending
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#addClickEarnTable').DataTable({
                "paging": true,
                "ordering": true,
                "info": true
             });
        });
    </script>
    <script>
    $(document).ready(function() {
        $('#foodTable').DataTable();
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#description').summernote({
            height: 200,  // Set editor height
            toolbar: [
                // Customize your toolbar options
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>

</body>

</html>
<!-- end document-->
