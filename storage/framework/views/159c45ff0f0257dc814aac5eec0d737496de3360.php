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

      <?php if(Session::has('error')): ?>
      <div class="alert alert-danger">
        <strong>Error:</strong><?php echo e(Session::get('error')); ?>

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
      <form action="<?php echo e(route('tasks.store')); ?>" method='POST'>
        <?php echo e(csrf_field()); ?>

        <div class="col-md-9">
          <input type="text" name='newTaskName' class='form-control'>
        </div>
        <div class="col-md-3">
          <input type="submit" class='btn btn-primary btn-block' value='Add Task'>
        </div>
      </form>
    </div>
      <table class="table">
        <thead>
          <th>Task #</th>
          <th>Name</th>
          <th>Edit</th>
          <th>Delete</th>
        </thead>
        <?php if(count($storedTasks) > 0): ?>
        <tbody>
            <?php $__currentLoopData = $storedTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <th><?php echo e($task-> id); ?></th>
              <td><?php echo e($task-> name); ?></td>
              <td><a href="<?php echo e(route('tasks.edit',['task'=>$task->id])); ?>" class='btn btn-default'>Edit</a></td>
              <td>
                <form action="<?php echo e(route('tasks.destroy',['task'=>$task->id])); ?>" method='POST'>
                  <?php echo e(csrf_field()); ?>

                  <input type="hidden" name='_method' value='DELETE'>
                  <input type="submit" class='btn btn-danger' value='Delete'>
                </form>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <?php endif; ?>
      </table>


    <div class="row text-center">
        <?php echo e($storedTasks->links()); ?>

    </div>

  </div>
</div>
</body>
</html><?php /**PATH C:\xampp\htdocs\c2b\resources\views/todo/index.blade.php ENDPATH**/ ?>