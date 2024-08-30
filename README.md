Diapo
=====

Generate a HTML diaporama from a folder containing pictures and videos.

require `php` `imagemagick`

Pictures and video have to be stored in a folder called `media`. The script currently only support `webp` picture and `webm` movies files.

launch the script `./diapo.sh`. It will create images thumbnails, video thumbnails and video posters.

## Webpage creation

```bash
php diapo.php > index.html
```


## Images conversions


### images thumbnails

render thumnails from folder containing webp images

```bash
mkdir thumbnail
mogrify  -format webp -path thumbnail -strip -thumbnail '100x100^' -gravity center -extent 100x100 *.webp
```


### video thumbnails

    convert %.webm[1] -strip -thumbnail '100x100^' -gravity center -extent 100x100 thumbnail/%.webp
