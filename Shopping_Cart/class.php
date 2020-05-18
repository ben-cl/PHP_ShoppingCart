<?php 

// shopping cart 
class CartItem
{
    // property declaration
    public $session_id1;
	public $sel_item_id;
	public $item_title;
	public $sel_item_qty;
	public $sel_item_size;
	public $sel_item_color;
	public $date_added;
	public $price;
	public $variation_id;
	

	//constructor
	// make 2 
	/*
	public function __construct(){
		$name = "";
		$hours = 0;
		$rates = 0;
		
		$overtime = false;
	}
	*/
	public function __construct($a, $b, $c, $d, $e, $f, $g, $h, $i){
		$this->session_id1 = $a;
		$this->sel_item_id = $b;
		$this->item_title = $c;
		$this->sel_item_qty = $d;
		$this-> sel_item_size = $e;
		$this->sel_item_color = $f;
		$this->date_added = $g;
		$this->price = $h;
        $this->variation_id = $i;

    }



    public function get_id() {
        return $this->item_title;
    }

    public function get_item_id() {
        return $this->sel_item_id;
    }
	
	public function get_title() {
		 	 return $this->item_title;
	 }

    public function get_quantity() {
        return $this->sel_item_qty;
    }

    public function get_size() {
        return $this->sel_item_size;
    }

	public function get_color() {
		 	 return $this->sel_item_color;
    }
    public function get_price() {
        return $this->price;
    }
    public function get_total_price() {
        return $this->price * $this->sel_item_qty;
    }
    public function get_variation_id()
    {
        return $this->variation_id;
    }





	
	public function printItem(){
		
		/*
		$display_block = "
   	    <tr>
   	    <td align=\'center\'>".$this->sel_item_id."<br></td>
   	    <td align=\'center\'>".$this->sel_item_qty."<br></td>";
   	    */
		
		$display_block = "
   	    <tr>
   	    <td align=\"center\">".$this->item_title." <br></td>
   	    <td align=\"center\">".$this->sel_item_size." <br></td>
   	    <td align=\"center\">".$this->sel_item_color."<br></td>
   	    <td align=\"center\">".$this->price."<br></td>
   	    <td align=\"center\">".$this->sel_item_qty." <br>
   	    <td align=\"center\">".$this->sel_item_qty * $this->price."</td>";
		echo $display_block;
		// fix id number
		
		/*
		echo $display_block;
		
		echo "<tr>";
		
		echo "<td>".$this->name."</td>";
		
		echo "<td>".$this->hours."</td>";
		
		echo "<td>".$this->rates."</td>";
		
		// do pay function

		$this->calculatePay();
		
		echo "</tr>";
		
		echo self::FULL_TIME." ";
		
		echo $this->rates." "; 
		
		echo self::FULL_TIME*$this->rates. " ";
		
		echo $this->overtime. " ";
		
		*/
		
	}
}
?>