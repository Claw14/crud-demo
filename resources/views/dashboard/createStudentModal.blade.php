<div class="modal fade" id="createStudentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('students.store') }}">
                    @csrf
                    <div class="form-group mt-2">
                        <input type="text" placeholder="First Name" id="first-name" class="form-control" name="first_name" required autofocus>
                    </div>
                    <div class="form-group mt-2">
                        <input type="text" placeholder="Last Name" id="last-name" class="form-control" name="last_name" required>
                    </div>
                    <input type="hidden" id="teacher-id" class="form-control" name="teacher_id" value="{{ $user_data->id }}">
                    <div class="d-grid mx-auto">
                        <button type="button" class="btn btn-primary btn-block" id="create-student-button">Create</button>
                    </div>
                    <div id="alert-container">
                        <div class="alert alert-success alert-dismissible mt-3" id="success-message" role="alert" hidden></div>
                        <div class="alert alert-danger alert-dismissible mt-3" id="error-message" role="alert" hidden></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>