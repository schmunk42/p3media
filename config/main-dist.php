<?php
/**
 * Config file.
 *
 * @author Tobias Munk <schmunk@usrbin.de>
 * @link http://www.phundament.com/
 * @copyright Copyright &copy; 2005-2011 diemeisterei GmbH
 * @license http://www.phundament.com/license/
 */

return array(
	'import' => array(
		#'application.modules.p3media.models.*',
		'ext.gtc.components.*'
	),
	'modules' => array(
		'p3media' => array(
			'class' => 'ext.phundament.p3media.P3MediaModule',
			'params' => array(
				'publicRuntimePath' => '../runtime/p3media',
				'publicRuntimeAlias' => 'application.runtime.p3media',
				'publicRuntimeUrl' => '/runtime/p3media',
				'protectedRuntimePath' => 'runtime/p3media',
				'protectedRuntimeAlias' => 'application.www.runtime.p3media',
				'presets' => array(
					'p3media-ckbrowse' => array(
						'commands' => array(
							'resize' => array(150, 120), // use third parameter for master setting, see Image constants
							#'quality' => 80, // for jpegs
						),
						'type' => 'png'
					),
					'p3media-upload' => array(
						'commands' => array(
							'resize' => array(60, 30), // use third parameter for master setting, see Image constants
							#'quality' => 80, // for jpegs
						),
						'type' => 'png'						
					),
					'original' => array(
						'name' => 'Original File',
						'originalFile' => true,
					),
					'original-public' => array(
						'name' => 'Original File Public',
						'originalFile' => true,
                        'savePublic' => true,
					),
					'download' => array(
						'name' => 'Download File',
						'originalFile' => true,
                        'attachment' => true,
					),
				)
			),
		),
	),
	'components' => array(
		'image' => array(
			'class' => 'ext.phundament.p3extensions.components.image.CImageComponent',
			// GD or ImageMagick
			'driver' => 'GD',
		),
	)
)
?>
