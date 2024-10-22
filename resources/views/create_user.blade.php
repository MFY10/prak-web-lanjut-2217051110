

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Card -->
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Form Create User</h1>
                </div>
                <div class="card-body">
                    <!-- Form to collect name, npm, and class -->
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf <!-- Laravel CSRF protection -->

                        <!-- Nama input -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" id="nama" name="nama" class="form-control" required>
                        </div>

                        <!-- NPM input -->
                        <div class="mb-3">
                            <label for="npm" class="form-label">NPM:</label>
                            <input type="text" id="npm" name="npm" class="form-control" required>
                        </div>

                        <!-- Kelas input -->
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas:</label>
                            <input type="text" id="kelas" name="kelas" class="form-control" required>
                        </div>

                        <!-- Submit button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End of Card -->
        </div>
    </div>
</div>