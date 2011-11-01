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
					'ckbrowse' => array(
						'name' => 'Ckeditor',
						'commands' => array(
							'resize' => array(150, 120), // use third parameter for master setting, see Image constants
							#'quality' => 80, // for jpegs
						),
						'type' => 'png'
					),
					'original' => array(
						'name' => 'Original File',
						'originalFile' => true,
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
