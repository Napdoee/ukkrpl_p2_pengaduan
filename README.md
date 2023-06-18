
# UKK RPL Paket 1 | Pengaduan Masyarakat

Ujian Kompentensi RPL Paket 1, Aplikasi Pengaduan Masyarakat
## Sistem

Aplikasi Pengaduan Masyarakat dengan sistem CRUD memungkinkan masyarakat untuk mengajukan, melihat, memperbarui, dan menghapus pengaduan mereka. Aplikasi ini dirancang untuk memberikan wadah bagi masyarakat untuk melaporkan masalah, keluhan, atau permintaan kepada pihak yang berwenang. Pengguna dapat membuat pengaduan dengan mengisi informasi seperti deskripsi masalah, lokasi, dan kategori terkait. Masyarakat juga dapat melihat pengaduan mereka, serta menghapus pengaduan jika sudah selesai atau tidak relevan lagi. Sistem CRUD membantu dalam pemrosesan pengaduan dengan efisien dan memungkinkan pembaruan serta penghapusan yang diperlukan.
## Instalasi 
#### 1. Mengaplikasikan Database
- Mencari file *SQL* database
- `_db/ukk_pengaduan.sql`
- Buat database dengan nama *ukk_pengaduan*
- Ekspor database `ukk_pengaduan.sql`

#### 2. Tampilan dengan Admin LTE 3
- Menginstal template [Admin LTE 3](https://github.com/ColorlibHQ/AdminLTE/releases)
- Buat folder baru dengan nama `assets` di directory file project kalian
- Pindahkan file `dist` dan `plugins` dari **Admin LTE 3** ke folder `assets`

#### 3. Jalankan project dengan *Apache* dan *MySQL*


## Users

| Level       | Username  | Password  |
| ----------- | --------- | --------- |
| Admin       | admin     | admin     |
| Petugas     | wandi     | wandi     |
| Masyarakat  | wiwi      | wiwi      |

## Screenshots

#### Halaman Admin
![SPP APP](https://i.imgur.com/f3q94ok.png)

#### Halaman Pengaduan
![SPP APP](https://i.imgur.com/IKY27mk.png)

#### Detail Pengaduan
![SPP APP](https://i.imgur.com/AAPnlLg.png)

