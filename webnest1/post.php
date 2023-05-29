

    <div class="modal fade" id="addpost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 calss="modal-title" style="color:#000">Add New Post</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <img src=""  style="display:none;height:20%;" id="post_img" class="w-100 rounded border" >

            <form method="post" enctype="multipart/form-data" id="comment_form">
              <div class="my-3">
                    <input class="form-control" name="post_img" type="file" id="select_post_img" required="required">
              </div>

              <div class="mb-3">

                 
                  <textarea name="post_text" class="form-control" id="subject" rows="1"  placeholder="say something"></textarea>
  
              </div>
             

             
                  <button type=" submit" class="btn btn-primary" name ="sub" style="margin-bottom: 10px;">Post</button>
                
            </form>
          </div>

          </div>  
      </div>

      <?php include 'error.php'; ?>
    </div>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="custom.js?v=<?=time()?>"></script>
</body>
</html>



