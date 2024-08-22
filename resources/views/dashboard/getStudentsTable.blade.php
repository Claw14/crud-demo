<div class="card">
    <h3 class="card-header text-center">Students</h3>
    <div class="card-body">
        <table class="table table-striped table-borderless">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @php($count = 1)
                @foreach($students as $student)
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $student->first_name }}</td>
                        <td>{{ $student->last_name }}</td>
                        <td><a href="{{ route('dashboard.update-student-view', ['student_id' => $student->id, 'user_id' => $user_data->id]) }}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form method="POST" action="{{ route('dashboard.delete-student', ['student_id' => $student->id]) }}">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @php($count++)
                @endforeach
            </tbody>
        </table>
    </div>
</div>