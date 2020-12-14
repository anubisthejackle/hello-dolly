<?php

namespace HelloDolly;

class HelloDolly {

	private $_texturizer;
	private $_translator;

	public function __construct(Callable $texturizer, Callable $translator) {
		$this->_texturizer = $texturizer;
		$this->_translator = $translator;
	}

	public function printFormattedLyric($locale = 'en_US') {
		
		$chosen = $this->_getLyric();
		
		$lang   = '';
		if ( 'en_' !== substr( $locale, 0, 3 ) ) {
			$lang = ' lang="en"';
		}

		$translator = $this->_translator;
	
		printf(
			'<p id="dolly"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s</span></p>',
			$translator( 'Quote from Hello Dolly song, by Jerry Herman:' ),
			$lang,
			$chosen
		);
		
	}

	private function _getLyric() {
		/** These are the lyrics to Hello Dolly */
		$lyrics = [
			"Hello, Dolly",
			"Well, hello, Dolly",
			"It's so nice to have you back where you belong",
			"You're lookin' swell, Dolly",
			"I can tell, Dolly",
			"You're still glowin', you're still crowin'",
			"You're still goin' strong",
			"I feel the room swayin'",
			"While the band's playin'",
			"One of our old favorite songs from way back when",
			"So, take her wrap, fellas",
			"Dolly, never go away again",
			"Hello, Dolly",
			"Well, hello, Dolly",
			"It's so nice to have you back where you belong",
			"You're lookin' swell, Dolly",
			"I can tell, Dolly",
			"You're still glowin', you're still crowin'",
			"You're still goin' strong",
			"I feel the room swayin'",
			"While the band's playin'",
			"One of our old favorite songs from way back when",
			"So, golly, gee, fellas",
			"Have a little faith in me, fellas",
			"Dolly, never go away",
			"Promise, you'll never go away",
			"Dolly'll never go away again",
		];
	
		$line = $lyrics[ array_rand($lyrics) ];
		$texturizer = $this->_texturizer;
		return $texturizer( $line );
	}

	public function printCss() {
		echo "
		<style type='text/css'>
		#dolly {
			float: right;
			padding: 5px 10px;
			margin: 0;
			font-size: 12px;
			line-height: 1.6666;
		}
		.rtl #dolly {
			float: left;
		}
		.block-editor-page #dolly {
			display: none;
		}
		@media screen and (max-width: 782px) {
			#dolly,
			.rtl #dolly {
				float: none;
				padding-left: 0;
				padding-right: 0;
			}
		}
		</style>
		";
	}

}