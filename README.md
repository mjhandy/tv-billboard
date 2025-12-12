# TV Billbord
* This code will use any display as a bill board. Images or videos will get ready from assets/slides via PHP and feed as a JSON object to the front ent code. 
* From there it is renders as a Bootstrap Carousel. 
* There is also a new api feed, currently from CBC. This is via a small proxy built in PHP.

# Usage
* As this is intended for retail use on one or two displays, extrernal hosting may not be needed as XAMPP will work well from an in-house PC.

# Asset Requirements
* Assets must be 1920 x 1080. Bottom 10% of the asset is reserved for the news and weather marque.
* Video files must be mp4, no more than 1020 x 1080, and a max of 30 secs. Audio is not supported.

# To Do / QA Items
* explore adding a fuel price widget
