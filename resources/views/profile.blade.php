<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Card</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .profile-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 350px;
            padding: 20px;
            text-align: center;
            transition: box-shadow 0.3s ease;
        }
        .profile-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .profile-card img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #007bff;
            margin-bottom: 20px;
        }
        .profile-card h2 {
            margin: 0;
            padding-bottom: 10px;
            font-size: 1.8rem;
            color: #333;
        }
        .profile-card table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        .profile-card th, .profile-card td {
            text-align: left;
            padding: 10px;
        }
        .profile-card th {
            color: #007bff;
            font-size: 1rem;
        }
        .profile-card td {
            font-size: 1rem;
            color: #555;
        }
        .profile-card tr {
            border-bottom: 1px solid #ddd;
        }
        .profile-card tr:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <div class="profile-card">
        <!-- Menggunakan nama dari variabel sebagai heading -->
        <img src="{{ asset('assets/img/atreides.jpg') }}" alt="Profile Photo">
        <h2>{{ $nama }}</h2> <!-- Mengganti "Profile" dengan nama pengguna -->
        <table>
            <tbody>
                <tr>
                    <th>Nama</th>
                    <td>{{ $nama }}</td>
                </tr>
                <tr>
                    <th>Kelas</th>
                    <td>{{ $kelas }}</td>
                </tr>
                <tr>
                    <th>NPM</th>
                    <td>{{ $npm }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
