
  
    <?php include_once("helper/footer.php");?>
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/login-full-page-bs4.js"></script>
    <script src="assets/js/agency.js"></script>
    <script src="assets/js/login-full-page-bs4-1.js"></script>
  <script type="text/javascript">
        window.onload = () => {
            document.getElementById("profile").addEventListener("click", () => {
                var element_input = document.getElementById("songCover");
                if( element_input && document.createEvent){
                        var event_ = document.createEvent("MouseEvent");
                        event_.initEvent("click", true, false);
                        element_input.dispatchEvent(event_);
                }
            });
            
        };
        function setPicture(event){
            var selectedFile = event.target.files[0];
            var fileReaderImg = new FileReader();
            var imageTag = document.getElementById("image");
            fileReaderImg.onload = function(event){
                imageTag.src = event.target.result;
            }
            fileReaderImg.readAsDataURL(selectedFile);
  
        }

    </script>
</body>

</html>