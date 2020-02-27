<?php
include 'header.php';

?>
<div class="container">
<form class="was-validated" action="send.php?stat=s" method="POST">
  <div class="mb-3">
    <label for="validationTextarea">Message</label>
    <textarea style="height: 175px;" name="text" class="form-control is-invalid" id="validationTextarea" placeholder="Enter text here" required></textarea>
    <div class="invalid-feedback">
      *This message will be forward to all registered Members.
    </div>
  </div>
   <button type="submit" name="submit" class="btn btn-primary">Submit</button>	
</form>
</div>
<?php
include 'footer.php';
?>