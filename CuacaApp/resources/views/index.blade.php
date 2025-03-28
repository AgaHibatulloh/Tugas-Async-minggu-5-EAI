<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Cuaca</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .form-container { margin-top: 20px; }
    </style>
</head>
<body>
    <h2>Data Cuaca</h2>

    <!-- Form Tambah Data -->
    <div class="form-container">
        <form action="{{ route('weather.store') }}" method="POST">
            @csrf
            <label for="city">Nama Kota:</label>
            <input type="text" name="city" required>
            <button type="submit">Tambah Data</button>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>Kota</th>
                <th>Temperatur (°C)</th>
                <th>Cuaca</th>
                <th>Kecepatan
