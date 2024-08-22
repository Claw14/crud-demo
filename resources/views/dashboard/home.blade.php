<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Dashboard</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <h2>{{ $user_data->name }}'s Teacher Dashboard</h2>
            </div>
            <div class="row mt-5 justify-content-center">
                @include('dashboard.getStudentsTable')
            </div>
            <div class="row mt-5">
                <div class="d-grid mx-auto text-center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createStudentModal">
                        Create Student
                    </button>
                </div>
            </div>
            <div class="row justify-content-center">
                @include('dashboard.createStudentModal')
            </div>
        </div>
    </body>
</html>
<script>
    $(document).ready(function() {
        $('#createStudentModal').on('hidden.bs.modal', function () {
            $('#first-name').val('');
            $('#last-name').val('');
            $('#createStudentModal #success-message').attr('hidden', true);
            $('#createStudentModal #error-message').attr('hidden', true);
        });

        $('#createStudentModal #create-student-button').click(function(){
            $('#createStudentModal #create-student-button').attr('disabled', true);

            $.ajax({
                url: "{{ route('students.store') }}",
                method: "POST",
                data: {
                    first_name: $('#createStudentModal #first-name').val(),
                    last_name: $('#createStudentModal #last-name').val(),
                    teacher_id: $('#createStudentModal #teacher-id').val(),
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    $('#createStudentModal #success-message').prop('hidden', false);
                    $('#createStudentModal #success-message').text('Student created successfully!');
                    window.setTimeout(function() {
                        location.reload();
                    }, 1500);
                },
                error: function(xhr, status, error) {
                    $('#createStudentModal #create-student-button').attr('disabled', false);
                    $('#createStudentModal #error-message').prop('hidden', false);
                    $('#createStudentModal #error-message').text('An error occurred: ' + error);
                    window.setTimeout(function() {
                        $('#createStudentModal #error-message').attr("hidden",true);
                    }, 4000);
                }
            });
        });
    });
</script>