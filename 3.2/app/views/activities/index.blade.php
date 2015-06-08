@extends('template.2row')
@section('content')
<script type="text/javascript">
    var activities = <?php echo $activities;?>
</script>

<table class="table table-hover">
    <thead>
        <tr>
            <th data-field="id">活動</th>
            <th data-field="name">日期</th>
            <th data-field="price">參加</th>
        </tr>
    </thead>
    <tbody id="js-acts-title">
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
            
    </tbody>
</table>
@stop