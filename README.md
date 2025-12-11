# TV Billbord
This code will use any display as a bill board. Images or videos will get ready from assets/slides via PHP and feed as a JSON object to the front ent code.  
From there it is renders as a Bootstrap Carousel. 

There is also a new api feed, currently from CBC. This is via a small proxy built in PHP.

# Usage
As this is intended for retail use on one or two displays, extrernal hosting may not be needed as XAMPP will work well from an in-house PC.

# To Do
* a weather API feed is needed
* Currently, any video will constntly play and loop. Idealy the video would only play once the slide is active, 
then pause and reset when out of focus. The ideal fix is:
** Pause Video when active
** play Video from start of video
** restart carousel	when the video has finished
