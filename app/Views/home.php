<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <form action="" >
      <input type="text" name="todo" data-mark="" placeholder="Input Text">
      <button class="save btn btn-secondary btn-sm">Save me</button>
      <button class="update btn btn-secondary btn-sm">Update</button>
      <button class="cancel btn btn-secondary btn-sm">Cancel</button>
    </form>

    <?php foreach($mark as $result) { ?>
        <p><?= $result->class; ?> | <a class="btn btn-sm btn-danger btn-danger" href="<?= base_url('/del/') . $result->id; ?>"> Delete</a> | <button data-ids="<?php echo $result->id ?>" data-edit="<?php echo $result->class?>" class="edit btn btn-sm btn-info">Edit</button></p>
    <?php } ?>

  </div>


  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
  <script>
    $('.save').click(function(e) {
      e.preventDefault()
      console.log(e)
      $.ajax({
        url:'<?php echo base_url() . 'add'?>',
        method: 'POST',
        data: {
          mark: $('[name="todo"]').val()
        },
        success: function(result) {
          location.reload()
        }
      })
    })

    $(document).ready(function() {
      $('.update').hide()
      $('.cancel').hide()
      
        $.ajax({
          url:'<?php echo base_url() . 'get_data' ?>',
          method: 'GET',
          success: function(result) {
          let data = JSON.parse(result)
          data.map(e => {
            $('.hehe').append(`<p>${e.class}</p>`)
          })
          }
        })
    })
    

    $('.edit').click(function() {
      let data_val = $(this).data('edit')
      let data_id = $(this).data('ids')
      $('.update').show()
      $('.cancel').show()
      $('.save').hide()
      $('[name="todo"]').val(data_val)
      $('[name="todo"]').data('mark', data_id)

     
      // alert(val)
    })

    $('.update').click(function(e) {
      e.preventDefault()
    
      let update_val =  $('[name="todo"]').val()
      let update_ids =  $('[name="todo"]').data('mark')
     
      $.ajax({
          url:'<?php echo base_url() . 'update/' ?>'+ update_ids,
          method: 'POST',
          data: {
            up_data: update_val
          },
          success: function(result) {
           location.reload()
         
          }
      })

      
    })

  </script>
</body>
</html>