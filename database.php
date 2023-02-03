<?php 

class Database 
{
    protected $host = 'localhost';
    protected $user = 'root';
    protected $pass = '';
    protected $db   = 'ukk_pengaduan';

    var $connect;

    function __construct(){
        $this->connect = mysqli_connect($this->host, $this->user, $this->pass, $this->db);

        if(mysqli_connect_errno()){
            echo mysqli_connect_error();
        }
    }

    function query($sql){
        $resArr = array();
        $result = mysqli_query($this->connect, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $resArr[] = $row;
        }

    return $resArr;
    }

    /** 
    Cek User Login
    **/
    function cekLogin($user, $pass){
        // $query = mysqli_query($this->connect, "call mLogin('$user', '$pass')");
        $query = mysqli_query($this->connect, "SELECT * FROM masyarakat 
        WHERE username = '$user' AND password = '$pass' ");
        if(mysqli_num_rows($query)){
            $data = 'masyarakat';
        } else {
            // $subQuery = mysqli_query($this->connect, "call pLogin('$user', '$pass')");
            $subQuery = mysqli_query($this->connect, "SELECT * FROM petugas
            WHERE username = '$user' AND password = '$pass'");
            if(mysqli_num_rows($subQuery)){
                $data = 'petugas';
            } else {
                return false;
            }
        }

        return $data;
    }

    /** 
    Insert data
    **/

    function insertPetugas($namaPetugas, $username, $password, $telp, $level){
        $query = mysqli_query($this->connect, "INSERT INTO petugas
        VALUES('', '$namaPetugas', '$username', '$password', '$telp', '$level')");

        return $query;
    }

    function register($nik, $nama, $username, $password, $notelp){
        $query = mysqli_query($this->connect, "call registrasi('$nik', '$nama', '$username', '$password', '$notelp')");

        return $query;
    }

    function pengaduan($nik, $isi, $foto){
        $query = mysqli_query($this->connect, "call pengaduan('$nik', '$isi', '$foto')");

        return $query;
    }

    function tanggapan($id_pengaduan, $id_petugas, $tanggapan){
        $query = mysqli_query($this->connect, "call tanggapan('$id_pengaduan', '$tanggapan', '$id_petugas')");

        return $query;
    }

    /** 
    Edit data user
    **/
    function editPetugas($idPetugas, $namaPetugas, $username, $password, $telp, $level){
        $query = mysqli_query($this->connect, "UPDATE petugas SET
        nama_petugas    = '$namaPetugas',   username        = '$username',
        password        = '$password',      telp            = '$telp',
        level           = '$level'
        WHERE id_petugas = $idPetugas");

        return $query;
    }

    function editMasyarakat($nik, $nama, $username, $password, $notelp){
        $query = mysqli_query($this->connect, "UPDATE masyarakat SET
        nik     = '$nik',   username = '$username',
        nama    = '$nama',  password = '$password',
        telp    = '$notelp'
        WHERE nik = '$nik'");

        return $query;
    }

    /** 
    Show data by table
    **/
    function userDetail($table, $user, $pass){
        $result = $this->query("SELECT * FROM $table WHERE
        username = '$user' AND password = '$pass'")[0];
        if(!$result){
            return false;
        }

        return $result;
    }

    function tampilData($table, $order){
        $query = $this->query("SELECT * FROM $table ORDER BY $order DESC");
        if(!$query){
            return false;
        }
        
        return $query;
    }

    function detailData($table, $pk, $col){
        $query = $this->query("SELECT * FROM $table WHERE $pk = '$col'");
        if(!$query){
            return false;
        }

        return $query[0];
    }

    /** 
    Status function
    **/
    function statusData($sts){
        switch($sts)
        {
            case 'proses' :
                return '<span class="badge badge-warning">PROSES</span>';
                break;
            case 'selesai' :
                return '<span class="badge badge-success">SELESAI</span>';
                break;
            default :
                return '<span class="badge badge-danger">PENDING</span>';
                break;
        }
    }

    /** 
    Count all 'pengaduan' function
    **/
    function jmlPengaduan(){
        $query = $this->query("SELECT jmlPengaduan() as JmlPengaduan")[0];
        $query = $query['JmlPengaduan'];
        if(!$query){
            return false;
        }
        
        return $query;
    }

    /** 
    Delete data function
    **/
    function delete($table, $pk, $col){
        $query = mysqli_query($this->connect, "DELETE FROM $table WHERE $pk='$col'");
        if(!$query){
            return false;
        }

        return $query;
    }

    /** 
    Limit text function
    **/
    function limitText($str, $num){
        $text = (strlen($str) > $num) ? substr($str, 0, ($num - 3)).'...' : $str;
        if(!$text){
            return false;
        }
        
        return $text;
    }

    /** 
    Other function;
    **/
    function setStatus($id, $sts){
        $query = mysqli_query($this->connect, "UPDATE pengaduan SET
        status = '$sts' WHERE id_pengaduan = $id");

        return $query;
    }

    function alertMsg($msg, $loc){
        echo "<script>alert('$msg');
        window.location='$loc'</script>";
    }

    function setSession($uname, $uid, $lvl, $status){
        $_SESSION['username']   = $uname;
        $_SESSION['userId']     = $uid;
        $_SESSION['level']      = $lvl;
        $_SESSION['status']     = $status;

        return true;
    }
}