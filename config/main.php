<?php

return array(
	'import' => array(
		#'application.modules.p3media.models.*',
		'ext.gtc.components.*'
	),
	'modules' => array(
		'p3media' => array(
			'class' => 'application.modules.p3media.P3MediaModule',
			'params' => array(
				'publicRuntimePath' => '../runtime/p3media',
				'publicRuntimeUrl' => '/runtime/p3media',
				'protectedRuntimePath' => 'runtime/p3media',
				'presets' => array(
					'default' => array(
						'name' => 'Default 300x300,PNG',
						'commands' => array(
							'resize' => array(300, 300),
							'quality' => 85
						),
						'type' => 'png'
					),
					'original' => array(
						'name' => 'Original File',
						'originalFile' => true,
					),
					'fckbrowse' => array(
						'commands' => array(
							'resize' => array(150, 120),
							'quality' => 75,
						),
						'type' => 'png'
					),
					'thumb' => array(
						'commands' => array(
							'resize' => array(64, 64),
							'quality' => 75,
						),
						'type' => 'png'
					),
				)
			),
		),
	),
	'components' => array(
		'image' => array(
			'class' => 'ext.p3extensions.components.image.CImageComponent',
			// GD or ImageMagick
			'driver' => 'GD',
		),
	)
)
?>
