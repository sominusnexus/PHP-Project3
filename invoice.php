<?php
require_once('invoiceItem.php');
    
    // Define the Invoice class
    class Invoice {
        
        private $invoiceItems = array(); // Create an arry of InvoiceItems

        private $invoiceTotal;   // Create a variable to store the total
                                 // of Invoice Items

        
        // invoiceItems Get/Set
        public function setInvoiceItems($invoiceItems) {
            $this->invoiceItems = $invoiceItems;
        }

        public function getInvoiceItems() {
            return $this->invoiceItems;
        }

        public function getInvoiceTotal() {
            return $this->invoiceTotal;
        }

        public function setInvoiceTotal() {
            $this->invoiceTotal = $invoiceTotal;
        }

        // Calculates total cost of all invoice items
        public function calculateInvoice() {
            $invoiceItems = $this->getInvoiceItems();
            $invoiceTotal = 0; 

            foreach ($invoiceItems as $item) {
                $invoiceTotal += $item->calculateItemTotal();
            }    
               return $invoiceTotal;
        }        
        
        public function displayInvoice() {
            // loop through all the invoice items and display each of them
            $invoiceItems = $this->getInvoiceItems();
            foreach ($invoiceItems as $item) {
                echo $item->display() . "<br/>";
            }

             echo sprintf("Invoice Total: $%s", $this->calculateInvoice());
        }
        
        
    }
    
?>