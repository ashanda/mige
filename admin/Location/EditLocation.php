<?php
include '../includes/header.php';
$id = $_REQUEST['id'];
$get_location_detail = get_location_detail($id);

if(isset($_POST['submit']))
{
    $id = $_GET['id'];
	$location = mysqli_real_escape_string($conn,$_POST['location']);
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $location_detail = mysqli_real_escape_string($conn,$_POST['location_detail']);
	$creation_time = time();
    if($latitude&&$longitude)
    {
        $edit_location = edit_location($location,$latitude,$longitude,$location_detail,$id);
        if($edit_location)
        {
            echo "<script type='text/javascript'>
            window.location.href='index.php';
            </script>";
            exit();
        }
        else
        {
            $error = 'There is someting wrong while editing location';
        }
    }
    else
    {
        echo "<script type='text/javascript'>
            alert('Please select the correct location');
            </script>";
           
    }
}
?>
<div class="page has-sidebar-left  height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-map-marker"></i>
                        Location
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link"  href="index.php"><i class="icon icon-home2"></i>All Locations</a>
                    </li>
                    <li>
                        <a class="nav-link active"  href="#" ><i class="icon icon-plus-circle"></i> Edit Location</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent animateOnce">
        <div class="animated fadeInUpShort">
            <div class="row my-3">
                <div class="col-md-7  offset-md-2">
                    <form action="EditLocation.php?id=<?php echo $_GET['id'];?>" method="POST">
                        <div class="card no-b  no-r">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <div class="form-group m-0">
                                            <label for="location" class="col-form-label s-12">Location</label>
                                            <input name="location" id="location" placeholder="Enter Location Here..." class="form-control r-0 light s-12 " type="text" value="<?php echo $get_location_detail['location_name'];?>" required>
                                            <input name="latitude" id="latitude" value="<?php echo $get_location_detail['latitude'];?>" class="form-control r-0 light s-12 " type="hidden" required>
                                            <input name="longitude" id="longitude" value="<?php echo $get_location_detail['longitude'];?>" class="form-control r-0 light s-12 " type="hidden" required>
                                        </div>
                                        <div class="form-group m-0">
                                            <label for="name" class="col-form-label s-12">Detail</label>
                                            <textarea class="form-control" name="location_detail" placeholder="Enter Location Detail Here..." rows="7" required><?php echo $get_location_detail['location_detail'];?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <span style="color: red;" id="error"><?php if(isset($error)) { echo $error;}?></span>
                            <div class="card-body">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="icon-save mr-2"></i>Save Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    	</div>
    </div>
</div>
<?php
include '../includes/footer.php';
?>
<script type="text/javascript">
    $("input").click(function() {
        $('#error').css("display", "none");
    });

    $( "#location" ).autocomplete({
        source: function( request, response ) {
            $.ajax({
                url: "GetGoogleLocation.php",
                dataType: "json",
                type: "POST",
                data: {
                input_value:request.term
                },
                success: function( data ) {
                if(data.status==1)
                {
                    response($.map(data.locations, function (value,index) {
                    //console.log(value);
                        return {
                            label: value.location_description,
                            value: value.state+'__'+value.zip_code+'__'+value.latitude+'__'+value.longitude,
                        };
                    }));
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                //alert(jqXHR);
                alert('No internet connection');
            }
        });
    },
    select: function (event, ui) {
          // Prevent value from being put in the input:
        this.value = ui.item.label;

        var items = ui.item.value.split('__');
        var state = items[0];
        var zip_code = items[1];
        var latitude = items[2];
        var longitude = items[3];
        // Set the next input's value to the "value" of the item.
        $("#location").val(ui.item.label);
            /*$('#zip_code').val(zip_code);
            $('#state').val(state);*/
            $('#latitude').val(latitude);
            $('#longitude').val(longitude);
          
            event.preventDefault();
        },
    });
</script>