#!/bin/sh

echo 'generating HTML web page...'

php diapo.php > index.html

mkdir -p media

cd media

mkdir -p thumbnail

echo 'rendering images thumbnails...'

mogrify  -format webp -path thumbnail -strip -thumbnail '100x100^' -gravity center -extent 100x100 *.webp

mkdir -p poster

echo 'rendering videos thumbnails and posters...'

list=$(ls *.webm)
for img in $list
do
    imgName=${img%.webm}
    convert $img[1] -strip -thumbnail '100x100^' -gravity center -extent 100x100 "thumbnail/$imgName.webp"
    convert $img[1] -quality 50 "poster/$imgName.webp"
done
