<?php
    class Classroom extends Database{
        function all(){
            $sql = "SELECT * FROM v_DanhSachLop";
            
            $result = $this->db->query($sql);

            if(!$result){
                return $this->db->error;
            }

            if($result->num_rows > 0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }
            return 0;
        }
        function store($data)
        {
            $sql = "CALL sp_ThemLop('{$data['maLop']}',"
            . "'{$data['maCoVan']}', '{$data['tenLop']}', '{$data['khoaHoc']}')";
            $result = $this->db->query($sql);
            if(!$result){
                return $this->db->error;
            }
            return true;
        }
        function update($data)
        {
            // var_dump($data);
            // die();
            $sql = "CALL sp_CapNhatLop('{$data['maLop']}', '{$data['maLop']}',"
            . "'{$data['tenLop']}', '{$data['maCoVan']}', '{$data['khoaHoc']}')";
            $result = $this->db->query($sql);
            if(!$result){
                return $this->db->error;
            }
            return true;
        }
        function getByCollege($maKhoa){
            $sql = "SELECT * FROM v_DanhSachLop WHERE maKhoa = '$maKhoa'";
            
            $result = $this->db->query($sql);

            if(!$result){
                return $this->db->error;
            }

            if($result->num_rows > 0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }
            return 0;
        }
        function getTotal(){
            $sql = "SELECT fn_SoLuongLop()";
            
            $result = $this->db->query($sql);

            if(!$result){
                return $this->db->error;
            }

            if($result->num_rows > 0){
                return $result->fetch_array();
            }
            return 0;
        }
    }

?>