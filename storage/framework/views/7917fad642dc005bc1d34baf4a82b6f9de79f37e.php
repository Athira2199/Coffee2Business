<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">


  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <title>Todo List App</title>
</head>
<body>
<div class="container">
  <div class="col-md-offset-2 col-md-8">
    <div class="row">
      <h1>Todo List</h1>
    </div>

      <?php if(Session::has('success')): ?>
     <div class="alert alert-success">
        <strong>Success:</strong><?php echo e(Session::get('success')); ?>

      </div>
      <?php endif; ?>


      
      <?php if(count($errors) > 0): ?>
      <div class="alert alert-danger">
        <strong>Error:</strong>
        <ul>
          <?php $__currentLoopData = $errors -> all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
      <?php endif; ?>

    <div class="row" style='margin-top: 10px; margin-bottom: 10px;'>
      <form action="<?php echo e(route('tasks.update',['task'=>$taskToEdit->id])); ?>" method='POST'>
        <?php echo e(csrf_field()); ?>

        <div class="form-group">
        <input type="hidden" name='_method' value='PUT'>
          <input type="text" name='updatedTaskName' class='form-control' value="<?php echo e($taskToEdit->name); ?>">
        </div>
        <div class="form-group">
          <input type="submit" class='btn btn-success btn-lg' value='Save Changes'>
          <a href="<?php echo e(route('tasks.index')); ?>" class="btn btn-lg btn-danger pull-right">Take me back</a>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html><?php /**PATH C:\xampp\htdocs\c2b\resources\views/todo/edit.blade.php ENDPATH**/ ?>