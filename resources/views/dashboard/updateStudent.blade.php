<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Edit Student</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="card-header text-center">Update {{ $student_data->first_name }} {{ $student_data->last_name }}'s Information</h3>
                        <div class="card-body">
                            <form method="POST" action="{{ route('dashboard.update-student') }}">
                                @csrf
                                <div class="form-group mt-2">
                                    <input type="text" placeholder="First Name" id="first-name" class="form-control" name="first_name" value="{{ $student_data->first_name }}"required autofocus>
                                </div>
                                <div class="form-group mt-2">
                                    <input type="text" placeholder="Last Name" id="last-name" class="form-control" name="last_name" value="{{ $student_data->last_name }}" required>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-primary btn-block">Update Student</button>
                                </div>
                                <input type="hidden" id="student-id" class="form-control" name="student_id" value="{{ $student_id }}">
                                <input type="hidden" id="user-id" class="form-control" name="user_id" value="{{ $user_id }}">
                            </form>
                            <div id="alert-container">
                                <div class="alert alert-success alert-dismissible mt-3" id="success-message" role="alert" hidden></div>
                                <div class="alert alert-danger alert-dismissible mt-3" id="error-message" role="alert" hidden></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
    $(document).ready(function() {
        $('#createStudentModal #create-student-button').click(function(){
            $.ajax({
                url: "{{ route('dashboard.update-student') }}",
                method: "POST",
                data: {
                    student_id: $('#student-id').val(),
                    user_id: $('#user-id').val(),
                    first_name: $('#first-name').val(),
                    last_name: $('#last-name').val(),
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    $('#success-message').prop('hidden', false);
                    $('#success-message').text('Student created successfully!');
                },
                error: function(xhr, status, error) {
                    $('#error-message').prop('hidden', false);
                    $('#error-message').text('An error occurred: ' + error);
                    window.setTimeout(function() {
                        $('#error-message').attr("hidden",true);
                    }, 4000);
                }
            });
        });
    });
</script>