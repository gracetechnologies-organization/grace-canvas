<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                           CropperJs Links                               * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js" integrity="sha512-6lplKUSl86rUVprDIjiW8DuOniNX8UDoRATqZSds/7t6zCQZfaCe3e5zcGaQwxa8Kpn5RTM9Fvl3X2lLV4grPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    /* -----------------Code For Using CropperJs Library----------------- */
    var CropImgModal = $('#crop-image-modal');
    var Image = document.getElementById('image');
    var cropper;

    $("body").on("change", ".image", function(Event) {
        var Files = Event.target.files;
        var done = function(url) {
            Image.src = url;
            CropImgModal.modal('show');
        };
        var reader;
        var File;
        var url;

        if (Files && Files.length > 0) {
            File = Files[0];

            if (URL) {
                done(URL.createObjectURL(File));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(File);
            }
        }
    });

    CropImgModal.on('shown.bs.modal', function() {
        cropper = new Cropper(Image, {
            aspectRatio: 1,
            viewMode: 3
        });
    }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
    });

    const cropImg = () => {
        canvas = cropper.getCroppedCanvas({
            width: 142,
            height: 142,
        });

        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                document.getElementById('resume-photo').src = base64data;
                //  var Modal = document.querySelector('#crop-image-modal');
                //  var ModalBackdrop = document.querySelector('.modal-backdrop');
                // console.log(Modal);
                // Remove the 'show' class from modal and modal-backdrop
                //  Modal.classList.remove('show');
                //  ModalBackdrop.classList.remove('show');
                CropImgModal.modal('hide');
            }
        });
    }
</script>
