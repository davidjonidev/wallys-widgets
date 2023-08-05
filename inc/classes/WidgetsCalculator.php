<?php


class WidgetsCalculator {

	public function __construct(private int $amount, private array $packs, private array $results ) {
		$this->amount = $amount;
		$this->packs = $packs;
		$this->results = $results;
	}

	public function calculateResults() {
		$amount_required = $this->amount;
		$packs_array_desc = $this->packs;
		$packs_array_asc = $this->packs;
		$result_array = $this->results;
		sort($packs_array_asc);

		$counter = 0;
		foreach( $packs_array_desc as $option ) {
			$mod = $amount_required % $option;
			$times = ($amount_required-$mod)/$option;
			
			// Checking fitment between smallest and second smallest
			if ( $option === $packs_array_asc[1] ) {
				if ( $mod > $packs_array_asc[0] && $mod <= $packs_array_asc[1] ) {
					$times++;
					$mod = 0;
				}
			}

			// Last option
			if( $counter == count( $packs_array_desc ) - 1) {
				if ( $mod <= $option && $mod !== 0 ) {
					$times++;
					$mod = 0;
				}
			}

			$amount_required = $mod;
			$result_array[$option] = $times;
			$counter++;
		}

		$this->results = $result_array;
	}

	public function getResults(): array {
		return $this->results;
	}

}