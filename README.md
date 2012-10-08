# Phundament 3 - Media

p3media 0.1.0

##Requirements

 *  Yii 1.1.8
 *  PHP 5.3

## Download

Via [github](https://github.com/schmunk42/p3media/downloads).

## Installation

Note: You can also place the module and extensions from the download package
into your app, run the migration, create the directory and adjust 
the config manually.

**Note: Setup RBAC items to allow access to controller actions.**

If you prefer to test this module with a blank Yii web application skeletion
follow these steps:

### Extract & create webapp
~~~
tar -xzf p3media-<SHA1>.tar.gz p3media-demo
~~~

For the demo, we'll setup an app skeleton

~~~
cd p3media-demo
/path/to/yiic webapp .
~~~

### Database Migration
Run migration to setup database schema

~~~
protected/yiic migrate \
  --migrationPath=application.modules.p3media.migrations \
  --migrationTable=migration_module_p3media
~~~

### Directory permissions

P3Media will store its files here:

~~~
mkdir protected/data/p3media
chmod 777 protected/data/p3media/
~~~

If you want to import local files (e.g. FTP uploads) your should also create the import directory

~~~
mkdir protected/data/p3media-import
chmod 777 protected/data/p3media-import/
~~~


### Configuration

Include the [configuration file](https://github.com/schmunk42/p3media/blob/master/config/main.php) provided along with p3media.

~~~
[php]
return CMap::mergeArray(
    require(dirname(__FILE__).'/../modules/p3media/config/main.php'),
    ...
~~~


## Usage
Go to the index page of the module

~~~
http://localhost/webapp/index.php?r=p3media
~~~

### Upload files

Upload your files by selecting 'Add files...' or by drag & drop  

~~~
http://localhost/webapp/index.php?r=p3media/import/upload
~~~

### Ckeditor Test

Open the ckeditor test page and click on the image icon and then 'Browse server'. Select an image and confirm, the image should be added in your editor.

~~~
http://localhost/webapp/index.php?r=p3media/default/ckeditortest
~~~

# API
**Under construction**

You can retrieve a resized version (see presets in config) of an image by using the 'ID' and the 'PRESET' as URL params  

~~~
/index.php?r=p3media/file/image&id={ID}&preset={PRESET}
~~~

## Features

 *  Ckfinder replacement for integration with [ckeditor](http://ckeditor.com/)
 *  Multi-file upload with [jquery-file-upload](https://github.com/blueimp/jQuery-File-Upload)
 *  Media presets for easy usage of [image](http://www.yiiframework.com/extension/image)
 *  CRUDs build with [gtc](http://www.yiiframework.com/extension/gii-template-collection/)
 *  Meta-data enabled (hierarchy, permissions)

## Developer Checkout

~~~
git clone --recursive git://github.com/schmunk42/p3media.git \
  protected/modules/p3media
git clone --recursive git://github.com/schmunk42/p3extensions.git \
  protected/extensions/p3extensions
git clone --recursive https://github.com/schmunk42/gii-template-collection \
  protected/extensions/gtc
~~~


##Resources

 *  [Project page on github](https://github.com/schmunk42/p3media)
 *  Core module of [Phundament 3](http://www.yiiframework.com/extension/phundament)