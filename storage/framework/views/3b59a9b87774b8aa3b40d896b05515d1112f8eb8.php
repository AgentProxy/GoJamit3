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
                        <input id="age_slider" class="form-control" type="range" min="16" max = "100" step="1"/>
                        <span id="age"> </span> Years Old
                        <input id="distance_slider" class="form-control" type="range" min="0" max="100" step="1"/>
                        <span id="distance"> </span> KM
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Sex</label>
                        <label for="male" class="radio-inline"><input id="male" type="radio" name="sex" value="M">Male</label>
                        <label for="female" class="radio-inline"><input id="female" type="radio" name="sex" value="F">Female</label>
                    </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">Genres Listened </label>

                        <div class="col-md-6 checkbox">
                           <label for="jazz"><input name="genres[]" id="jazz" type="checkbox" value="1">Jazz</label>

                            <label for="rock"><input name="genres[]" id="rock" type="checkbox" value="2">Rock</label>

                            <label for="blues"><input name="genres[]" id="blues" type="checkbox" value="3">Blues</label>

                            <label for="folk"><input name="genres[]" id="folk" type="checkbox" value="4">Folk</label>

                            <label for="hiphop"><input name="genres[]" id="hiphop" type="checkbox" value="5">Hip Hop</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Instruments Played</label>

                        <div class="col-md-6 checkbox">
                           <label for="guitar"><input name="instruments[]" id="guitar" type="checkbox" value="1">Guitar</label>

                            <label for="piano"><input name="instruments[]" id="piano" type="checkbox" value="2">Piano</label>

                            <label for="Ukulele"><input name="instruments[]" id="ukulele" type="checkbox" value="3">Ukulele</label>

                            <label for="Violin"><input name="instruments[]" id="violin" type="checkbox" value="4">Violin</label>

                            <label for="saxophone"><input name="instruments[]" id="saxophone" type="checkbox" value="5">Saxophone</label>
                        </div>
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