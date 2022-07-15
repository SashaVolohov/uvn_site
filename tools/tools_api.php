<?php

	require_once("../db_connect.php");
	require_once("tools_defines.php");

	$params_count = 0;
	$mode = SHOW_INPUTS;

	class ToolsAPI {
		
		public function changeMode($newMode) {
			$this->mode = $newMode;
			$this->params_count = 0;
		}
		
		public function CreateInput($name) {
			if($this->mode == SHOW_INPUTS) {
				$this->params_count++;
				
				echo "<div class=\"mb_unit\">
					<span class=\"mbu_name\">$name:</span>
					<input class=\"mbu_input\" name=\"param_$this->params_count\"></input>
				</div>";
			} else {
				$this->params_count++;
				return $_GET["param_$this->params_count"];
			}
		}
		
	}
?>