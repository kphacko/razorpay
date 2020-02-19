<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>Personal Details</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-primary">
  <span class="navbar-brand mb-0 h1">Daxy</span>
</nav>
    <div class="container" style="margin-top:20px;" >
    <form action="pay.php" method="POST">
      <div class="elementor-form-fields-wrapper elementor-labels-above">
                <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_27 elementor-col-33 elementor-field-required elementor-mark-required">
          <label for="form-field-field_27" class="elementor-field-label">First Name :</label><input size="1" type="text" name="form_fields[field_27]" id="form-field-field_27" class="elementor-field elementor-size-md  elementor-field-textual" required="required" aria-required="true">       </div>
                <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_3 elementor-col-33 elementor-field-required elementor-mark-required">
          <label for="form-field-field_3" class="elementor-field-label">Middle Name :</label><input size="1" type="text" name="form_fields[field_3]" id="form-field-field_3" class="elementor-field elementor-size-md  elementor-field-textual" required="required" aria-required="true">       </div>
                <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_2 elementor-col-33 elementor-field-required elementor-mark-required">
          <label for="form-field-field_2" class="elementor-field-label">Last Name :</label><input size="1" type="text" name="form_fields[field_2]" id="form-field-field_2" class="elementor-field elementor-size-md  elementor-field-textual" required="required" aria-required="true">       </div>
                <div class="elementor-field-type-date elementor-field-group elementor-column elementor-field-group-field_9 elementor-col-33 elementor-field-required elementor-mark-required">
          <label for="form-field-field_9" class="elementor-field-label">Date Of Birth :</label><input type="date" name="form_fields[field_9]" id="form-field-field_9" class="elementor-field elementor-size-md  elementor-field-textual elementor-date-field elementor-use-native" required="required" aria-required="true" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">       </div>
                <div class="elementor-field-type-upload elementor-field-group elementor-column elementor-field-group-field_19 elementor-col-25 elementor-field-required elementor-mark-required">
          <label for="form-field-field_19" class="elementor-field-label">Photograph :</label><input type="file" name="form_fields[field_19]" id="form-field-field_19" class="elementor-field elementor-size-md  elementor-upload-field" required="required" aria-required="true" data-maxsize="30" data-maxsize-message="This file exceeds the maximum allowed size.">        </div>
                
                <div class="elementor-field-type-textarea elementor-field-group elementor-column elementor-field-group-field_17 elementor-col-60 elementor-field-required elementor-mark-required">
          <label for="form-field-field_17" class="elementor-field-label">Residential Address :</label><textarea class="elementor-field-textual elementor-field  elementor-size-md" name="form_fields[field_17]" id="form-field-field_17" rows="4" required="required" aria-required="true"></textarea>        </div>
                <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_4 elementor-col-25 elementor-field-required elementor-mark-required">
          <label for="form-field-field_4" class="elementor-field-label">State</label>   <div class="elementor-field elementor-select-wrapper ">
      <select onchange="print_city('state', this.selectedIndex);" id="sts" name ="stt" class="form-control" required></select>
<select id ="state" class="form-control" required></select>
<script language="javascript">print_state("sts");</script>
    </div>
            </div>
                <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-district elementor-col-20 elementor-field-required elementor-mark-required">
          <label for="form-field-district" class="elementor-field-label">District</label>   <div class="elementor-field elementor-select-wrapper ">
      <select name="form_fields[district]" id="form-field-district" class="elementor-field-textual elementor-size-md" required="required" aria-required="true">
        <option value=""></option>      </select>
    </div>
            </div>
                <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_18 elementor-col-40 elementor-field-required elementor-mark-required">
          <label for="form-field-field_18" class="elementor-field-label">Pin Code</label><input size="1" type="text" name="form_fields[field_18]" id="form-field-field_18" class="elementor-field elementor-size-md  elementor-field-textual" required="required" aria-required="true">       </div>
                <div class="elementor-field-type-number elementor-field-group elementor-column elementor-field-group-field_10 elementor-col-25 elementor-field-required elementor-mark-required">
          <label for="form-field-field_10" class="elementor-field-label">Mobile No :</label><input type="number" name="form_fields[field_10]" id="form-field-field_10" class="elementor-field elementor-size-md  elementor-field-textual" required="required" aria-required="true" min="" max="">       </div>
                <div class="elementor-field-type-radio elementor-field-group elementor-column elementor-field-group-field_16 elementor-col-33 elementor-field-required elementor-mark-required">
          <label for="form-field-field_16" class="elementor-field-label">Gender</label><div class="elementor-field-subgroup  "><span class="elementor-field-option"><input type="radio" value="Male" id="form-field-field_16-0" name="form_fields[field_16]" required="required" aria-required="true"> <label for="form-field-field_16-0">Male</label></span><span class="elementor-field-option"><input type="radio" value="Female" id="form-field-field_16-1" name="form_fields[field_16]" required="required" aria-required="true"> <label for="form-field-field_16-1">Female</label></span></div>       </div>
                <div class="elementor-field-type-radio elementor-field-group elementor-column elementor-field-group-field_30 elementor-col-33 elementor-field-required elementor-mark-required">
          <label for="form-field-field_30" class="elementor-field-label">Marital Status</label><div class="elementor-field-subgroup  "><span class="elementor-field-option"><input type="radio" value="Unmarried " id="form-field-field_30-0" name="form_fields[field_30]" required="required" aria-required="true"> <label for="form-field-field_30-0">Unmarried </label></span><span class="elementor-field-option"><input type="radio" value="Married " id="form-field-field_30-1" name="form_fields[field_30]" required="required" aria-required="true"> <label for="form-field-field_30-1">Married </label></span><span class="elementor-field-option"><input type="radio" value="Divorced " id="form-field-field_30-2" name="form_fields[field_30]" required="required" aria-required="true"> <label for="form-field-field_30-2">Divorced </label></span></div>       </div>
                <div class="elementor-field-type-number elementor-field-group elementor-column elementor-field-group-field_15 elementor-col-60 elementor-field-required elementor-mark-required">
          <label for="form-field-field_15" class="elementor-field-label">Aadhar Card </label><input type="number" name="form_fields[field_15]" id="form-field-field_15" class="elementor-field elementor-size-md  elementor-field-textual" required="required" aria-required="true" min="" max="">        </div>
                <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_1 elementor-col-33 elementor-field-required elementor-mark-required">
          <label for="form-field-field_1" class="elementor-field-label">Blood Group</label><input size="1" type="text" name="form_fields[field_1]" id="form-field-field_1" class="elementor-field elementor-size-md  elementor-field-textual" placeholder="B+" required="required" aria-required="true">        </div>
                <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_14 elementor-col-20 elementor-field-required elementor-mark-required">
          <label for="form-field-field_14" class="elementor-field-label">Place:</label><input size="1" type="text" name="form_fields[field_14]" id="form-field-field_14" class="elementor-field elementor-size-md  elementor-field-textual" placeholder="Mumbai" required="required" aria-required="true">        </div>
                <div class="elementor-field-type-date elementor-field-group elementor-column elementor-field-group-field_25 elementor-col-20 elementor-field-required elementor-mark-required">
          <label for="form-field-field_25" class="elementor-field-label">Date :</label><input type="date" name="form_fields[field_25]" id="form-field-field_25" class="elementor-field elementor-size-md  elementor-field-textual elementor-date-field elementor-use-native" required="required" aria-required="true" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">       </div>
                <div class="elementor-field-type-acceptance elementor-field-group elementor-column elementor-field-group-field_13 elementor-col-100 elementor-field-required elementor-mark-required">
          <label for="form-field-field_13" class="elementor-field-label">T&amp;C</label><div class="elementor-field-subgroup"><span class="elementor-field-option"><input type="checkbox" name="form_fields[field_13]" id="form-field-field_13" class="elementor-field elementor-size-md  elementor-acceptance-field" required="required" aria-required="true"> <label for="form-field-field_13">By signing below, I certify that I have read, understand, and adhere to all
applicable guidelines and agreements as stated. </label></span></div>       </div>
                <div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100">
          <button type="submit" class="elementor-button elementor-size-md">
            <span>
                              <span class=" elementor-button-icon">
                                                    </span>
                                            <span class="elementor-button-text">Send</span>
                          </span>
          </button>
        </div>
      </div>
    </form>
  </div>
  </body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
