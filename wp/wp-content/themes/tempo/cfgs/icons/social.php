<?php

	/**
	 *	Social Icons - config file
	 *
	 *  @updated    February 26, 2018
	 *
	 *  @package 	Tempo
	 *  @since      Tempo 0.0.47
	 *  @version    1.0.0
	 */

	$cfgs = array_merge( (array)tempo_cfgs::get( 'social' ), array(
		'instagram',
		'github',
		'gitlab',
		'picasa',
		'evernote',
		'vimeo',
		'twitter',
		'skype',
		'renren',
		'rdio',
		'linkedin',
		'behance',
		'dropbox',
		'vkontakte',
		'facebook',
		'tumblr',
		'dribbble',
		'flickr',
		'stumbleupon',
		'lastfm',
		'gplus',
		'google-circles',
		'youtube-play',
		'youtube',
		'pinterest',
		'smashing',
		'soundcloud',
		'reddit',
		'flattr',
		'odnoklassniki',
		'mixi'
	));

	tempo_cfgs::set( 'social', $cfgs );
?>
