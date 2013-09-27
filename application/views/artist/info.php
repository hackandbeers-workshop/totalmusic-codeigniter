
<form action="/totalmusic/index.php/artist/index" method="post">
    <input id="artist" type="text" placeholder="artist name" name="artistName"/>
    <button type="submit" name="artistForm">Search</button>
</form>

<hr />
<h1><?php echo $artist->getName();?></h1>

<img src="<?php echo $artist->getPicture()?>" />

<p><?php echo $artist->getBiography();?></p>

<hr />
<h2>Albums</h2>
<?php foreach($artist->getAlbums() as $album): ?>
    <img src="<?php echo $album->getPicture();?>" />
    <span><?php echo $album->getTitle();?></span>
    <span>$ <?php echo $album->getPrice();?></span>
<?php endforeach; ?>

<hr />
<h2>Videos</h2>
<?php foreach($artist->getVideos() as $video):?>
    <span><?php echo $video->getTitle();?></span>
    <iframe width="560" height="315" src="<?php echo $video->getUrl()?>" frameborder="0" allowfullscreen></iframe>
    <span><?php echo $video->getDescription();?></span>
    <br /><br />
<?php endforeach; ?>


