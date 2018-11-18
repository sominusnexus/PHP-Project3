<?php
	require_once('invoiceItem.php');
    require_once('invoice.php');

    // Create processInvoice Class
    class processInvoice {
        // Declare instance Vars
    	private $invoice;

    	// invoice get/set
        public function setInvoice($invoice) {
            $this->invoice = $invoice;
        }
            
        public function getInvoice() {
            return $this->invoice;
        }    
        // Create invoice items function to instantiate 3 invoiceItem objects
        // Insert the objects into the InvoiceItems array
        // Use the invoice item Get/Set methods to assign instace var values
    	public function createInvoiceItems() {

    		$firstItem = new invoiceItem();
    		$secondItem = new invoiceItem();
    		$thirdItem = new invoiceItem();


    		$invoiceItems[] = $firstItem;
    		$invoiceItems[] = $secondItem;
    		$invoiceItems[] = $thirdItem;

    		$firstItem->setItemID('1');
    		$firstItem->setItemQuantity('6');
    		$firstItem->setItemPrice('1200.99');
    		$firstItem->setItemDescription('Macbook Pro');

    		$secondItem->setItemID('2');
    		$secondItem->setItemQuantity('2');
    		$secondItem->setItemPrice('799.99');
    		$secondItem->setItemDescription('HTC Vive');

    		$thirdItem->setItemID('3');
    		$thirdItem->setItemQuantity('13');
    		$thirdItem->setItemPrice('79.99');
    		$thirdItem->setItemDescription('SNES Classic');

            $this->invoice->setInvoiceItems($invoiceItems); 
    	}

        // run process function instantiates new invoice instance and calls
        // CreateInvoiceItems, CalculateInvoice and DisplayInvoice Methods on the object
    	public function runProcess() {

            $this->setInvoice(new invoice());
    		
            $this->createInvoiceItems();
    		$this->invoice->calculateInvoice();
    		$this->invoice->displayInvoice();
    	}

    }

?>