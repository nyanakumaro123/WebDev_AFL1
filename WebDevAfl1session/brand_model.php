<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class Brand {
    public $id;
    public $namaBrand;
    public $asalBrand;
    
    private function initSession() {
        if (!isset($_SESSION['brands'])) {
            $_SESSION['brands'] = [
                ['id' => 1, 'nama_brand' => 'Ford', 'asal_brand' => 'Amerika Serikat'],
                ['id' => 2, 'nama_brand' => 'BMW', 'asal_brand' => 'Jerman'],
                ['id' => 3, 'nama_brand' => 'Toyota', 'asal_brand' => 'Jepang']
            ];
        }
    }
    
    public function getAllBrands() {
        $this->initSession();
        return $_SESSION['brands'];
    }
    
    public function addBrand($nama, $asal) {
        $this->initSession();
        
        $newId = 1;
        if (!empty($_SESSION['brands'])) {
            $lastItem = end($_SESSION['brands']);
            $newId = $lastItem['id'] + 1;
        }
        
        $_SESSION['brands'][] = [
            'id' => $newId,
            'nama_brand' => $nama,
            'asal_brand' => $asal
        ];
        
        return true;
    }
    
    public function deleteBrand($id) {
        $this->initSession();
        
        foreach ($_SESSION['brands'] as $key => $brand) {
            if ($brand['id'] == $id) {
                unset($_SESSION['brands'][$key]);
                $_SESSION['brands'] = array_values($_SESSION['brands']);
                return true;
            }
        }
        
        return false;
    }
    
    public function getBrandById($id) {
        $this->initSession();
        
        foreach ($_SESSION['brands'] as $brand) {
            if ($brand['id'] == $id) {
                return $brand;
            }
        }
        
        return null;
    }
    
    public function updateBrand($id, $nama, $asal) {
        $this->initSession();
        
        foreach ($_SESSION['brands'] as $key => $brand) {
            if ($brand['id'] == $id) {
                $_SESSION['brands'][$key]['nama_brand'] = $nama;
                $_SESSION['brands'][$key]['asal_brand'] = $asal;
                return true;
            }
        }
        
        return false;
    }
}
?>