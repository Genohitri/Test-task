<?php





// Task №1


//header("refresh: 1;");

function getSyn($synonyms) {

	$rendomNumber = rand(0, (count($synonyms))-1);

	return $synonyms[$rendomNumber];
}


$str1 = array('Пожалуйста' , 'Просто' );
$str2 = array('удивительное', 'крутое', 'простое');
$str3 = array('быстро', 'мгновенно');
$str4 = " изменялось " . getSyn($str3) . " случайным образом ";
$str5 = array($str4, ' менялось каждый раз ');


$string = getSyn($str1) . " сделайте так, чтобы это " . getSyn($str2) . " тестовое предложение " . getSyn($str5);


echo $string;



// Task №2



$sql =  "SELECT
o.customer_name AS Name,
GROUP_CONCAT(DISTINCT CONCAT(o_l.quantity, ' - ' ,p.price) ORDER BY o_l.quantity DESC, ' ,' ) AS Result,
SUM(p.price) AS TotalSumPerCustomer
FROM order_line AS o_l
INNER JOIN test.order AS o
on o_l.order_id = o.id
INNER JOIN product AS p
on o_l.product_id = p.id
GROUP BY o.id;" ;




// Task №3



class Order {

	public $list = array();

	

	public function getSum() {

		return array_sum($this->list);

	}


	public function getTotal () {

		return  $this->getSum() - $this->getSell() * $this->getSum();


	}	


	private function countArray() {

		return count($this->list);
	}

	private function searchTax($element) {

		return  array_key_exists($element, $this->list);
	}



	private function getSell() {

		$sell;
		$sellElement1 = "A";
		$sellElement2 = "C";

		if ($this->getSum() >=100) {
	  		$sell = 0.15;
		}

		elseif (($this->countArray() >= 2) && ($this->searchTax($sellElement1) || $this->searchTax($sellElement1))) {
	   		 $sell = 0.1;
		}

		elseif (countArray() >= 3 ) {
	   		$sell = 0.05;
		} 

		else {
	  	$sell = 0;
		}

		return $sell;
	}


}






$products = array("A" => 57, "B"=>22, "C"=>41,"D"=>17, "E"=>33,"F"=>19);


$check = new Order();
$check->list = $products;
echo $check->getTotal();