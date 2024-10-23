<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Card -->
            <div class="card">
                <div class="card-header text-center">
                    <h1>Form Create User</h1>
                </div>
                <div class="card-body">
                    <!-- Form to collect name, npm, class, and ipk -->
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf <!-- Laravel CSRF protection -->

                        <!-- Nama input -->
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" id="nama" name="nama" class="form-control" required>
                        </div>

                        <!-- NPM input -->
                        <div class="form-group">
                            <label for="npm">NPM:</label>
                            <input type="text" id="npm" name="npm" class="form-control" required>
                        </div>

                        <!-- Kelas input -->
                        <div class="form-group">
                            <label for="kelas_id">Kelas:</label>
                            <select name="kelas_id" id="kelas_id" class="form-control" required>
                                @foreach ($kelas as $kelasItem)
                                    <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- IPK input -->
                        <div class="form-group">
                            <label for="ipk">IPK:</label>
                            <input type="number" id="ipk" name="ipk" class="form-control" step="0.01" min="0" max="4" placeholder="Masukkan IPK (0.00 - 4.00)" >
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

<!-- Include Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
