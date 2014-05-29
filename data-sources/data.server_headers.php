<?php

	require_once(TOOLKIT . '/class.datasource.php');
	
	Class datasourceServer_Headers extends Datasource{

		function about(){
			return array(
					 'name' => 'Server Headers',
					 'author' => array(
							'name' => 'Symphony Team',
							'website' => 'http://symphony-cms.com'),
					 'version' => '1.2',
					 'release-date' => '2011-03-22');	
		}

		function grab(&$param_pool){
			
			$result = new XMLElement("server-headers");
			
			$included = Symphony::Configuration()->get('include', 'server-headers');
			$included = explode(',', $included);
			
			foreach($included as $header){
				if(strlen(trim($_SERVER[$header])) == 0) continue;
				$result->appendChild(new XMLElement(strtolower(str_replace('_', '-', $header)), General::sanitize($_SERVER[$header])));
			}
			
			return $result;
			
		}
	}