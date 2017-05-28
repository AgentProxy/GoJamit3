<?php $__env->startSection('content'); ?>
<script type ="text/javascript">   
console.log("hello");
    window.onload = getLocation;
    function getLocation(){
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(showPosition);
        }
    }

    function showPosition(position){
        console.log("Latitude: " + position.coords.latitude);
        console.log("Longitude: " + position.coords.longitude);
        document.getElementById('longitude').value = position.coords.longitude;
        document.getElementById('latitude').value = position.coords.latitude;
        console.log("Latitude: " + document.getElementById('longitude').value);
        console.log("Longitude: " + document.getElementById('latitude').value);
    }
</script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Discover Jammers near you!</div>

                <div class="panel-body">
                
                    <form class="form-horizontal" role="form" method="post" action="/discover/jammers">
                     <?php echo e(csrf_field()); ?>

                     <?php echo e(method_field('POST')); ?>

                     <div class="form-group">
                        <input id="age_slider" name="age_slider" class="form-control" type="range" value="16" min="16" max = "100" step="1"/>
                        16<span id="age"></span> Years Old
                        <input id="distance_slider" name="distance_slider" class="form-control" type="range" value="0" min="0" max="100" step="1"/>
                        <span id="distance">0</span> KM
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Sex</label>
                        <label for="male" class="radio-inline"><input id="male" type="radio" name="sex" value="M" required="">Male</label>
                        <label for="female" class="radio-inline"><input id="female" type="radio" name="sex" value="F" required="">Female</label>
                    </div>

                        <input type="text" id="longitude" name="longitude" value="2.0" hidden/>
                        <input type="text" id="latitude" name="latitude" value="2.0" hidden/>
                        <button type="submit" class="btn btn-success"> Search </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>