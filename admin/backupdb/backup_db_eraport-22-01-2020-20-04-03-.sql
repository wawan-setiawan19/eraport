DROP TABLE admin;

CREATE TABLE `admin` (
  `c_admin` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`c_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO admin VALUES
("rino","Administrator","admin","21232f297a57a5a743894a0e4a801fc3"),
("veno","Administrator","admin","14/iKXDMbEvfw");


DROP TABLE aplikasi;

CREATE TABLE `aplikasi` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `alamat` varchar(30) NOT NULL,
  `kepsek` varchar(30) NOT NULL,
  `nipkepsek` varchar(30) NOT NULL,
  `namasek` varchar(60) NOT NULL,
  `logo` text NOT NULL,
  `dibagi` varchar(5) NOT NULL,
  `berapa` int(11) NOT NULL,
  `hapsetaktif` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO aplikasi VALUES
("1","Malang","Mujianto, S.Pd. MM.","19650418 198603 1 012","SMK FARMASI MAHARANI MALANG","media/logo/","NO","4","YES");


DROP TABLE aspek_fisik;

CREATE TABLE `aspek_fisik` (
  `c_aspek_fisik` int(11) NOT NULL AUTO_INCREMENT,
  `c_ta` varchar(10) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `penglihatan` varchar(50) NOT NULL,
  `pendengaran` varchar(50) NOT NULL,
  `gigi` varchar(50) NOT NULL,
  `lainnya` varchar(50) NOT NULL,
  PRIMARY KEY (`c_aspek_fisik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO aspek_fisik VALUES



DROP TABLE aspekket;

CREATE TABLE `aspekket` (
  `c_aspekket` int(11) NOT NULL AUTO_INCREMENT,
  `ket` varchar(30) NOT NULL,
  PRIMARY KEY (`c_aspekket`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO aspekket VALUES
("1","Keterampilan 1"),
("2","Keterampilan 2"),
("3","Keterampilan 3");


DROP TABLE aspeksikap;

CREATE TABLE `aspeksikap` (
  `c_aspeksikap` int(11) NOT NULL AUTO_INCREMENT,
  `c_kelas` varchar(10) NOT NULL,
  `ket` varchar(200) NOT NULL,
  PRIMARY KEY (`c_aspeksikap`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO aspeksikap VALUES
("1","56f14","Aspek Sikap 1"),
("2","56f14","Aspek Sikap 2"),
("3","56f14","Aspek Sikap 3"),
("4","56f14","Aspek Sikap 4"),
("5","56f14","Aspek Sikap 5"),
("6","56f14","Aspek Sikap 6"),
("7","56f14","Aspek Sikap 7"),
("10","56f14","Aspek Sikap 10"),
("11","NYGh3F2AD","Bertanggung Jawab"),
("12","NYGh3F2AD","Menerima Tugas Dengan Baik");


DROP TABLE aspektug;

CREATE TABLE `aspektug` (
  `c_aspektug` int(11) NOT NULL AUTO_INCREMENT,
  `ket` varchar(100) NOT NULL,
  PRIMARY KEY (`c_aspektug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO aspektug VALUES
("1","TUGAS 1"),
("2","TUGAS 2"),
("3","TUGAS 3");


DROP TABLE aspekuh;

CREATE TABLE `aspekuh` (
  `c_aspekuh` int(11) NOT NULL AUTO_INCREMENT,
  `ket` varchar(100) NOT NULL,
  PRIMARY KEY (`c_aspekuh`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO aspekuh VALUES
("1","UH 1"),
("2","UH 2"),
("3","UH 3");


DROP TABLE backup;

CREATE TABLE `backup` (
  `c_backup` int(11) NOT NULL AUTO_INCREMENT,
  `at` datetime NOT NULL,
  `file` varchar(50) NOT NULL,
  PRIMARY KEY (`c_backup`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO backup VALUES
("2","2020-01-22 20:04:03","backup_db_eraport-22-01-2020-20-04-03-.sql");


DROP TABLE berattinggi;

CREATE TABLE `berattinggi` (
  `c_berattinggi` int(11) NOT NULL AUTO_INCREMENT,
  `c_ta` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `berats1` varchar(3) NOT NULL,
  `tinggis1` varchar(3) NOT NULL,
  `berats2` varchar(3) NOT NULL,
  `tinggis2` varchar(3) NOT NULL,
  PRIMARY KEY (`c_berattinggi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO berattinggi VALUES



DROP TABLE deskripsi_rapot;

CREATE TABLE `deskripsi_rapot` (
  `c_deskripsi` int(11) NOT NULL AUTO_INCREMENT,
  `c_ta` varchar(10) NOT NULL,
  `des_peng` text NOT NULL,
  `des_ket` text NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `c_mapel` varchar(10) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  PRIMARY KEY (`c_deskripsi`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

INSERT INTO deskripsi_rapot VALUES
("1","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","ratPgIl4V","wCnrCBr8S"),
("2","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","ratPgIl4V","dhn7U9dlp"),
("3","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","ratPgIl4V","VSt02629P"),
("4","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","ratPgIl4V","XzYAeyimw"),
("5","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","ratPgIl4V","lYEQ2FfF8"),
("6","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","ratPgIl4V","XAy3MS5kn"),
("7","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","ratPgIl4V","lvSwkvJr9"),
("8","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","ratPgIl4V","0w2HgR5Sn"),
("9","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","ratPgIl4V","As9i1H5yh"),
("10","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","ratPgIl4V","ULt8hXyFZ"),
("11","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","ratPgIl4V","c8tWzGQZ7"),
("12","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","CyHorbulb","wCnrCBr8S"),
("13","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","CyHorbulb","dhn7U9dlp"),
("14","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","CyHorbulb","VSt02629P"),
("15","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","CyHorbulb","XzYAeyimw"),
("16","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","CyHorbulb","lYEQ2FfF8"),
("17","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","CyHorbulb","XAy3MS5kn"),
("18","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","CyHorbulb","lvSwkvJr9"),
("19","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","CyHorbulb","0w2HgR5Sn"),
("20","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","CyHorbulb","As9i1H5yh"),
("21","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","CyHorbulb","ULt8hXyFZ"),
("22","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","CyHorbulb","c8tWzGQZ7"),
("23","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","y1X9UuX6H","wCnrCBr8S"),
("24","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","y1X9UuX6H","dhn7U9dlp"),
("25","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","y1X9UuX6H","VSt02629P"),
("26","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","y1X9UuX6H","XzYAeyimw"),
("27","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","y1X9UuX6H","lYEQ2FfF8"),
("28","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","y1X9UuX6H","XAy3MS5kn"),
("29","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","y1X9UuX6H","lvSwkvJr9"),
("30","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","y1X9UuX6H","0w2HgR5Sn"),
("31","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","y1X9UuX6H","As9i1H5yh"),
("32","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","y1X9UuX6H","ULt8hXyFZ"),
("33","YGeEUxyYK","Sangat menonjol pada materi resep dan copy resep dan perlu meningkatkan pada materi perhitungan biaya apotek","Sangat menonjol pada keterampilan konseling, perlu peningkatan keterampilan perhitungan biaya obat","PAUKsCNOz","y1X9UuX6H","c8tWzGQZ7");


DROP TABLE deskripsi_sikap;

CREATE TABLE `deskripsi_sikap` (
  `c_deskripsi` int(11) NOT NULL AUTO_INCREMENT,
  `c_ta` varchar(10) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`c_deskripsi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO deskripsi_sikap VALUES
("1","YGeEUxyYK","wCnrCBr8S","PAUKsCNOz","Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."),
("2","YGeEUxyYK","XAy3MS5kn","PAUKsCNOz","Selalu bersyukur, selalu berdoa sebelum melakukan kegiatan, toleran pada agama yang berbeda dan perlu meningkatkan ketaatan beribadah serta selalu bersikap santun, peduli, percaya diri, dan perlu meningkatkan sikap jujur, disiplin, dan tanggung jawab."),
("3","YGeEUxyYK","lYEQ2FfF8","PAUKsCNOz","Selalu bersyukur, selalu berdoa sebelum melakukan kegiatan, toleran pada agama yang berbeda dan perlu meningkatkan ketaatan beribadah serta selalu bersikap santun, peduli, percaya diri, dan perlu meningkatkan sikap jujur, disiplin, dan tanggung jawab.");


DROP TABLE extra;

CREATE TABLE `extra` (
  `c_extra` varchar(10) NOT NULL,
  `extra` varchar(100) NOT NULL,
  PRIMARY KEY (`c_extra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO extra VALUES
("4u9uxDxsi","Kesenian Hadroh"),
("7y1X9UuX6","English Club"),
("brkvsQhLy","Bimbingan Konseling"),
("ELvSju4yI","Pramuka"),
("HratPgIl4","Kelas Programmer"),
("KXXkni6CS","Sepak Bola (FC)"),
("UU2yFnGcy","Pengurus OSIS");


DROP TABLE guru;

CREATE TABLE `guru` (
  `c_guru` varchar(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `temlahir` varchar(20) NOT NULL,
  `tanglahir` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`c_guru`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO guru VALUES
("0dXMrmmaH","435435235","Asih Tri wulandari S.pd","Nganjuk","1998-10-14","gurubing","gurubing"),
("3bw5L7jDW","3532553266","Rino Oktavianto S.pd","Bogor","1998-10-07","gurupro","gurupro"),
("40IHKMCbC","543252353553","Ririn S.pd","Bogor","1998-10-21","gurumtk","gurumtk"),
("4uvwoxuy1","53245325235","Nur Hidayah M.pd","Bogor","1998-10-06","gurupkn","gurupkn"),
("aH0Bgcfn0","353253255235","Hawin Pai S.pd","Bogor","1998-10-27","gurupa","gurupa"),
("J8lguSxy2","532554646","Samsul Hadi S.pd","Bogor","1998-10-14","guruipa","guruipa"),
("pJpxaJamf","3532535632465","Agil Hidayatullah S.pd","Bogor","1998-10-21","gurupjok","gurupjok"),
("RO6bCsujD","353553545","Jumain S.pd","Bogor","1998-10-14","guruips","guruips"),
("VVh7sKOff","12421424","Anita Kritiani S.pd","Bogor","1998-10-14","gurufis","gurufis"),
("w1WUzRc2U","081330707048","Guru Farmasi Ha","Nganjuk","1998-10-14","gurufar","gurufar"),
("wkCsuwypY","35245214534","Yulianingsih S.pd","Nganjuk","1998-10-14","gurubi","gurubi"),
("xJqLGkzC1","53535263626","Yuli Indah Permata S.pd","Bogor","1998-10-06","gurukim","gurukim"),
("zoh0WUQsz","34325325","Obby Arifianto S.pd","Bogor","1998-10-06","gurubk","gurubk");


DROP TABLE gurumapel;

CREATE TABLE `gurumapel` (
  `c_gurumapel` varchar(10) NOT NULL,
  `c_guru` varchar(10) NOT NULL,
  `c_mapel` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  PRIMARY KEY (`c_gurumapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO gurumapel VALUES
("apqDvFGiy","w1WUzRc2U","ratPgIl4V","PAUKsCNOz"),
("HRgKD6VM5","w1WUzRc2U","CyHorbulb","PAUKsCNOz"),
("SX81LluUS","w1WUzRc2U","y1X9UuX6H","PAUKsCNOz");


DROP TABLE jumlahnilra;

CREATE TABLE `jumlahnilra` (
  `c_jumlahnilra` int(11) NOT NULL AUTO_INCREMENT,
  `c_ta` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `nilaiasli` int(11) NOT NULL,
  `nilaipresen` int(11) NOT NULL,
  PRIMARY KEY (`c_jumlahnilra`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

INSERT INTO jumlahnilra VALUES
("1","YGeEUxyYK","NYGh3F2AD","EGVwCzI1q","1540","70"),
("2","YGeEUxyYK","NYGh3F2AD","whWMSgJVx","1562","71"),
("3","YGeEUxyYK","NYGh3F2AD","YlEA4Rnxb","1584","72"),
("4","YGeEUxyYK","NYGh3F2AD","5ZygC9nzD","1606","73"),
("5","YGeEUxyYK","NYGh3F2AD","Ft3tct1V8","1628","74"),
("6","YGeEUxyYK","NYGh3F2AD","Jv6P01N5r","1650","75"),
("7","YGeEUxyYK","NYGh3F2AD","Ky7KsCZet","1672","76"),
("8","YGeEUxyYK","NYGh3F2AD","4gMzkM1ha","1694","77"),
("9","YGeEUxyYK","NYGh3F2AD","B4KaMlA7F","1716","78"),
("10","YGeEUxyYK","NYGh3F2AD","tY2SPulkj","1738","79"),
("11","YGeEUxyYK","NYGh3F2AD","AsV63cKVW","1760","80"),
("12","YGeEUxyYK","NYGh3F2AD","2btyeBtPA","1782","81"),
("13","YGeEUxyYK","NYGh3F2AD","8POPZ2Rvx","1804","82"),
("14","YGeEUxyYK","NYGh3F2AD","U64J5eWLI","1826","83"),
("15","YGeEUxyYK","NYGh3F2AD","lGavgBUtx","1848","84"),
("16","YGeEUxyYK","NYGh3F2AD","nDBREVnxL","1870","85"),
("17","YGeEUxyYK","NYGh3F2AD","Iy4yFQEwh","1892","86"),
("18","YGeEUxyYK","NYGh3F2AD","uBy2SVHzL","1914","87"),
("19","YGeEUxyYK","NYGh3F2AD","VyQMEVxVt","1936","88"),
("20","YGeEUxyYK","NYGh3F2AD","u3VHZXMrA","2200","100"),
("21","YGeEUxyYK","PAUKsCNOz","wCnrCBr8S","1620","216"),
("22","YGeEUxyYK","PAUKsCNOz","dhn7U9dlp","1800","222"),
("23","YGeEUxyYK","PAUKsCNOz","VSt02629P","1920","231"),
("24","YGeEUxyYK","PAUKsCNOz","XzYAeyimw","1740","225"),
("25","YGeEUxyYK","PAUKsCNOz","lYEQ2FfF8","1680","237"),
("26","YGeEUxyYK","PAUKsCNOz","XAy3MS5kn","1680","237"),
("27","YGeEUxyYK","PAUKsCNOz","lvSwkvJr9","1830","222"),
("28","YGeEUxyYK","PAUKsCNOz","0w2HgR5Sn","1920","225"),
("29","YGeEUxyYK","PAUKsCNOz","As9i1H5yh","1770","225"),
("30","YGeEUxyYK","PAUKsCNOz","ULt8hXyFZ","1680","222"),
("31","YGeEUxyYK","PAUKsCNOz","c8tWzGQZ7","1680","222");


DROP TABLE kategori_mapel;

CREATE TABLE `kategori_mapel` (
  `c_katmapel` int(11) NOT NULL AUTO_INCREMENT,
  `katmapel` varchar(50) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`c_katmapel`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO kategori_mapel VALUES
("1","Kelompok A","1"),
("2","Kelompok B","2"),
("3","Paket Keahlian","3"),
("4","Kelompok D","4");


DROP TABLE kelas;

CREATE TABLE `kelas` (
  `c_kelas` varchar(10) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  PRIMARY KEY (`c_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO kelas VALUES
("NYGh3F2AD","X IPA"),
("PAUKsCNOz","X FARMASI"),
("yiohJoKnV","XI FARMASI");


DROP TABLE kompetensi_sikap;

CREATE TABLE `kompetensi_sikap` (
  `c_kompetensi_sikap` int(11) NOT NULL AUTO_INCREMENT,
  `c_ta` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `spiritual` text NOT NULL,
  `sosial` text NOT NULL,
  PRIMARY KEY (`c_kompetensi_sikap`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO kompetensi_sikap VALUES



DROP TABLE mapel;

CREATE TABLE `mapel` (
  `c_mapel` varchar(10) NOT NULL,
  `c_katmapel` int(11) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `sl` int(3) NOT NULL,
  PRIMARY KEY (`c_mapel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO mapel VALUES
("5iywPhSg0","1","Pendidikan Agama dan Budi Pekerti","75"),
("8AEIxVK3g","2","Prakarya dan Kewirausahaan","75"),
("aDqsQ7AzQ","3","Teknik Pembuatan Sediaan Obat","80"),
("CyHorbulb","3","Farmakologi","80"),
("Dq0gWpeuD","1","Bahasa Inggris","75"),
("iuarIEv1B","1","Bahasa Indonesia","75"),
("kyuyBogvJ","1","Pendidikan Pancasila dan Kewarganegaraan","75"),
("m1Rywymna","1","Sejarah Indonesia","75"),
("N9SwxyyzY","1","Matematika","70"),
("NECh2U6s7","2","Seni Budaya","75"),
("ratPgIl4V","3","Pelayanan Farmasi","80"),
("rkvsQhLyU","3","Farmakognosi","80"),
("U2yFnGcy7","3","Administrasi Farmasi","80"),
("y1X9UuX6H","3","Kimia Farmasi","80"),
("YENDUb8ue","2","PJOK","75");


DROP TABLE mapel_kelas;

CREATE TABLE `mapel_kelas` (
  `c_mapelkelas` int(11) NOT NULL AUTO_INCREMENT,
  `c_kelas` varchar(10) NOT NULL,
  `c_mapel` varchar(10) NOT NULL,
  `c_katmapel` int(11) NOT NULL,
  `no` varchar(3) NOT NULL,
  PRIMARY KEY (`c_mapelkelas`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

INSERT INTO mapel_kelas VALUES
("7","PAUKsCNOz","5iywPhSg0","1","1"),
("8","PAUKsCNOz","Dq0gWpeuD","1","6"),
("9","PAUKsCNOz","iuarIEv1B","1","3"),
("10","PAUKsCNOz","kyuyBogvJ","1","2"),
("11","PAUKsCNOz","m1Rywymna","1","5"),
("12","PAUKsCNOz","N9SwxyyzY","1","4"),
("16","PAUKsCNOz","8AEIxVK3g","2","2"),
("17","PAUKsCNOz","NECh2U6s7","2","1"),
("18","PAUKsCNOz","YENDUb8ue","2","3"),
("42","PAUKsCNOz","ratPgIl4V","3","6"),
("43","PAUKsCNOz","U2yFnGcy7","3","1"),
("44","PAUKsCNOz","aDqsQ7AzQ","3","2"),
("45","PAUKsCNOz","CyHorbulb","3","3"),
("46","PAUKsCNOz","rkvsQhLyU","3","4"),
("47","PAUKsCNOz","y1X9UuX6H","3","5");


DROP TABLE nilaiextra;

CREATE TABLE `nilaiextra` (
  `c_nilaiextra` int(11) NOT NULL AUTO_INCREMENT,
  `c_ta` varchar(10) NOT NULL,
  `c_extra` varchar(10) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `nilai` varchar(15) NOT NULL,
  `at` date NOT NULL,
  PRIMARY KEY (`c_nilaiextra`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO nilaiextra VALUES
("1","YGeEUxyYK","brkvsQhLy","lYEQ2FfF8","PAUKsCNOz","Baik","2018-10-30"),
("2","YGeEUxyYK","7y1X9UuX6","lYEQ2FfF8","PAUKsCNOz","Baik","2018-10-30");


DROP TABLE nilaiket;

CREATE TABLE `nilaiket` (
  `c_nilaiket` int(11) NOT NULL AUTO_INCREMENT,
  `c_ta` varchar(10) NOT NULL,
  `c_aspekket` int(11) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `c_mapel` varchar(10) NOT NULL,
  `nilai` int(5) NOT NULL,
  `at` date NOT NULL,
  PRIMARY KEY (`c_nilaiket`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

INSERT INTO nilaiket VALUES
("1","YGeEUxyYK","1","wCnrCBr8S","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("2","YGeEUxyYK","2","wCnrCBr8S","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("3","YGeEUxyYK","3","wCnrCBr8S","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("4","YGeEUxyYK","1","dhn7U9dlp","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("5","YGeEUxyYK","2","dhn7U9dlp","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("6","YGeEUxyYK","3","dhn7U9dlp","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("7","YGeEUxyYK","1","VSt02629P","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("8","YGeEUxyYK","2","VSt02629P","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("9","YGeEUxyYK","3","VSt02629P","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("10","YGeEUxyYK","1","XzYAeyimw","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("11","YGeEUxyYK","2","XzYAeyimw","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("12","YGeEUxyYK","3","XzYAeyimw","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("13","YGeEUxyYK","1","lYEQ2FfF8","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("14","YGeEUxyYK","2","lYEQ2FfF8","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("15","YGeEUxyYK","3","lYEQ2FfF8","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("16","YGeEUxyYK","1","XAy3MS5kn","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("17","YGeEUxyYK","2","XAy3MS5kn","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("18","YGeEUxyYK","3","XAy3MS5kn","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("19","YGeEUxyYK","1","lvSwkvJr9","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("20","YGeEUxyYK","2","lvSwkvJr9","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("21","YGeEUxyYK","3","lvSwkvJr9","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("22","YGeEUxyYK","1","0w2HgR5Sn","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("23","YGeEUxyYK","2","0w2HgR5Sn","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("24","YGeEUxyYK","3","0w2HgR5Sn","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("25","YGeEUxyYK","1","As9i1H5yh","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("26","YGeEUxyYK","2","As9i1H5yh","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("27","YGeEUxyYK","3","As9i1H5yh","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("28","YGeEUxyYK","1","ULt8hXyFZ","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("29","YGeEUxyYK","2","ULt8hXyFZ","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("30","YGeEUxyYK","3","ULt8hXyFZ","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("31","YGeEUxyYK","1","c8tWzGQZ7","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("32","YGeEUxyYK","2","c8tWzGQZ7","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("33","YGeEUxyYK","3","c8tWzGQZ7","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("34","YGeEUxyYK","1","wCnrCBr8S","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("35","YGeEUxyYK","2","wCnrCBr8S","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("36","YGeEUxyYK","3","wCnrCBr8S","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("37","YGeEUxyYK","1","dhn7U9dlp","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("38","YGeEUxyYK","2","dhn7U9dlp","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("39","YGeEUxyYK","3","dhn7U9dlp","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("40","YGeEUxyYK","1","VSt02629P","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("41","YGeEUxyYK","2","VSt02629P","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("42","YGeEUxyYK","3","VSt02629P","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("43","YGeEUxyYK","1","XzYAeyimw","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("44","YGeEUxyYK","2","XzYAeyimw","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("45","YGeEUxyYK","3","XzYAeyimw","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("46","YGeEUxyYK","1","lYEQ2FfF8","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("47","YGeEUxyYK","2","lYEQ2FfF8","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("48","YGeEUxyYK","3","lYEQ2FfF8","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("49","YGeEUxyYK","1","XAy3MS5kn","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("50","YGeEUxyYK","2","XAy3MS5kn","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("51","YGeEUxyYK","3","XAy3MS5kn","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("52","YGeEUxyYK","1","lvSwkvJr9","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("53","YGeEUxyYK","2","lvSwkvJr9","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("54","YGeEUxyYK","3","lvSwkvJr9","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("55","YGeEUxyYK","1","0w2HgR5Sn","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("56","YGeEUxyYK","2","0w2HgR5Sn","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("57","YGeEUxyYK","3","0w2HgR5Sn","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("58","YGeEUxyYK","1","As9i1H5yh","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("59","YGeEUxyYK","2","As9i1H5yh","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("60","YGeEUxyYK","3","As9i1H5yh","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("61","YGeEUxyYK","1","ULt8hXyFZ","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("62","YGeEUxyYK","2","ULt8hXyFZ","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("63","YGeEUxyYK","3","ULt8hXyFZ","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("64","YGeEUxyYK","1","c8tWzGQZ7","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("65","YGeEUxyYK","2","c8tWzGQZ7","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("66","YGeEUxyYK","3","c8tWzGQZ7","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("67","YGeEUxyYK","1","wCnrCBr8S","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("68","YGeEUxyYK","2","wCnrCBr8S","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("69","YGeEUxyYK","3","wCnrCBr8S","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("70","YGeEUxyYK","1","dhn7U9dlp","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("71","YGeEUxyYK","2","dhn7U9dlp","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("72","YGeEUxyYK","3","dhn7U9dlp","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("73","YGeEUxyYK","1","VSt02629P","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("74","YGeEUxyYK","2","VSt02629P","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("75","YGeEUxyYK","3","VSt02629P","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("76","YGeEUxyYK","1","XzYAeyimw","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("77","YGeEUxyYK","2","XzYAeyimw","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("78","YGeEUxyYK","3","XzYAeyimw","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("79","YGeEUxyYK","1","lYEQ2FfF8","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("80","YGeEUxyYK","2","lYEQ2FfF8","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("81","YGeEUxyYK","3","lYEQ2FfF8","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("82","YGeEUxyYK","1","XAy3MS5kn","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("83","YGeEUxyYK","2","XAy3MS5kn","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("84","YGeEUxyYK","3","XAy3MS5kn","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("85","YGeEUxyYK","1","lvSwkvJr9","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("86","YGeEUxyYK","2","lvSwkvJr9","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("87","YGeEUxyYK","3","lvSwkvJr9","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("88","YGeEUxyYK","1","0w2HgR5Sn","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("89","YGeEUxyYK","2","0w2HgR5Sn","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("90","YGeEUxyYK","3","0w2HgR5Sn","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("91","YGeEUxyYK","1","As9i1H5yh","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("92","YGeEUxyYK","2","As9i1H5yh","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("93","YGeEUxyYK","3","As9i1H5yh","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("94","YGeEUxyYK","1","ULt8hXyFZ","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("95","YGeEUxyYK","2","ULt8hXyFZ","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("96","YGeEUxyYK","3","ULt8hXyFZ","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("97","YGeEUxyYK","1","c8tWzGQZ7","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("98","YGeEUxyYK","2","c8tWzGQZ7","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("99","YGeEUxyYK","3","c8tWzGQZ7","PAUKsCNOz","y1X9UuX6H","80","2018-10-30");


DROP TABLE nilaimid;

CREATE TABLE `nilaimid` (
  `c_nilaimid` int(11) NOT NULL AUTO_INCREMENT,
  `c_ta` varchar(10) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `c_mapel` varchar(10) NOT NULL,
  `nilai` int(5) NOT NULL,
  `at` date NOT NULL,
  PRIMARY KEY (`c_nilaimid`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

INSERT INTO nilaimid VALUES
("1","YGeEUxyYK","wCnrCBr8S","PAUKsCNOz","ratPgIl4V","60","2018-10-30"),
("2","YGeEUxyYK","dhn7U9dlp","PAUKsCNOz","ratPgIl4V","60","2018-10-30"),
("3","YGeEUxyYK","VSt02629P","PAUKsCNOz","ratPgIl4V","70","2018-10-30"),
("4","YGeEUxyYK","XzYAeyimw","PAUKsCNOz","ratPgIl4V","70","2018-10-30"),
("5","YGeEUxyYK","lYEQ2FfF8","PAUKsCNOz","ratPgIl4V","70","2018-10-30"),
("6","YGeEUxyYK","XAy3MS5kn","PAUKsCNOz","ratPgIl4V","70","2018-10-30"),
("7","YGeEUxyYK","lvSwkvJr9","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("8","YGeEUxyYK","0w2HgR5Sn","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("9","YGeEUxyYK","As9i1H5yh","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("10","YGeEUxyYK","ULt8hXyFZ","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("11","YGeEUxyYK","c8tWzGQZ7","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("12","YGeEUxyYK","wCnrCBr8S","PAUKsCNOz","CyHorbulb","60","2018-10-30"),
("13","YGeEUxyYK","dhn7U9dlp","PAUKsCNOz","CyHorbulb","60","2018-10-30"),
("14","YGeEUxyYK","VSt02629P","PAUKsCNOz","CyHorbulb","70","2018-10-30"),
("15","YGeEUxyYK","XzYAeyimw","PAUKsCNOz","CyHorbulb","70","2018-10-30"),
("16","YGeEUxyYK","lYEQ2FfF8","PAUKsCNOz","CyHorbulb","70","2018-10-30"),
("17","YGeEUxyYK","XAy3MS5kn","PAUKsCNOz","CyHorbulb","70","2018-10-30"),
("18","YGeEUxyYK","lvSwkvJr9","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("19","YGeEUxyYK","0w2HgR5Sn","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("20","YGeEUxyYK","As9i1H5yh","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("21","YGeEUxyYK","ULt8hXyFZ","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("22","YGeEUxyYK","c8tWzGQZ7","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("23","YGeEUxyYK","wCnrCBr8S","PAUKsCNOz","y1X9UuX6H","60","2018-10-30"),
("24","YGeEUxyYK","dhn7U9dlp","PAUKsCNOz","y1X9UuX6H","60","2018-10-30"),
("25","YGeEUxyYK","VSt02629P","PAUKsCNOz","y1X9UuX6H","70","2018-10-30"),
("26","YGeEUxyYK","XzYAeyimw","PAUKsCNOz","y1X9UuX6H","70","2018-10-30"),
("27","YGeEUxyYK","lYEQ2FfF8","PAUKsCNOz","y1X9UuX6H","70","2018-10-30"),
("28","YGeEUxyYK","XAy3MS5kn","PAUKsCNOz","y1X9UuX6H","70","2018-10-30"),
("29","YGeEUxyYK","lvSwkvJr9","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("30","YGeEUxyYK","0w2HgR5Sn","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("31","YGeEUxyYK","As9i1H5yh","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("32","YGeEUxyYK","ULt8hXyFZ","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("33","YGeEUxyYK","c8tWzGQZ7","PAUKsCNOz","y1X9UuX6H","90","2018-10-30");


DROP TABLE nilaisikap;

CREATE TABLE `nilaisikap` (
  `c_nilaisikap` int(11) NOT NULL AUTO_INCREMENT,
  `c_ta` varchar(10) NOT NULL,
  `c_aspeksikap` int(11) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `nilai` int(5) NOT NULL,
  `at` date NOT NULL,
  PRIMARY KEY (`c_nilaisikap`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO nilaisikap VALUES



DROP TABLE nilaitugas;

CREATE TABLE `nilaitugas` (
  `c_nilaitugas` int(11) NOT NULL AUTO_INCREMENT,
  `c_ta` varchar(10) NOT NULL,
  `c_aspektug` int(11) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `c_mapel` varchar(10) NOT NULL,
  `nilai` int(5) NOT NULL,
  `at` date NOT NULL,
  PRIMARY KEY (`c_nilaitugas`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

INSERT INTO nilaitugas VALUES
("1","YGeEUxyYK","1","wCnrCBr8S","PAUKsCNOz","ratPgIl4V","50","2018-10-30"),
("2","YGeEUxyYK","2","wCnrCBr8S","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("3","YGeEUxyYK","3","wCnrCBr8S","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("4","YGeEUxyYK","1","dhn7U9dlp","PAUKsCNOz","ratPgIl4V","50","2018-10-30"),
("5","YGeEUxyYK","2","dhn7U9dlp","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("6","YGeEUxyYK","3","dhn7U9dlp","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("7","YGeEUxyYK","1","VSt02629P","PAUKsCNOz","ratPgIl4V","50","2018-10-30"),
("8","YGeEUxyYK","2","VSt02629P","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("9","YGeEUxyYK","3","VSt02629P","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("10","YGeEUxyYK","1","XzYAeyimw","PAUKsCNOz","ratPgIl4V","50","2018-10-30"),
("11","YGeEUxyYK","2","XzYAeyimw","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("12","YGeEUxyYK","3","XzYAeyimw","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("13","YGeEUxyYK","1","lYEQ2FfF8","PAUKsCNOz","ratPgIl4V","50","2018-10-30"),
("14","YGeEUxyYK","2","lYEQ2FfF8","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("15","YGeEUxyYK","3","lYEQ2FfF8","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("16","YGeEUxyYK","1","XAy3MS5kn","PAUKsCNOz","ratPgIl4V","50","2018-10-30"),
("17","YGeEUxyYK","2","XAy3MS5kn","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("18","YGeEUxyYK","3","XAy3MS5kn","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("19","YGeEUxyYK","1","lvSwkvJr9","PAUKsCNOz","ratPgIl4V","50","2018-10-30"),
("20","YGeEUxyYK","2","lvSwkvJr9","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("21","YGeEUxyYK","3","lvSwkvJr9","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("22","YGeEUxyYK","1","0w2HgR5Sn","PAUKsCNOz","ratPgIl4V","50","2018-10-30"),
("23","YGeEUxyYK","2","0w2HgR5Sn","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("24","YGeEUxyYK","3","0w2HgR5Sn","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("25","YGeEUxyYK","1","As9i1H5yh","PAUKsCNOz","ratPgIl4V","50","2018-10-30"),
("26","YGeEUxyYK","2","As9i1H5yh","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("27","YGeEUxyYK","3","As9i1H5yh","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("28","YGeEUxyYK","1","ULt8hXyFZ","PAUKsCNOz","ratPgIl4V","50","2018-10-30"),
("29","YGeEUxyYK","2","ULt8hXyFZ","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("30","YGeEUxyYK","3","ULt8hXyFZ","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("31","YGeEUxyYK","1","c8tWzGQZ7","PAUKsCNOz","ratPgIl4V","50","2018-10-30"),
("32","YGeEUxyYK","2","c8tWzGQZ7","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("33","YGeEUxyYK","3","c8tWzGQZ7","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("34","YGeEUxyYK","1","wCnrCBr8S","PAUKsCNOz","CyHorbulb","50","2018-10-30"),
("35","YGeEUxyYK","2","wCnrCBr8S","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("36","YGeEUxyYK","3","wCnrCBr8S","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("37","YGeEUxyYK","1","dhn7U9dlp","PAUKsCNOz","CyHorbulb","50","2018-10-30"),
("38","YGeEUxyYK","2","dhn7U9dlp","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("39","YGeEUxyYK","3","dhn7U9dlp","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("40","YGeEUxyYK","1","VSt02629P","PAUKsCNOz","CyHorbulb","50","2018-10-30"),
("41","YGeEUxyYK","2","VSt02629P","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("42","YGeEUxyYK","3","VSt02629P","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("43","YGeEUxyYK","1","XzYAeyimw","PAUKsCNOz","CyHorbulb","50","2018-10-30"),
("44","YGeEUxyYK","2","XzYAeyimw","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("45","YGeEUxyYK","3","XzYAeyimw","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("46","YGeEUxyYK","1","lYEQ2FfF8","PAUKsCNOz","CyHorbulb","50","2018-10-30"),
("47","YGeEUxyYK","2","lYEQ2FfF8","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("48","YGeEUxyYK","3","lYEQ2FfF8","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("49","YGeEUxyYK","1","XAy3MS5kn","PAUKsCNOz","CyHorbulb","50","2018-10-30"),
("50","YGeEUxyYK","2","XAy3MS5kn","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("51","YGeEUxyYK","3","XAy3MS5kn","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("52","YGeEUxyYK","1","lvSwkvJr9","PAUKsCNOz","CyHorbulb","50","2018-10-30"),
("53","YGeEUxyYK","2","lvSwkvJr9","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("54","YGeEUxyYK","3","lvSwkvJr9","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("55","YGeEUxyYK","1","0w2HgR5Sn","PAUKsCNOz","CyHorbulb","50","2018-10-30"),
("56","YGeEUxyYK","2","0w2HgR5Sn","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("57","YGeEUxyYK","3","0w2HgR5Sn","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("58","YGeEUxyYK","1","As9i1H5yh","PAUKsCNOz","CyHorbulb","50","2018-10-30"),
("59","YGeEUxyYK","2","As9i1H5yh","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("60","YGeEUxyYK","3","As9i1H5yh","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("61","YGeEUxyYK","1","ULt8hXyFZ","PAUKsCNOz","CyHorbulb","50","2018-10-30"),
("62","YGeEUxyYK","2","ULt8hXyFZ","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("63","YGeEUxyYK","3","ULt8hXyFZ","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("64","YGeEUxyYK","1","c8tWzGQZ7","PAUKsCNOz","CyHorbulb","50","2018-10-30"),
("65","YGeEUxyYK","2","c8tWzGQZ7","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("66","YGeEUxyYK","3","c8tWzGQZ7","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("67","YGeEUxyYK","1","wCnrCBr8S","PAUKsCNOz","y1X9UuX6H","50","2018-10-30"),
("68","YGeEUxyYK","2","wCnrCBr8S","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("69","YGeEUxyYK","3","wCnrCBr8S","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("70","YGeEUxyYK","1","dhn7U9dlp","PAUKsCNOz","y1X9UuX6H","50","2018-10-30"),
("71","YGeEUxyYK","2","dhn7U9dlp","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("72","YGeEUxyYK","3","dhn7U9dlp","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("73","YGeEUxyYK","1","VSt02629P","PAUKsCNOz","y1X9UuX6H","50","2018-10-30"),
("74","YGeEUxyYK","2","VSt02629P","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("75","YGeEUxyYK","3","VSt02629P","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("76","YGeEUxyYK","1","XzYAeyimw","PAUKsCNOz","y1X9UuX6H","50","2018-10-30"),
("77","YGeEUxyYK","2","XzYAeyimw","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("78","YGeEUxyYK","3","XzYAeyimw","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("79","YGeEUxyYK","1","lYEQ2FfF8","PAUKsCNOz","y1X9UuX6H","50","2018-10-30"),
("80","YGeEUxyYK","2","lYEQ2FfF8","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("81","YGeEUxyYK","3","lYEQ2FfF8","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("82","YGeEUxyYK","1","XAy3MS5kn","PAUKsCNOz","y1X9UuX6H","50","2018-10-30"),
("83","YGeEUxyYK","2","XAy3MS5kn","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("84","YGeEUxyYK","3","XAy3MS5kn","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("85","YGeEUxyYK","1","lvSwkvJr9","PAUKsCNOz","y1X9UuX6H","50","2018-10-30"),
("86","YGeEUxyYK","2","lvSwkvJr9","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("87","YGeEUxyYK","3","lvSwkvJr9","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("88","YGeEUxyYK","1","0w2HgR5Sn","PAUKsCNOz","y1X9UuX6H","50","2018-10-30"),
("89","YGeEUxyYK","2","0w2HgR5Sn","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("90","YGeEUxyYK","3","0w2HgR5Sn","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("91","YGeEUxyYK","1","As9i1H5yh","PAUKsCNOz","y1X9UuX6H","50","2018-10-30"),
("92","YGeEUxyYK","2","As9i1H5yh","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("93","YGeEUxyYK","3","As9i1H5yh","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("94","YGeEUxyYK","1","ULt8hXyFZ","PAUKsCNOz","y1X9UuX6H","50","2018-10-30"),
("95","YGeEUxyYK","2","ULt8hXyFZ","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("96","YGeEUxyYK","3","ULt8hXyFZ","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("97","YGeEUxyYK","1","c8tWzGQZ7","PAUKsCNOz","y1X9UuX6H","50","2018-10-30"),
("98","YGeEUxyYK","2","c8tWzGQZ7","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("99","YGeEUxyYK","3","c8tWzGQZ7","PAUKsCNOz","y1X9UuX6H","80","2018-10-30");


DROP TABLE nilaiuas;

CREATE TABLE `nilaiuas` (
  `c_nilaiuas` int(11) NOT NULL AUTO_INCREMENT,
  `c_ta` varchar(10) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `c_mapel` varchar(10) NOT NULL,
  `nilai` int(5) NOT NULL,
  `at` date NOT NULL,
  PRIMARY KEY (`c_nilaiuas`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

INSERT INTO nilaiuas VALUES
("1","YGeEUxyYK","wCnrCBr8S","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("2","YGeEUxyYK","dhn7U9dlp","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("3","YGeEUxyYK","VSt02629P","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("4","YGeEUxyYK","XzYAeyimw","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("5","YGeEUxyYK","lYEQ2FfF8","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("6","YGeEUxyYK","XAy3MS5kn","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("7","YGeEUxyYK","lvSwkvJr9","PAUKsCNOz","ratPgIl4V","70","2018-10-30"),
("8","YGeEUxyYK","0w2HgR5Sn","PAUKsCNOz","ratPgIl4V","70","2018-10-30"),
("9","YGeEUxyYK","As9i1H5yh","PAUKsCNOz","ratPgIl4V","70","2018-10-30"),
("10","YGeEUxyYK","ULt8hXyFZ","PAUKsCNOz","ratPgIl4V","70","2018-10-30"),
("11","YGeEUxyYK","c8tWzGQZ7","PAUKsCNOz","ratPgIl4V","70","2018-10-30"),
("12","YGeEUxyYK","wCnrCBr8S","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("13","YGeEUxyYK","dhn7U9dlp","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("14","YGeEUxyYK","VSt02629P","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("15","YGeEUxyYK","XzYAeyimw","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("16","YGeEUxyYK","lYEQ2FfF8","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("17","YGeEUxyYK","XAy3MS5kn","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("18","YGeEUxyYK","lvSwkvJr9","PAUKsCNOz","CyHorbulb","70","2018-10-30"),
("19","YGeEUxyYK","0w2HgR5Sn","PAUKsCNOz","CyHorbulb","70","2018-10-30"),
("20","YGeEUxyYK","As9i1H5yh","PAUKsCNOz","CyHorbulb","70","2018-10-30"),
("21","YGeEUxyYK","ULt8hXyFZ","PAUKsCNOz","CyHorbulb","70","2018-10-30"),
("22","YGeEUxyYK","c8tWzGQZ7","PAUKsCNOz","CyHorbulb","70","2018-10-30"),
("23","YGeEUxyYK","wCnrCBr8S","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("24","YGeEUxyYK","dhn7U9dlp","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("25","YGeEUxyYK","VSt02629P","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("26","YGeEUxyYK","XzYAeyimw","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("27","YGeEUxyYK","lYEQ2FfF8","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("28","YGeEUxyYK","XAy3MS5kn","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("29","YGeEUxyYK","lvSwkvJr9","PAUKsCNOz","y1X9UuX6H","70","2018-10-30"),
("30","YGeEUxyYK","0w2HgR5Sn","PAUKsCNOz","y1X9UuX6H","70","2018-10-30"),
("31","YGeEUxyYK","As9i1H5yh","PAUKsCNOz","y1X9UuX6H","70","2018-10-30"),
("32","YGeEUxyYK","ULt8hXyFZ","PAUKsCNOz","y1X9UuX6H","70","2018-10-30"),
("33","YGeEUxyYK","c8tWzGQZ7","PAUKsCNOz","y1X9UuX6H","70","2018-10-30");


DROP TABLE nilaiuh;

CREATE TABLE `nilaiuh` (
  `c_nilaiuh` int(11) NOT NULL AUTO_INCREMENT,
  `c_ta` varchar(10) NOT NULL,
  `c_aspekuh` int(11) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `c_mapel` varchar(10) NOT NULL,
  `nilai` int(5) NOT NULL,
  `at` date NOT NULL,
  PRIMARY KEY (`c_nilaiuh`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

INSERT INTO nilaiuh VALUES
("1","YGeEUxyYK","1","wCnrCBr8S","PAUKsCNOz","ratPgIl4V","60","2018-10-30"),
("2","YGeEUxyYK","2","wCnrCBr8S","PAUKsCNOz","ratPgIl4V","60","2018-10-30"),
("3","YGeEUxyYK","3","wCnrCBr8S","PAUKsCNOz","ratPgIl4V","60","2018-10-30"),
("4","YGeEUxyYK","1","dhn7U9dlp","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("5","YGeEUxyYK","2","dhn7U9dlp","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("6","YGeEUxyYK","3","dhn7U9dlp","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("7","YGeEUxyYK","1","VSt02629P","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("8","YGeEUxyYK","2","VSt02629P","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("9","YGeEUxyYK","3","VSt02629P","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("10","YGeEUxyYK","1","XzYAeyimw","PAUKsCNOz","ratPgIl4V","70","2018-10-30"),
("11","YGeEUxyYK","2","XzYAeyimw","PAUKsCNOz","ratPgIl4V","70","2018-10-30"),
("12","YGeEUxyYK","3","XzYAeyimw","PAUKsCNOz","ratPgIl4V","70","2018-10-30"),
("13","YGeEUxyYK","1","lYEQ2FfF8","PAUKsCNOz","ratPgIl4V","60","2018-10-30"),
("14","YGeEUxyYK","2","lYEQ2FfF8","PAUKsCNOz","ratPgIl4V","60","2018-10-30"),
("15","YGeEUxyYK","3","lYEQ2FfF8","PAUKsCNOz","ratPgIl4V","60","2018-10-30"),
("16","YGeEUxyYK","1","XAy3MS5kn","PAUKsCNOz","ratPgIl4V","60","2018-10-30"),
("17","YGeEUxyYK","2","XAy3MS5kn","PAUKsCNOz","ratPgIl4V","60","2018-10-30"),
("18","YGeEUxyYK","3","XAy3MS5kn","PAUKsCNOz","ratPgIl4V","60","2018-10-30"),
("19","YGeEUxyYK","1","lvSwkvJr9","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("20","YGeEUxyYK","2","lvSwkvJr9","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("21","YGeEUxyYK","3","lvSwkvJr9","PAUKsCNOz","ratPgIl4V","80","2018-10-30"),
("22","YGeEUxyYK","1","0w2HgR5Sn","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("23","YGeEUxyYK","2","0w2HgR5Sn","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("24","YGeEUxyYK","3","0w2HgR5Sn","PAUKsCNOz","ratPgIl4V","90","2018-10-30"),
("25","YGeEUxyYK","1","As9i1H5yh","PAUKsCNOz","ratPgIl4V","70","2018-10-30"),
("26","YGeEUxyYK","2","As9i1H5yh","PAUKsCNOz","ratPgIl4V","70","2018-10-30"),
("27","YGeEUxyYK","3","As9i1H5yh","PAUKsCNOz","ratPgIl4V","70","2018-10-30"),
("28","YGeEUxyYK","1","ULt8hXyFZ","PAUKsCNOz","ratPgIl4V","60","2018-10-30"),
("29","YGeEUxyYK","2","ULt8hXyFZ","PAUKsCNOz","ratPgIl4V","60","2018-10-30"),
("30","YGeEUxyYK","3","ULt8hXyFZ","PAUKsCNOz","ratPgIl4V","60","2018-10-30"),
("31","YGeEUxyYK","1","c8tWzGQZ7","PAUKsCNOz","ratPgIl4V","60","2018-10-30"),
("32","YGeEUxyYK","2","c8tWzGQZ7","PAUKsCNOz","ratPgIl4V","60","2018-10-30"),
("33","YGeEUxyYK","3","c8tWzGQZ7","PAUKsCNOz","ratPgIl4V","60","2018-10-30"),
("34","YGeEUxyYK","1","wCnrCBr8S","PAUKsCNOz","CyHorbulb","60","2018-10-30"),
("35","YGeEUxyYK","2","wCnrCBr8S","PAUKsCNOz","CyHorbulb","60","2018-10-30"),
("36","YGeEUxyYK","3","wCnrCBr8S","PAUKsCNOz","CyHorbulb","60","2018-10-30"),
("37","YGeEUxyYK","1","dhn7U9dlp","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("38","YGeEUxyYK","2","dhn7U9dlp","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("39","YGeEUxyYK","3","dhn7U9dlp","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("40","YGeEUxyYK","1","VSt02629P","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("41","YGeEUxyYK","2","VSt02629P","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("42","YGeEUxyYK","3","VSt02629P","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("43","YGeEUxyYK","1","XzYAeyimw","PAUKsCNOz","CyHorbulb","70","2018-10-30"),
("44","YGeEUxyYK","2","XzYAeyimw","PAUKsCNOz","CyHorbulb","70","2018-10-30"),
("45","YGeEUxyYK","3","XzYAeyimw","PAUKsCNOz","CyHorbulb","70","2018-10-30"),
("46","YGeEUxyYK","1","lYEQ2FfF8","PAUKsCNOz","CyHorbulb","60","2018-10-30"),
("47","YGeEUxyYK","2","lYEQ2FfF8","PAUKsCNOz","CyHorbulb","60","2018-10-30"),
("48","YGeEUxyYK","3","lYEQ2FfF8","PAUKsCNOz","CyHorbulb","60","2018-10-30"),
("49","YGeEUxyYK","1","XAy3MS5kn","PAUKsCNOz","CyHorbulb","60","2018-10-30"),
("50","YGeEUxyYK","2","XAy3MS5kn","PAUKsCNOz","CyHorbulb","60","2018-10-30"),
("51","YGeEUxyYK","3","XAy3MS5kn","PAUKsCNOz","CyHorbulb","60","2018-10-30"),
("52","YGeEUxyYK","1","lvSwkvJr9","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("53","YGeEUxyYK","2","lvSwkvJr9","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("54","YGeEUxyYK","3","lvSwkvJr9","PAUKsCNOz","CyHorbulb","80","2018-10-30"),
("55","YGeEUxyYK","1","0w2HgR5Sn","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("56","YGeEUxyYK","2","0w2HgR5Sn","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("57","YGeEUxyYK","3","0w2HgR5Sn","PAUKsCNOz","CyHorbulb","90","2018-10-30"),
("58","YGeEUxyYK","1","As9i1H5yh","PAUKsCNOz","CyHorbulb","70","2018-10-30"),
("59","YGeEUxyYK","2","As9i1H5yh","PAUKsCNOz","CyHorbulb","70","2018-10-30"),
("60","YGeEUxyYK","3","As9i1H5yh","PAUKsCNOz","CyHorbulb","70","2018-10-30"),
("61","YGeEUxyYK","1","ULt8hXyFZ","PAUKsCNOz","CyHorbulb","60","2018-10-30"),
("62","YGeEUxyYK","2","ULt8hXyFZ","PAUKsCNOz","CyHorbulb","60","2018-10-30"),
("63","YGeEUxyYK","3","ULt8hXyFZ","PAUKsCNOz","CyHorbulb","60","2018-10-30"),
("64","YGeEUxyYK","1","c8tWzGQZ7","PAUKsCNOz","CyHorbulb","60","2018-10-30"),
("65","YGeEUxyYK","2","c8tWzGQZ7","PAUKsCNOz","CyHorbulb","60","2018-10-30"),
("66","YGeEUxyYK","3","c8tWzGQZ7","PAUKsCNOz","CyHorbulb","60","2018-10-30"),
("67","YGeEUxyYK","1","wCnrCBr8S","PAUKsCNOz","y1X9UuX6H","60","2018-10-30"),
("68","YGeEUxyYK","2","wCnrCBr8S","PAUKsCNOz","y1X9UuX6H","60","2018-10-30"),
("69","YGeEUxyYK","3","wCnrCBr8S","PAUKsCNOz","y1X9UuX6H","60","2018-10-30"),
("70","YGeEUxyYK","1","dhn7U9dlp","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("71","YGeEUxyYK","2","dhn7U9dlp","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("72","YGeEUxyYK","3","dhn7U9dlp","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("73","YGeEUxyYK","1","VSt02629P","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("74","YGeEUxyYK","2","VSt02629P","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("75","YGeEUxyYK","3","VSt02629P","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("76","YGeEUxyYK","1","XzYAeyimw","PAUKsCNOz","y1X9UuX6H","70","2018-10-30"),
("77","YGeEUxyYK","2","XzYAeyimw","PAUKsCNOz","y1X9UuX6H","70","2018-10-30"),
("78","YGeEUxyYK","3","XzYAeyimw","PAUKsCNOz","y1X9UuX6H","70","2018-10-30"),
("79","YGeEUxyYK","1","lYEQ2FfF8","PAUKsCNOz","y1X9UuX6H","60","2018-10-30"),
("80","YGeEUxyYK","2","lYEQ2FfF8","PAUKsCNOz","y1X9UuX6H","60","2018-10-30"),
("81","YGeEUxyYK","3","lYEQ2FfF8","PAUKsCNOz","y1X9UuX6H","60","2018-10-30"),
("82","YGeEUxyYK","1","XAy3MS5kn","PAUKsCNOz","y1X9UuX6H","60","2018-10-30"),
("83","YGeEUxyYK","2","XAy3MS5kn","PAUKsCNOz","y1X9UuX6H","60","2018-10-30"),
("84","YGeEUxyYK","3","XAy3MS5kn","PAUKsCNOz","y1X9UuX6H","60","2018-10-30"),
("85","YGeEUxyYK","1","lvSwkvJr9","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("86","YGeEUxyYK","2","lvSwkvJr9","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("87","YGeEUxyYK","3","lvSwkvJr9","PAUKsCNOz","y1X9UuX6H","80","2018-10-30"),
("88","YGeEUxyYK","1","0w2HgR5Sn","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("89","YGeEUxyYK","2","0w2HgR5Sn","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("90","YGeEUxyYK","3","0w2HgR5Sn","PAUKsCNOz","y1X9UuX6H","90","2018-10-30"),
("91","YGeEUxyYK","1","As9i1H5yh","PAUKsCNOz","y1X9UuX6H","70","2018-10-30"),
("92","YGeEUxyYK","2","As9i1H5yh","PAUKsCNOz","y1X9UuX6H","70","2018-10-30"),
("93","YGeEUxyYK","3","As9i1H5yh","PAUKsCNOz","y1X9UuX6H","70","2018-10-30"),
("94","YGeEUxyYK","1","ULt8hXyFZ","PAUKsCNOz","y1X9UuX6H","60","2018-10-30"),
("95","YGeEUxyYK","2","ULt8hXyFZ","PAUKsCNOz","y1X9UuX6H","60","2018-10-30"),
("96","YGeEUxyYK","3","ULt8hXyFZ","PAUKsCNOz","y1X9UuX6H","60","2018-10-30"),
("97","YGeEUxyYK","1","c8tWzGQZ7","PAUKsCNOz","y1X9UuX6H","60","2018-10-30"),
("98","YGeEUxyYK","2","c8tWzGQZ7","PAUKsCNOz","y1X9UuX6H","60","2018-10-30"),
("99","YGeEUxyYK","3","c8tWzGQZ7","PAUKsCNOz","y1X9UuX6H","60","2018-10-30");


DROP TABLE pkl;

CREATE TABLE `pkl` (
  `c_pkl` int(11) NOT NULL AUTO_INCREMENT,
  `c_siswa` varchar(10) NOT NULL,
  `mitradudi` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `lama` int(11) NOT NULL,
  `ket` varchar(100) NOT NULL,
  PRIMARY KEY (`c_pkl`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO pkl VALUES
("1","lYEQ2FfF8","Kantor Kecamatan","Baron","2","Baik"),
("3","lYEQ2FfF8","Kominfo Jawa Timur","Baron","2","Baik");


DROP TABLE prestasi;

CREATE TABLE `prestasi` (
  `c_prestasi` int(11) NOT NULL AUTO_INCREMENT,
  `c_siswa` varchar(10) NOT NULL,
  `c_extra` varchar(10) NOT NULL,
  `ket` varchar(100) NOT NULL,
  PRIMARY KEY (`c_prestasi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO prestasi VALUES
("1","wCnrCBr8S","4u9uxDxsi","Juara 1 Se Kabupaten"),
("2","lYEQ2FfF8","HratPgIl4","Juara 1 Se Kabupaten"),
("3","lYEQ2FfF8","7y1X9UuX6","Juara 3");


DROP TABLE rapotsiswa;

CREATE TABLE `rapotsiswa` (
  `c_rapotsiswa` int(11) NOT NULL AUTO_INCREMENT,
  `c_ta` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `s` int(3) NOT NULL,
  `i` int(3) NOT NULL,
  `a` int(3) NOT NULL,
  `catatan` text NOT NULL,
  `kelakuan` varchar(10) NOT NULL,
  `kerajinan` varchar(10) NOT NULL,
  `kerapian` varchar(10) NOT NULL,
  PRIMARY KEY (`c_rapotsiswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO rapotsiswa VALUES



DROP TABLE siswa;

CREATE TABLE `siswa` (
  `c_siswa` varchar(10) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `temlahir` varchar(20) NOT NULL,
  `tanglahir` date NOT NULL,
  `jk` varchar(2) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `foto_siswa` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`c_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO siswa VALUES
("0w2HgR5Sn","8989898987","Siswa Farmasi 008","Demangan","1999-08-17","P","PAUKsCNOz",""),
("2btyeBtPA","9980802502","SISWA 2","Jakarta Timur","1998-10-15","L","NYGh3F2AD",""),
("4gMzkM1ha","9980802516","SISWA 16","Jakarta Timur","1998-10-29","P","NYGh3F2AD",""),
("5ZygC9nzD","9980802512","SISWA 12","Jakarta Timur","1998-10-25","L","NYGh3F2AD",""),
("8POPZ2Rvx","9980802520","SISWA 20","Jakarta Timur","1998-11-02","P","NYGh3F2AD",""),
("As9i1H5yh","8989898988","Siswa Farmasi 009","Demangan","1999-08-18","P","PAUKsCNOz",""),
("AsV63cKVW","9980802519","SISWA 19","Jakarta Timur","1998-11-01","P","NYGh3F2AD",""),
("B4KaMlA7F","9980802517","SISWA 17","Jakarta Timur","1998-10-30","P","NYGh3F2AD",""),
("c8tWzGQZ7","8989898990","Siswa Farmasi 011","Demangan","1999-08-20","P","PAUKsCNOz",""),
("dhn7U9dlp","8989898981","Siswa Farmasi 002","Demangan","1999-08-11","L","PAUKsCNOz",""),
("EGVwCzI1q","9980802501","SISWA 1","Jakarta Timur","1998-10-14","L","NYGh3F2AD",""),
("Ft3tct1V8","9980802513","SISWA 13","Jakarta Timur","1998-10-26","L","NYGh3F2AD",""),
("Iy4yFQEwh","9980802506","SISWA 6","Jakarta Timur","1998-10-19","L","NYGh3F2AD",""),
("Jv6P01N5r","9980802514","SISWA 14","Jakarta Timur","1998-10-27","L","NYGh3F2AD",""),
("Ky7KsCZet","9980802515","SISWA 15","Jakarta Timur","1998-10-28","L","NYGh3F2AD",""),
("lGavgBUtx","9980802504","SISWA 4","Jakarta Timur","1998-10-17","L","NYGh3F2AD",""),
("lvSwkvJr9","8989898986","Siswa Farmasi 007","Demangan","1999-08-16","L","PAUKsCNOz",""),
("lYEQ2FfF8","8989898984","Siswa Farmasi 005","Demangan","1999-08-14","L","PAUKsCNOz",""),
("nDBREVnxL","9980802505","SISWA 5","Jakarta Timur","1998-10-18","L","NYGh3F2AD",""),
("tY2SPulkj","9980802518","SISWA 18","Jakarta Timur","1998-10-31","P","NYGh3F2AD",""),
("u3VHZXMrA","9980802509","SISWA 9","Jakarta Timur","1998-10-22","L","NYGh3F2AD",""),
("U64J5eWLI","9980802503","SISWA 3","Jakarta Timur","1998-10-16","L","NYGh3F2AD",""),
("uBy2SVHzL","9980802507","SISWA 7","Jakarta Timur","1998-10-20","L","NYGh3F2AD",""),
("ULt8hXyFZ","8989898989","Siswa Farmasi 010","Demangan","1999-08-19","P","PAUKsCNOz",""),
("VSt02629P","8989898982","Siswa Farmasi 003","Demangan","1999-08-12","L","PAUKsCNOz",""),
("VyQMEVxVt","9980802508","SISWA 8","Jakarta Timur","1998-10-21","L","NYGh3F2AD",""),
("wCnrCBr8S","8989898980","Siswa Farmasi 001","Demangan","1999-08-10","L","PAUKsCNOz","media/fotosiswa/1566357676.jpg"),
("whWMSgJVx","9980802510","SISWA 10","Jakarta Timur","1998-10-23","L","NYGh3F2AD",""),
("XAy3MS5kn","8989898985","Siswa Farmasi 006","Demangan","1999-08-15","L","PAUKsCNOz",""),
("XzYAeyimw","8989898983","Siswa Farmasi 004","Demangan","1999-08-13","L","PAUKsCNOz",""),
("YlEA4Rnxb","9980802511","SISWA 11","Jakarta Timur","1998-10-24","L","NYGh3F2AD","");


DROP TABLE tahunakademik;

CREATE TABLE `tahunakademik` (
  `c_ta` varchar(10) NOT NULL,
  `tahun` varchar(15) NOT NULL,
  `semester` varchar(12) NOT NULL,
  `status` varchar(7) NOT NULL,
  PRIMARY KEY (`c_ta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tahunakademik VALUES
("6ARym1eC6","2016/2017","2",""),
("FJKbpALlk","2017/2018","1",""),
("jDK0ouMR4","2016/2017","1",""),
("WzpoCjGl1","2017/2018","2",""),
("YGeEUxyYK","2018/2019","1","aktif");


DROP TABLE tipekognitif;

CREATE TABLE `tipekognitif` (
  `c_tipekognitif` int(11) NOT NULL AUTO_INCREMENT,
  `kognitif` varchar(10) NOT NULL,
  `tipe` varchar(10) NOT NULL,
  `persen` int(11) NOT NULL,
  `ket` varchar(30) NOT NULL,
  PRIMARY KEY (`c_tipekognitif`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO tipekognitif VALUES
("1","uh","persen","10","ULANGAN HARIAN"),
("2","tugas","persen","15","TUGAS"),
("3","mid","persen","25","MID SEMESTER"),
("4","uas","persen","50","ULANGAN AKHIR SEMESTER");


DROP TABLE walikelas;

CREATE TABLE `walikelas` (
  `c_walikelas` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `c_guru` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  PRIMARY KEY (`c_walikelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO walikelas VALUES
("UX5a9rsDN","1ipa","1ipa","pJpxaJamf","NYGh3F2AD"),
("V38LwjOZi","xfarmasi","xfarmasi","w1WUzRc2U","PAUKsCNOz");


DROP TABLE walimurid;

CREATE TABLE `walimurid` (
  `c_walimurid` varchar(10) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO walimurid VALUES
("8sAJKLnIW","EGVwCzI1q","s1","s1","s1"),
("xXUsExFXL","lYEQ2FfF8","Bapak Saya","bpk","bpk"),
("0j1pO2wxl","wCnrCBr8S","Samsuri","samsuri","samsuri");


