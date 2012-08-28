<?php

	Class extension_ServerHeaders extends Extension{
	
		public function install() {
			if(Symphony::Configuration()->get('include', 'server-headers') == '') {
				$includes = 'HTTP_REFERER,HTTP_USER_AGENT,HTTP_HOST,SERVER_NAME,SERVER_ADDR,SERVER_PORT,REMOTE_ADDR,QUERY_STRING,HTTP_X_FORWARDED_FOR';
				Symphony::Configuration()->set('include', $includes, 'server-headers');
				Symphony::Configuration()->write();
			}
		}

		public function uninstall() {
			Symphony::Configuration()->remove('server-headers');
			Symphony::Configuration()->write();
		}
	}
	