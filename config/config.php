<?php
    class Config {
        private $HOST = "localhost";
        private $USERNAME = "root";
        private $PASSWORD = "";
        private $DB_NAME = "parking_db"; // change this to your DB name
        private $connection;

        public function initDB() {
            $this->connection = mysqli_connect($this->HOST, $this->USERNAME, $this->PASSWORD, $this->DB_NAME);
            return $this->connection;
        }

        // Insert vehicle
        public function insertVehicle($plate_number, $owner_name, $vehicle_type) {
            $this->initDB();
            $query = "INSERT INTO vehicles (plate_number, owner_name, vehicle_type) VALUES ('$plate_number', '$owner_name', '$vehicle_type')";
            return mysqli_query($this->connection, $query);
        }

        // Fetch all vehicles
        public function fetchData() {
            $this->initDB();
            $query = "SELECT * FROM vehicles";
            return mysqli_query($this->connection, $query);
        }

        // Get single vehicle by ID
        public function getVehicleById($id) {
            $this->initDB();
            $query = "SELECT * FROM vehicles WHERE id=$id";
            $result = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($result);
        }

        // Update vehicle
        public function updateVehicle($id, $plate_number, $owner_name, $vehicle_type) {
            $this->initDB();
            $query = "UPDATE vehicles SET plate_number='$plate_number', owner_name='$owner_name', vehicle_type='$vehicle_type' WHERE id=$id";
            return mysqli_query($this->connection, $query);
        }

        // Delete vehicle
        public function deleteVehicle($id) {
            $this->initDB();

            $record = $this->getVehicleById($id);

            if ($record) {
                $query = "DELETE FROM vehicles WHERE id=$id";
                return mysqli_query($this->connection, $query);
            } else {
                return false;
            }
        }
// <--------------------------------------------------------------------------------------------->
        public function insertParkingSlot($slot_number, $status, $vehicle_id = null){
            $this->initDB();
            $query = "INSERT INTO parking_slots (slot_number, status, vehicle_id) VALUES ('$slot_number', '$status', " . ($vehicle_id ? $vehicle_id : "NULL") . ")";
            return mysqli_query($this->connection, $query);
        }

        public function fetchParkingSlots(){
            $this->initDB();
            $query = "SELECT * FROM parking_slots";
            return mysqli_query($this->connection, $query);
        }

        public function getParkingSlotById($id){
            $this->initDB();
            $query = "SELECT * FROM parking_slots WHERE id=$id";
            $result = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($result);
        }

        public function updateParkingSlot($id, $slot_number, $status, $vehicle_id = null){
            $this->initDB();
            $query = "UPDATE parking_slots SET slot_number='$slot_number', status='$status', vehicle_id=" . ($vehicle_id ? $vehicle_id : "NULL") . " WHERE id=$id";
            return mysqli_query($this->connection, $query);
        }

        public function deleteParkingSlot($id){
            $this->initDB();
            $query = "DELETE FROM parking_slots WHERE id=$id";
            return mysqli_query($this->connection, $query);
        }

    }
?>
