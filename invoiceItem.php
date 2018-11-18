<?php
    // Define Class
     class invoiceItem {
    // Define instance variables    
        private $itemID;
        private $itemQuantity;
        private $itemPrice;
        private $itemDescription;
      
    // Create Get/Sets for instance Vars 
    
    // ItemId Get/Set
        public function setItemId($itemID) {
            $this->itemID = $itemID;
        }
            
        public function getItemID() {
            return $this->itemID;
        }    
        
    // itemQuantity Get/Set
        public function setItemQuantity($itemQuantity) {
            $this->itemQuantity = $itemQuantity;
        }
        
        public function getItemQuantity() {
            return $this->itemQuantity;
        }
        
    // itemPrice Get/Set 
    
        public function setItemPrice($itemPrice) {
            $this->itemPrice = $itemPrice;
        }
        
        public function getItemPrice() {
            return $this->itemPrice;
        }
        
    // itemDescription Get/Set
    
        public function setItemDescription($itemDescription) {
            $this->itemDescription = $itemDescription;
        }
        
        public function getItemDescription() {
            return $this->itemDescription;
        }
        
    // Calculate item total function
    
        public function calculateItemTotal() {
            $itemTotal = $this->itemQuantity * $this->itemPrice;
            return $itemTotal;
        }
        
    // Display function prints a string with the instance var values and the results of the calculateItemTotal function
        
        public function display() {
            return sprintf("Item Id: %s, Quantity: %s, Price: $%s, Description: %s, Total Cost: $%s", $this->itemID, $this->itemQuantity, $this->itemPrice, 
                $this->itemDescription, $this->calculateItemTotal());
        }
        
    }
?>