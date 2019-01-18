<?php

class MAQEBot 
{
	/**
	 *  Input command
	 */
	protected $_args = array();

	/**
	 *  init direction
	 */

	protected $_direction = 'North';

	/**
	 *  init poistion X,Y
	 */
	protected $_position = array(
		'X' => 0,
		'Y' => 0
	);

	protected $_step = 0;


	/**
	 * 
	 * MAQEBOT PATTERN
	 *           Y
	 *  -11|-----|01---|11         N
	 *  -10|-----|00---|10  X   W     E
	 * -1-1|-----|0-1--|1-1        S
	 * 
	 */

	/**
	 * 
	 */
	public function __construct()
	{
		$this->_parseArgs();
	}

	/**
	 *  Get Input 
	 */
	protected function _parseArgs()
	{
		foreach($_SERVER['argv'] as $arg){
			$this->_args = $arg;
		}
	}

	protected function changeDirection($next)
	{
		$currentDirection = $this->_direction;
		// N, W, E, S 

		switch ($currentDirection) {
			case 'North':
				if($next == 'R') $this->_direction = 'East';
				if($next == 'L') $this->_direction = 'West';
				break;
			case 'West':
				if($next == 'R') $this->_direction = 'North';
				if($next == 'L') $this->_direction = 'South';
				break;
			case 'East':
				if($next == 'R') $this->_direction = 'South';
				if($next == 'L') $this->_direction = 'North';
				break;
			case 'South':
				if($next == 'R') $this->_direction = 'West';
				if($next == 'L') $this->_direction = 'East';
				break;
		}
	}

	protected function changePostion($step)
	{
		$currentPosition = $this->_position;
		// where are we now?
		$currentDirection = $this->_direction;
		// where direction we face now?
		
		switch ($currentDirection) {
			case 'North':
				$this->_position = array(
					'X' => $currentPosition['X'], 
					'Y' => $currentPosition['Y']  + $step,
				);
				break;
			case 'West':
				$this->_position = array(
					'X' => $currentPosition['X'] - $step, 
					'Y' => $currentPosition['Y'] ,
				);
				break;
			case 'East':
				$this->_position = array(
					'X' => $currentPosition['X'] + $step, 
					'Y' => $currentPosition['Y'],
				);
				break;
			case 'South':
				$this->_position = array(
					'X' => $currentPosition['X'] , 
					'Y' => $currentPosition['Y'] - $step,
				);
				break;
		}
	}

	/**
	 * Excute command to move maqebot
	 * 
	 */
	public function run()
	{
		$command = str_split($this->_args);
		$last = count($command);

		foreach($command as $key => $char) {

			if($char == 'R' || $char == 'L') 
			{
				$this->changeDirection($char);
			}
				
			if($char == 'W') 
			{
				$step = '';
			}
			
			if(is_numeric($char))
			{
				$step .= $char;
				if($key + 1 == $last || array_key_exists($key + 1, $command) && !is_numeric($command[$key + 1])) {
					$this->changePostion($step);
				}
			}

		}
		echo 'X: ' . $this->_position['X']. ' Y: '. $this->_position['Y'] . ' Direction: ' . $this->_direction;
	}

}


$maqebot = new MAQEBot();
$maqebot->run();