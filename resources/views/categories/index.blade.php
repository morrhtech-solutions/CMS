@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
  <a href="{{ route('categories.create')}}" class="btn btn-success-float-right">Add Category</a>
</div>
<div class="card card-default">
  <div class="card-header">Categories</div>

  <div class="card-body">
    <table class="table">
      <thead>
        <th>Name</th>
        <th></th>
      </thead>
      <tbody>
        @foreach($categories as $category)
        <tr>
          <td>
            {{ $category->name }}
          </td>

          <td>
            <a href="{{ route('categories.edit', $category->id)}}" class="btn btn-info btn-sm">
              Edit
            </a>
            <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $category->id }})">Delete</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog">

        <form action="" method="POST" id="deleteCategoryForm">
          @csrf
          @method('DELETE')
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Category</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p class="text-center text-bold">
                Are you sure you want to delete this category?
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Go back</button>
              <button type="submit" class="btn btn-danger">Yes, Delete</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')

<script>
function handleDelete(id) {

  var form = document.getElementById('deleteCategoryForm')
  form.action = '/categories/' + id
  $('#deleteModal').modal('show')
}
</script>

@endsection
