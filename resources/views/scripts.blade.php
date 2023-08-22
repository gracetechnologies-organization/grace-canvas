 <!-- Bootstrap core JS-->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
 <!-- Core theme JS-->
 <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
 <!-- * *                               SB Forms JS                               * *-->
 <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
 <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
 {{-- <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script> --}}
 <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
 <!-- * *                           CropperJs Links                               * *-->
 <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
 {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" /> --}}
 {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script> --}}

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" integrity="sha512-cyzxRvewl+FOKTtpBzYjW6x6IAYUCZy3sGP40hn+DQkqeluGRCax7qztK2ImL64SA+C7kVWdLI6wvdlStawhyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js" integrity="sha512-6lplKUSl86rUVprDIjiW8DuOniNX8UDoRATqZSds/7t6zCQZfaCe3e5zcGaQwxa8Kpn5RTM9Fvl3X2lLV4grPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script>
     const printDiv = (id) => {
         var printContents = document.getElementById(id).innerHTML;
         var originalContents = document.body.innerHTML;
         // Replace the current document's body with the content to be printed
         document.body.innerHTML = printContents;
         // Trigger the print dialog for the current window
         window.print();
         // Restore the original document content after printing is done
         document.body.innerHTML = originalContents;
     }

     //  Code For Using CropperJs Library
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

     //  $("#crop").click(function() {
     //      canvas = cropper.getCroppedCanvas({
     //          width: 142,
     //          height: 142,
     //      });

     //      canvas.toBlob(function(blob) {
     //          url = URL.createObjectURL(blob);
     //          var reader = new FileReader();
     //          reader.readAsDataURL(blob);
     //          reader.onloadend = function() {
     //              var base64data = reader.result;
     //              document.getElementById('resume-photo').src = base64data;
     //             //  var Modal = document.querySelector('#crop-image-modal');
     //             //  var ModalBackdrop = document.querySelector('.modal-backdrop');
     //             // console.log(Modal);
     //              // Remove the 'show' class from modal and modal-backdrop
     //             //  Modal.classList.remove('show');
     //             //  ModalBackdrop.classList.remove('show');
     //             CropImgModal.modal('hide');
     //          }
     //      });
     //  });

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
