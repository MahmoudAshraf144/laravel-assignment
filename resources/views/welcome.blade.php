<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdb-ui-kit/css/mdb.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdb-ui-kit/css/mdb.rtl.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdb-ui-kit/css/mdb-utilities.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdb-ui-kit/css/mdb-utilities.rtl.min.css">

<section class="vh-100" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card rounded-3">
          <div class="card-body p-4">

            <h4 class="text-center my-3 pb-3">Tasks</h4>

            <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2" action="{{ route('tasks.store') }}" method="POST">
              @csrf
              <div class="col-12">
              <div data-mdb-input-init class="form-outline">
                <input type="text" id="form1" name="title" class="form-control" />
                <label class="form-label" for="form1">Enter a task here</label>
                <select class="form-select" id="status" name="status">
                  <option value="pending">Pending</option>
                  <option value="in-progress">In-Progress</option>
                  <option value="completed">Completed</option>
                </select>
              </div>
              </div>

              <div class="col-12">
              <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Save</button>
              </div>
            </form>

            <table class="table mb-4">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Task</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tasks as $task)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $task->title }}</td>
                  <td>{{ $task->status }}</td>
                  <td>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger">Delete</button>
                    </form>
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name="id" value="{{ $task->id }}">
                      <input type="text" name="title" value="{{ $task->title }}" class="form-control mb-2" />
                      <select class="form-select mb-2" name="status">
                        <option value="pending" {{ $task->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in-progress" {{ $task->status === 'in_progress' ? 'selected' : '' }}>In-Progress</option>
                        <option value="completed" {{ $task->status === 'completed' ? 'selected' : '' }}>Completed</option>
                      </select>
                      <button type="submit" class="btn btn-warning">Edit</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>