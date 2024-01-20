<?php
echo"<div class='row'style='margin-left:4rem;' id='row1' >
            <div class='col-md-3 form-group'>
              <input type='text' required name='pname[]' id='search_medicine' class='form-control'>
            </div>
            <div class='col-md-2 form-group' id='pri'>
              <input type='text' required name='price[]' class='form-control price'>
            </div>
            <div class='col-md-2 form-group'>
              <input type='text' required name='qty[]' class='form-control qty'>
            </div>
            <div class='col-md-2 form-group'>
              <input type='text' required name='total[]' class='form-control total'>
            </div>
            <div class='col-md-1 form-group'>
              <input type='button' value='Remove' class='btn btn-danger btn-sm btn-row-remove'>
            </div>
        </div>";?>