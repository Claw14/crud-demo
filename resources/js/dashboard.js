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