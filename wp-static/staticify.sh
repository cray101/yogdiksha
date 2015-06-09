#!/bin/sh

#backup generated zipfile to legacy
if [ ! -d "legacy" ]; then
    mkdir ./legacy
fi

#!!! update to current month!!!
find ../wpyogdiksha-nov2013/wordpress/wp-content/uploads -name "wp-static*" -exec mv {} ./legacy \;
# make working copy in this folder
cp `find legacy/ -name "wp-static*zip" | xargs ls -t1 | head -n1` ./wp-static-latest.zip
##mv ../wpyogdiksha-nov2013/wordpress/wp-content/uploads/2015/05/wp-static*.zip ./wp-static-latest.zip

#check if the file is actually there!
if [ $? -eq 0 ]; then
    echo  ZipFile Move OK
else
    echo Sleeping!
    sleep 5
    echo wp-static- not found. Exiting!
    exit
fi

# backup last uploaded site
if [ -d "wpyogdiksha-nov2013" ]; then
    mv wpyogdiksha-nov2013 wpyogdiksha-nov2013-bkpon-$(date +%Y%m%d_%H%M%S)
fi

#unzip static site
unzip wp-static-latest.zip

#fix dos2unix problems in generated index.html files
find wpyogdiksha-nov2013/ -name "index.html" | xargs perl -pi -e 's/\r\n/\n/;' $*

#copy additional stuff into site
cp favicon.ico google*.html sitemap.xml wpyogdiksha-nov2013/

#all done, upload!
cd wpyogdiksha-nov2013
if [ $? -eq 0 ]; then
    echo Uploading to server now!!
    echo Sleeping for 10 seconds. 
    echo ctrl+C now if you see an error above!
    sleep 10
    s3cmd sync --recursive --acl-public * s3://yogdiksha.com/

    ## To actually remove the deleted files from the bucket, use the line below after removing dry run
    echo "Following files may need to be deleted"
    sync --recursive --dry-run --delete-removed --acl-public * s3://yogdiksha.com/

    cd ..
##remove the static zip, we have a copy in legacy
rm -f wp-static-latest.zip

else
    echo HOW DID WE EVER GET HERE!
fi

