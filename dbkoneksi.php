<?php
// Konfigurasi database
$host = 'localhost'; // Ganti sesuai dengan host Anda
$dbname = 'db_adit23074ti'; // Ganti dengan nama database Anda
$user = 'adit23074ti'; // Ganti dengan nama pengguna database Anda
$pass = '23560110223074'; // Ganti dengan kata sandi database Anda

$dsn = "mysql:host=$host;dbname=$dbname";

// Buat koneksi Database
$dbh = new PDO($dsn, $user, $pass);
