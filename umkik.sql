create database ukmik;
use ukmik;
create table member_ik (
	nomor int(5) not null primary key auto_increment,
	nama_mahasiswa varchar(50) not null,
	jurusan_mahasiswa varchar(50) not null,
	alamat_mahasiswa varchar(100) not null,
	asal_sekolah varchar(100) not null,
	nomor_hp varchar(20)
);