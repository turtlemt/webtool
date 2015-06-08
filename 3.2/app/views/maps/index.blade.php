@extends('template.2row')
@section('content')
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCdYYjdbxQNdi4NEpWdFPpqCci8twTtwHM&sensor=false"></script>
<script type="text/javascript">
    //var activities = <?php echo $activities;?>
</script>

<script type="text/javascript">
    activities.forEach(function(e){
        var actsTitles = 
        '<tr>' + 
            '<td style="">' + e.title + '</td>' + 
            '<td style="">' + e.start_date + ' ~ ' + e.end_date + '</td>' + 
            '<td style=""></td>' + 
        '</tr>';
        $("#js-acts-title").append(actsTitles);
    });
    
</script>

<script type="text/javascript">
    function initialize(msg) 
    {
        var lat = msg.results[0].geometry.location.lat;
        var lng = msg.results[0].geometry.location.lng;
        var mapOptions = {
            center: new google.maps.LatLng(lat, lng),
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
        for(var i=0; i<20; i+=0.1){
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(lat, lng + i), map: map, title: 'Point' + i
            });
        }
    }
</script>
@stop