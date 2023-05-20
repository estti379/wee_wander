<x-layout :pageTitle=$pageTitle>
<div class="trail-details-card">
  <h1>Trail Details</h1>
  
  <p><strong>Adventure ID : </strong>{{ $adventures[0]['id'] }}</p>
  <p><strong>Trail ID : </strong>{{ $adventures[0]['trail']['id'] }}</p>
  <p><strong>Trail title : </strong></strong>{{ $adventures[0]['trail']['name'] }}</p>
  <p><strong>Distance : </strong></strong>{{ $adventures[0]['trail']['distance'] }} Mts</p>
  <p><strong>Starting Time : </strong></strong>{{ $adventures[0]['start_date'] }}</p>
  <p>This is resources\views\trails\trail-details.blade.php </p>
  <p>Need to find some way to fill this with image or something like that</p>
</div>
<div>
  <p>BELOW WE HAVE A EMBED MAP THAT READ GPX. FROM gpx.studio</p>
  <p>This is an ID from a file of a GPX That is on my google drive </p>
  <p>The GPX file is hosted on my GOOGLE DRIVE, and i am sharing the link ID with the GEO.STUDIO</p>
  <P>This is why the website has access to the trail.</P>
  <p>NEED TO MAKE THIS DYNAMICALLY</p>
  <p>NEEDS TO MAKE THIS PART 1is2ueFv_VkhqH3FNizBbE60Z4SgI7zTC VARIABLE AND MAKE THAT EVERY TRAIL HAS HIS SPECIFIC ON THE DB </p>
  <p>For now, every trail will have the BElval trail</p>
  <iframe src="https://gpx.studio/?state=%7B%22ids%22:%5B%221is2ueFv_VkhqH3FNizBbE60Z4SgI7zTC%22%5D%7D&embed&distance" width="100%" height="500" frameborder="0" allowfullscreen>
    <p>
      <a href="https://gpx.studio/?state=%7B%22ids%22:%5B%221is2ueFv_VkhqH3FNizBbE60Z4SgI7zTC%22%5D%7D"></a>
    </p>
  </iframe>
</div>

<div>
  <h2>GPX REF</h2>
  <p>Other possibility is to imbed directly from the geoportail site</p>
  <p>need to do the same thing, the difference is that what needs to be dynamcly is the id</p>
  <iframe src="https://map.geoportail.lu/theme/tourisme?map_id=b5565379ddde4a6ca6b3810a6a15d6c0&version=3&zoom=14&X=708036&Y=6358262&lang=fr&rotation=0&layers=&opacities=&time=&bgLayer=topogr_global&embedded=true" width="600" height="450" frameborder="0" style="border:0"></iframe>
</div>
</x-layout>