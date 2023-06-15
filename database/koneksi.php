<?php

function getConnection()
{
    $servername = "localhost";
    $username = "root";
    $password = "kr4k3n221";
    $dbname = "perpustakaan";

    // membuat koneksi ke database
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("koneksi ke database error");
    }

    return $conn;
}


function getBuku()
{
    $conn = getConnection();
    // $statement = $conn->prepare('SELECT * FROM buku');
    $statement = $conn->prepare('SELECT buku.*, kategori.nama AS nama_kategori
    FROM buku
    JOIN kategori ON buku.category_id = kategori.id;
    ');
    $statement->execute();

    $result = $statement->get_result();

    $buku = $result->fetch_all(MYSQLI_ASSOC);

    return $buku;
}
function getKategori()
{
    $conn = getConnection();
    $statement = $conn->prepare('SELECT * FROM kategori');
    $statement->execute();

    $result = $statement->get_result();

    $buku = $result->fetch_all(MYSQLI_ASSOC);

    return $buku;
}

function insertBuku()
{
    $conn = getConnection();
    $statement = $conn->prepare('INSERT into buku (nama, category_id) values (?, ?)');
    $statement->bind_param('ss', $_POST['nama'], $_POST['category_id']);
    $statement->execute();

    // redirect ke index.php
    header("Location: ../public/index.php");
    exit();
}

function getBukuById() {
    $conn = getConnection();
    $statement = $conn->prepare('SELECT * FROM buku WHERE id = ?');
    $statement->bind_param('s', $_GET['id']);
    $statement->execute();

    $result = $statement->get_result();

    $buku = $result->fetch_assoc();

    return $buku;
}

function updateBuku() {
    $conn = getConnection();
    $statement = $conn->prepare('UPDATE buku SET nama = ?, category_id = ? WHERE id = ?');
    $statement->bind_param('sss', $_POST['nama'], $_POST['category_id'], $_POST['id']);
    $statement->execute();

    // redirect ke index.php
    header("Location: ../public/index.php");
    exit();
}

function deleteBuku() {
    $conn = getConnection();
    $statement = $conn->prepare('DELETE FROM `buku` WHERE `buku`.`id` = ?');
    $statement->bind_param('s', $_GET['id']);
    $statement->execute();

    // redirect ke index.php
    header("Location: ../public/index.php");
    exit();
}