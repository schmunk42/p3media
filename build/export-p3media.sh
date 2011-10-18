#!/bin/bash

# Export script for Phundament 3
#
# Don't judge my bash scripting :)

if [ "$1" == "" ]; then
    echo "No export location provided, exiting."
    exit 
fi

pushd "$1" > /dev/null
exportDir=`pwd`
popd  > /dev/null
baseDir=`dirname $0`
revision=`git rev-parse HEAD`
pushd "$baseDir/../../../../"  > /dev/null
appDir=`pwd`
packageName="p3media-${revision:0:8}"

if [ -d "$exportDir/$packageName" ]; then
    echo "Error: Export directory exists."
    exit 
fi

echo "Export Phundament 3 from '$appDir' to '$exportDir/$packageName'? (y/n)"
read choice
if [ $choice == "y" ]; then
    echo "Running rsync ..."
    rsync -a \
      --exclude='/protected/runtime' \
      --exclude='.git*' \
      --exclude='/assets' \
      --exclude='/runtime' \
      --exclude='/protected/data' \
      --exclude='/protected/config/local.php' \
      --exclude='/nbproject' \
      --exclude='/index*.php' \
      --exclude='protected/yiic.php' \
      --exclude='.DS_Store' \
      "$appDir/" "$exportDir/$packageName"
    echo "$exportDir/$packageName"
fi;

pushd $exportDir > /dev/null
echo "Creating tar.gz ..."
tar -czf "$packageName.tar.gz" "$packageName"
echo "$packageName.tar.gz"

echo "Done."