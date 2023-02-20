
<!-- Modal for edit post -->



<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Share Your Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="postprocess">
           <textarea rows="4" cols="50" name="user_post"  class="form-control">
                     Write Your Post here...</textarea>
                        </br>
                        <input type="submit" value="POST" class="btn btn-success">
      </form>
     </div>
     
    </div>
  </div>
</div>

