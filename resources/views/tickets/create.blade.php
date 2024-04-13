<!-- resources/views/tickets/create.blade.php -->

@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a New Ticket</div>

                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('tickets.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="user_email">Submitter / Student Email</label>
                            <input type="email" name="user_email" id="user_email" class="form-control" value="{{ auth()->user()->email }}" readonly required>
                            <!-- @error('user_email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror -->
                        </div>

                        <!-- <div class="form-group">
                            <label for="student_email">Student Email</label>
                            <input type="email" name="student_email" id="student_email" class="form-control" value="{{ old('student_email') }}" required>
                            @error('student_email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> -->

                        <div class="form-group">
                            <label for="service_type">Service Type</label>
                            <select name="service_type" id="service_type" class="form-control" required>
                                <option value="Others" {{ old('service_type') === 'Others' ? 'selected' : '' }}>Others</option>
                                <option value="Enrollment:2023-24" {{ old('service_type') === 'Enrollment:2023-24' ? 'selected' : '' }}>Enroll student for 2023-2024</option>
                                <option value="Payment" {{ old('service_type') === 'Payment' ? 'selected' : '' }}>Payment Issues</option>
                                <option value="Leave - Teacher" {{ old('service_type') === 'Leave - Teacher' ? 'selected' : '' }}>Leave Notification - Teacher</option>
                                <option value="Leave - Student" {{ old('service_type') === 'Leave - Student' ? 'selected' : '' }}>Leave Notification - Student</option>
                                <option value="Volunteer-Teacher" {{ old('service_type') === 'Volunteer-Teacher' ? 'selected' : '' }}>Volunteer(Teacher) - Enrollment</option>
                                <option value="Volunteer-Admin" {{ old('service_type') === 'Volunteer-Admin' ? 'selected' : '' }}>Volunteer(Admin) - Enrollment</option>
                                <option value="Volunteer-Discount" {{ old('service_type') === 'Volunteer-Discount' ? 'selected' : '' }}>Claim 40% Discount - Volunteer(Teacher)</option>
                                <option value="Discontinue" {{ old('service_type') === 'Discontinue' ? 'selected' : '' }}>Discontinue</option>
                                <option value="Class Time Change" {{ old('service_type') === 'Class Time Change' ? 'selected' : '' }}>Class time change request</option>
                                <option value="Books" {{ old('service_type') === 'Books' ? 'selected' : '' }}>Regarding Books</option>
                                <option value="Google Class Room/Meet" {{ old('service_type') === 'Google Class Room/Meet' ? 'selected' : '' }}>Google Class Room/Meet Issue(s)</option>
                                <option value="MyAPS" {{ old('service_type') === 'MyAPS' ? 'selected' : '' }}>MyAPS Issues/Improvements</option></select>
                            </select>
                            @error('service_type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" required>{{ old('description') }}</textarea>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
