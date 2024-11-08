@include('blocks.header')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="card-header bg-gray-100 p-4">
                    <h2 class="text-center">Авторизация</h2>
                </div>
                <div class="card-body p-5">
                    <form method="POST" action="{{ route('login') }}">
                      @csrf
                      <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                      </div>

                      <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                      </div>

                      <button type="submit" class="btn btn-primary w-100 mt-3">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($errors->any())
  <div class="alert alert-danger mt-4">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
