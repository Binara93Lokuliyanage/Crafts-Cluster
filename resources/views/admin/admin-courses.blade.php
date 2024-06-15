@extends('admin.layouts.app')

@section('content')
    <div class = "admin-main-wrapper section-padding-top section-padding-bottom">
        <!DOCTYPE html>

        <div class="container mt-5">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif
            <a href = "{{ route('admin.course.add') }}" class = "cta-btn">Add New</a>
            <div class="table-container">


                
                <div class = "admin-title-container">
                    <h3 class = "text-primary">Courses</h3>
                <div class="select-container">
                    
                    <select id="category" name="category" onchange="changeCategory(this)">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                </div>
                <table id="courses-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Course Title</th>
                            <th>Description</th>
                            <th>Action</th> <!-- New column for category -->
                            <!-- Add other necessary columns here -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr data-category="{{ $course->category_id }}">
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->description }}</td>
                            <td>
                                <a href="{{ route('admin.course.edit', $course->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.course.delete', $course->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                
            </div>
        </div>
    </div>

    <script>
        function changeCategory(select) {
            
            let categoryId = select.value;
            let rows = document.querySelectorAll('#courses-table tbody tr');

            rows.forEach(row => {
                let category = row.getAttribute('data-category');
                if (categoryId && categoryId !== '' && categoryId !== category) {
                    row.style.display = 'none';
                } else {
                    row.style.display = '';
                }
            });
        }
    </script>
@endsection
